<?php

namespace App\Filament\Resources\AparResource\Pages;

use App\Filament\Resources\AparResource;
use App\Models\AparTool;
use App\Models\AparType;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions;

class CreateApar extends CreateRecord
{
    protected static string $resource = AparResource::class;

    protected static string $view = 'filament.resources.apar-resource.pages.form-apar';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Repeater::make('apar_tools')
                    ->label('')
                    ->deletable(false)
                    ->reorderable(false)
                    ->grid(3)
                    ->columnSpan('full')
                    ->schema([
                        Select::make('apar_type_id')
                            ->label('Tipe APAR')
                            ->required()
                            ->relationship(name: 'aparType', titleAttribute: 'apar_type_name'),
                        Select::make('apar_weight')
                            ->label('Berat APAR')
                            ->required()
                            ->options([
                                1 => '1 kg',
                                2 => '2 kg',
                                3 => '3 kg',
                                4 => '4 kg',
                                6 => '6 kg',
                                9 => '9 kg',
                            ]),
                        TextInput::make('amount')
                            ->label('Jumlah APAR')
                            ->required()
                            ->maxLength(255),
                    ])
            ]);
    }

    public function save()
    {
        $get = $this->form->getState();

        // dd($get['apar_tools']);
        // $dt = array_merge($get['tools_with_amount'], $get['tools_without_amount']);

        $insert = [];
        foreach ($get['apar_tools'] as $row) {
            array_push($insert, [
                'bcm_assessment_code' => auth()->user()->current_assessment_code,  // TODO
                'apar_type_id' => $row['apar_type_id'],
                'apar_weight' => $row['apar_weight'],
                'amount' => $row['amount'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        // dd($insert);

        AparTool::insert($insert);

        return redirect()->to('admin/checklist-safeties');
    }
}
