<?php

namespace App\Filament\Resources\AparResource\Pages;

use App\Filament\Resources\AparResource;
use App\Models\AparTool;
use App\Models\AparType;
use App\Models\ChecklistAnswer;
use App\Models\ChecklistItem;
use App\Models\SafetyTool;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions;

class CreateApar extends CreateRecord
{
    protected static string $resource = AparResource::class;

    protected static string $view = 'filament.resources.apar-resource.pages.form-apar';

    public ?int $toolId = null;

    public function mount(): void
    {
        $this->toolId = request()->get('tool_id');
    }

    public function form(Form $form): Form
    {
        $questions = ChecklistItem::where('safety_tool_id', $this->toolId)->get();
        // dd($this->toolId);

        // $data = SafetyTool::where('id', request()->get('tool_id'))->first();
        // dd($data);

        // $data = request('tool_id');
        // dd($data);

        // dd(request('tool_id'));
        // $questions = ChecklistItem::where('safety_tool_id', $data)->get();

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

        // dd($questionFields);
        return $form
            ->schema($questionFields->toArray());
    }

    public function save()
    {
        // dd($this->form->getState());
        $answers = $this->form->getState()['answers'];
        // dd($answers);

        $insert = [];
        foreach ($answers as $questionId => $response) {
            array_push($insert, [
                'user_id' => auth()->user()->id,
                'safety_tool_id' => $this->toolId,
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
