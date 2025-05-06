<?php

namespace App\Filament\Resources\BuildingSafetyStructureResource\Pages;

use App\Filament\Resources\BuildingSafetyStructureResource;
use App\Models\AssessmentCode;
use App\Models\BuildingSafetyStructure;
use App\Models\BuildingSafetyTeam;
use App\Models\CompanyData;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions;

class CreateBuildingSafetyStructure extends CreateRecord
{
    protected static string $resource = BuildingSafetyStructureResource::class;

    protected static string $view = 'filament.resources.building-safety-structure-resource.pages.form-keselamatan-gedung';

    public function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Kode Assessment')
                ->schema([
                    Select::make('bcm_assessment_code')
                        ->label('')
                        ->options(fn() => AssessmentCode::pluck('assignment_code', 'user_id'))
                        ->default(auth()->user()->id)
                        ->disabled(),
                ]),
            Section::make('Deputy and Captain Floor')
                ->schema([
                    Select::make('location_type')
                        ->label('Kantor Cabang atau Pusat?')
                        ->options([
                            1 => 'Pusat',
                            0 => 'Cabang/Kanwil',
                        ])
                        ->live()
                        ->afterStateUpdated(function (Set $set) {
                            $set('status', null);
                        }),
                    Repeater::make('building_safety_structure')
                        ->label('Pengisian Deputy dan Captain Floor')
                        ->schema(fn(Get $get): array => [
                            Select::make('building_floor')
                                ->label('Lantai')
                                ->options(function () {
                                    $startFloor = 1;
                                    $processEndFloor = CompanyData::where('bcm_assessment_code', auth()->user()->current_assessment_code)->select('building_floor')->first();
                                    $endFloor = $processEndFloor->building_floor;
                                    $buildingFloor = collect(range($startFloor, $endFloor))->mapWithKeys(fn($value) => [$value => 'L' . $value])->toArray();

                                    $processEndBasement = CompanyData::where('bcm_assessment_code', auth()->user()->current_assessment_code)->select('building_basement')->first();

                                    $basementFloor = [];
                                    if ($processEndBasement->building_basement == 0) {
                                        $basementFloor = [];
                                    } else {
                                        $startBasement = 1;
                                        $endBasement = $processEndBasement->building_basement;
                                        $basementFloor = collect(range($startBasement, $endBasement))->mapWithKeys(fn($value) => [$value => 'B' . $value])->toArray();
                                    }

                                    $final = array_merge($buildingFloor, $basementFloor);

                                    return $final;
                                })
                                ->dehydrateStateUsing(fn($state, $record, $component) => $component->getOptions()[$state] ?? null),
                            TextInput::make('name')
                                ->label('Nama'),
                            TextInput::make('phone_number')
                                ->label('No Handphone'),
                            Select::make('status')
                                ->label('Status')
                                ->live()
                                ->options(function () use ($get) {
                                    $data = BuildingSafetyTeam::where('location_type', $get('location_type'))->pluck('status', 'id');
                                    return $data;
                                })
                                ->dehydrateStateUsing(fn($state, $record, $component) => $component->getOptions()[$state] ?? null),
                        ])
                        ->deletable(false)
                        ->reorderable(false)
                        ->grid(3)
                        ->columnSpan('full'),
                ]),
        ]);
    }

    public function save()
    {
        $get = $this->form->getState();

        $insert = [];
        foreach ($get['building_safety_structure'] as $row) {
            array_push($insert, [
                'bcm_assessment_code' => auth()->user()->current_assessment_code,  // TODO
                'location_type' => $get['location_type'],
                'building_floor' => $row['building_floor'],
                'status' => $row['status'],
                'name' => $row['name'],
                'phone_number' => $row['phone_number'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        BuildingSafetyStructure::insert($insert);

        return redirect()->to('admin/building-safety-structures');
    }
}
