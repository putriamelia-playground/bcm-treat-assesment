<?php

namespace App\Filament\Resources\ApabResource\Pages;

use App\Filament\Resources\ApabResource;
use App\Models\ApabTool;
use App\Models\ChecklistAnswer;
use App\Models\ChecklistItem;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Radio;
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
        $questions = ChecklistItem::where('safety_tool_id', 16)->get();  // TODO static id

        $questionFields = $questions->map(function ($question) {
            return Grid::make(2)
                ->schema([
                    Fieldset::make('')
                        ->schema([
                            Grid::make(3)
                                ->schema([
                                    // Placeholder::make("Checklist_Item_{$question->id}")  // TODO do increment number here for every questions with the same id
                                    Placeholder::make('Checklist_Item')
                                        ->content($question->questions),
                                    Select::make("answers.{$question->id}.condition")
                                        ->label('Kondisi')
                                        ->options([
                                            true => 'Baik',
                                            false => 'Buruk',
                                        ])
                                        ->required(),
                                    Select::make("answers.{$question->id}.function")
                                        ->label('Fungsi')
                                        ->options([
                                            true => 'Baik',
                                            false => 'Buruk',
                                        ])
                                        ->required(),
                                    Hidden::make("answers.{$question->id}.safetyToolId")
                                        ->label('id safety tool')
                                        ->default($question->safety_tool_id),
                                ])
                        ]),
                ]);
        });

        return $form
            ->schema($questionFields->toArray());
    }

    public function save()
    {
        $answers = $this->form->getState()['answers'];

        $insert = [];
        foreach ($answers as $questionId => $response) {
            array_push($insert, [
                'user_id' => auth()->user()->id,
                'safety_tool_id' => $response['safetyToolId'],
                'checklist_item_id' => $questionId,
                'condition_answer' => $response['condition'],
                'function_answer' => $response['function'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        ChecklistAnswer::insert($insert);

        return redirect()->to('admin/checklist-safeties');
    }
}
