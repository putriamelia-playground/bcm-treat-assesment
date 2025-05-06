<?php

namespace App\Filament\Resources\ToolsAvailabilityResource\Pages;

use App\Filament\Resources\ToolsAvailabilityResource;
use App\Models\AssessmentCode;
use App\Models\SafetyTool;
use App\Models\ToolsAvailability;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions;
use Icetalker\FilamentTableRepeater\Forms\Components\TableRepeater;

class CreateToolsAvailability extends CreateRecord
{
    protected static string $resource = ToolsAvailabilityResource::class;

    protected static string $view = 'filament.resources.tools-availability-resource.pages.form-tools-availability';

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
            Section::make('Sarana Prasarana Keselamatan')
                ->schema([
                    TableRepeater::make('tools')
                        ->schema([
                            Checkbox::make('is_available')
                                ->label('')
                                ->live(),
                            TextInput::make('tool_name')
                                ->label('Tools')
                                ->nullable()
                                ->default(fn($state, $get) => __($get('tool_name')))
                                ->readOnly(),
                            TextInput::make('jenis_tool')
                                ->label('Jenis Alat')
                                ->nullable()
                                ->default(fn($state, $get) => $get('tool_type') === 1 ? 'Tambahan' : 'Wajib Ada')
                                ->readOnly(),
                            TextInput::make('amount')
                                ->label('Jumlah')
                                ->nullable()
                                ->disabled(fn($get) => $get('tool_type') === 1),
                            TextInput::make('notes')
                                ->label('Keterangan')
                                ->nullable(),
                        ])
                        ->reorderable(false)
                        ->addable(false)
                        ->deletable(false)
                        ->columnSpan('full')
                        ->default(function () {
                            $data = SafetyTool::select('tool_name', 'tool_type')->get()->toArray();

                            return $data;
                        }),
                ]),
        ]);
    }

    public function save()
    {
        $get = $this->form->getState()['tools'];

        $insert = [];
        foreach ($get as $row) {
            if ($row['tool_type'] == 1) {
                $row['amount'] = null;
            }
            $insert[] = $row;
        }

        $final = [];
        foreach ($insert as $row) {
            array_push($final, [
                'bcm_assessment_code' => auth()->user()->current_assessment_code,  // TODO
                'tools' => $row['tool_name'],
                'tools_type' => $row['tool_type'],
                'is_available' => $row['is_available'],
                'amount' => $row['amount'],
                'notes' => $row['notes'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        ToolsAvailability::insert($final);

        return redirect()->to('admin/tools-availabilities');
    }
}
