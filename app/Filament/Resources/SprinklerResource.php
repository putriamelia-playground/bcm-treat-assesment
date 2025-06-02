<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SprinklerResource\Pages;
use App\Filament\Resources\SprinklerResource\RelationManagers;
use App\Models\ChecklistAnswer;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SprinklerResource extends Resource
{
    protected static ?string $model = ChecklistAnswer::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Assessment';

    protected static ?string $navigationLabel = 'Detail Sprinkler';

    protected static ?string $breadcrumb = 'Detail Sprinkler';

    protected static ?string $pluralModelLabel = 'Detail Sprinkler';

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('safetyTool.tool_name')
                    ->label('Alat Keselamatan'),
                TextColumn::make('checklistItem.questions')
                    ->label('Checklist Item')
                    ->wrap(),
                TextColumn::make('condition_answer')
                    ->label('Kondisi')
                    ->formatStateUsing(fn(string $state) => $state == 1 ? 'Baik' : 'Buruk'),
                TextColumn::make('function_answer')
                    ->label('Fungsi')
                    ->formatStateUsing(fn(string $state) => $state == 1 ? 'Baik' : 'Buruk'),
            ])
            ->modifyQueryUsing(function (Builder $query) {
                return $query->where('safety_tool_id', request()->get('tool_id'));  // TODO static safety tool id
            })
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSprinklers::route('/'),
            'create' => Pages\CreateSprinkler::route('/create'),
            'edit' => Pages\EditSprinkler::route('/{record}/edit'),
        ];
    }
}
