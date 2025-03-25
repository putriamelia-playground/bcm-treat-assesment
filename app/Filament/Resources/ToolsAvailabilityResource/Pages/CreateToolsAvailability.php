<?php

namespace App\Filament\Resources\ToolsAvailabilityResource\Pages;

use App\Filament\Resources\ToolsAvailabilityResource;
use App\Models\ToolsAvailability;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions;
use DB;

class CreateToolsAvailability extends CreateRecord
{
    protected static string $resource = ToolsAvailabilityResource::class;

    protected static string $view = 'filament.resources.tools-availability-resource.pages.form-tools-availability';

    public function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Alat Keselamatan')
                ->schema([
                    Repeater::make('tools_with_amount')
                        ->label('')
                        ->schema([
                            Checkbox::make('is_available')
                                ->label(fn($state, $get) => __($get('tools')))
                                ->live()
                                ->default(false),
                            TextInput::make('amount')
                                ->label('Jumlah')
                                ->nullable()
                                ->disabled(fn($get) => !$get('is_available')),
                        ])
                        ->addable(false)
                        ->deletable(false)
                        ->reorderable(false)
                        ->grid(3)
                        ->columnSpan('full')
                        // ->default(fn() => ToolsAvailability::all()->toArray())
                        ->default([
                            ['tools' => 'APAR'],
                            ['tools' => 'APAB'],
                            ['tools' => 'CCTV'],
                            ['tools' => 'Genset'],
                            ['tools' => 'Bahan Bakar Genset'],
                            ['tools' => 'Assembly Point'],
                            ['tools' => 'Kotak P3K'],
                            ['tools' => 'UPS (Uninterruptible Power Supply)'],
                            ['tools' => 'Nomor Kontak Darurat'],
                            ['tools' => 'Sistem Alarm Kebakaran'],
                        ]),
                ]),
            Section::make('Alat Keselamatan 2')
                ->schema([
                    Repeater::make('tools_without_amount')
                        ->label('')
                        ->schema([
                            Checkbox::make('is_available')
                                ->label(fn($state, $get) => __($get('tools')))
                                ->live()
                                ->default(false),
                            TextInput::make('amount')
                                ->label('Jumlah')
                                ->nullable()
                                ->default('0')
                                ->hidden(),
                        ])
                        ->addable(false)
                        ->deletable(false)
                        ->reorderable(false)
                        ->grid(3)
                        ->columnSpan('full')
                        // ->default(fn() => ToolsAvailability::all()->toArray())
                        ->default([
                            ['tools' => 'Sprinkler'],
                            ['tools' => 'Petunjuk Evakuasi'],
                            ['tools' => 'Smoke Detector'],
                            ['tools' => 'Tangga Darurat'],
                            ['tools' => 'Hidran'],
                            ['tools' => 'Trafo'],
                            ['tools' => 'Heat Detector'],
                            ['tools' => 'Paging Gedung'],
                        ]),
                ])
        ]);
    }

    public function save()
    {
        $get = $this->form->getState();

        $dt = array_merge($get['tools_with_amount'], $get['tools_without_amount']);

        $insert = [];
        foreach ($dt as $row) {
            if ($row['is_available'] == true) {
                $insert[] = $row;
            }
        }

        $final = [];
        foreach ($insert as $row) {
            array_push($final, [
                'bcm_building_assignment_code' => 'JSR/01/25032025/PAV-01',  // TODO
                'tools' => $row['tools'],
                'is_available' => $row['is_available'],
                'amount' => $row['amount'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        ToolsAvailability::insert($final);

        return redirect()->to('admin/tools-availabilities');
    }
}
