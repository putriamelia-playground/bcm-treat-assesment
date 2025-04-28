<?php

namespace App\Filament\Resources\HidranResource\Pages;

use App\Filament\Resources\HidranResource;
use App\Models\ChecklistAnswer;
use App\Models\ChecklistItem;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions;

class CreateHidran extends CreateRecord
{
    protected static string $resource = HidranResource::class;

    protected static string $view = 'filament.resources.hidran-resource.pages.form-hidran';

    public function form(Form $form): Form
    {
        $questions = ChecklistItem::where('safety_tool_id', 15)->get();  // TODO static id

        $questionFields = $questions->map(function ($question) {
            return Fieldset::make('')
                ->schema([
                    // Placeholder::make("Checklist_Item_{$question->id}") // TODO do increment number here for every questions with the same id
                    Placeholder::make('Checklist_Item')
                        ->content($question->questions)
                        ->columnSpanFull(),
                    Radio::make("answers.{$question->id}.condition")
                        ->label('Condition')
                        ->options([
                            true => 'Baik',
                            false => 'Buruk',
                        ])
                        ->inline()
                        ->required(),
                    Radio::make("answers.{$question->id}.function")
                        ->label('Function')
                        ->options([
                            true => 'Baik',
                            false => 'Buruk',
                        ])
                        ->inline()
                        ->required(),
                    Hidden::make("answers.{$question->id}.safetyToolId")
                        ->label('id safety tool')
                        ->default($question->safety_tool_id),
                ])
                ->columns(2);
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
