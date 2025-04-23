<?php

namespace App\Filament\Resources\ApabResource\Pages;

use App\Filament\Resources\ApabResource;
use App\Models\ApabTool;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions;

class CreateApab extends CreateRecord
{
    protected static string $resource = ApabResource::class;

    protected static string $view = 'filament.resources.apab-resource.pages.form-apab';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Repeater::make('apab_tools')
                    ->label('')
                    ->deletable(false)
                    ->reorderable(false)
                    ->grid(3)
                    ->columnSpan('full')
                    ->schema([
                        Select::make('apab_type_id')
                            ->label('Tipe APAR')
                            ->required()
                            ->relationship(name: 'apabType', titleAttribute: 'apab_type_name'),
                        Select::make('apab_weight')
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

        $insert = [];
        foreach ($get['apab_tools'] as $row) {
            array_push($insert, [
                'bcm_assessment_code' => auth()->user()->current_assessment_code,  // TODO
                'apab_type_id' => $row['apab_type_id'],
                'apab_weight' => $row['apab_weight'],
                'amount' => $row['amount'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        // dd($insert);

        ApabTool::insert($insert);

        return redirect()->to('admin/checklist-safeties');
    }
}
