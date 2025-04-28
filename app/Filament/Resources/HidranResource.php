<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HidranResource\Pages;
use App\Filament\Resources\HidranResource\RelationManagers;
use App\Models\ChecklistAnswer;
use App\Models\ChecklistItem;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Radio;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HidranResource extends Resource
{
    protected static ?string $model = ChecklistAnswer::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Assessment';

    protected static ?string $navigationLabel = 'Detail Hidran';

    protected static ?string $breadcrumb = 'Detail Hidran';

    protected static ?string $pluralModelLabel = 'Detail Hidran';

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
                    ->formatStateUsing(function (string $state) {  // TODO one line aja
                        if ($state == 1) {
                            return 'Baik';
                        } else {
                            return 'Buruk';
                        }
                    }),
                TextColumn::make('function_answer')
                    ->label('Fungsi')
                    ->formatStateUsing(function (string $state) {
                        if ($state == 1) {
                            return 'Baik';
                        } else {
                            return 'Buruk';
                        }
                    }),
            ])
            ->modifyQueryUsing(function (Builder $query) {
                return $query->where('safety_tool_id', 15);  // TODO static safety tool id
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
            'index' => Pages\ListHidrans::route('/'),
            'create' => Pages\CreateHidran::route('/create'),
            'edit' => Pages\EditHidran::route('/{record}/edit'),
        ];
    }
}
