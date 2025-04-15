<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChecklistSafetyResource\Pages;
use App\Filament\Resources\ChecklistSafetyResource\RelationManagers;
use App\Models\ChecklistSafety;
use App\Models\ToolsAvailability;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\Layout\Grid;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ChecklistSafetyResource extends Resource
{
    protected static ?string $model = ToolsAvailability::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';

    protected static ?string $navigationGroup = 'Assessment';

    protected static ?string $navigationLabel = 'Data Checklist Peralatan Keselamatan';

    protected static ?string $breadcrumb = 'Data Checklist Peralatan Keselamatan';

    protected static ?string $pluralModelLabel = 'Data Checklist Peralatan Keselamatan';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        $livewire = $table->getLivewire();
        return $table
            // ->columns([
            //     TextColumn::make('amount')
            //         ->icon('heroicon-m-phone'),
            //     TextColumn::make('tools')
            //         ->icon('heroicon-m-envelope'),
            // ])
            // ->filters([
            //     //
            // ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            // ->bulkActions([
            //     Tables\Actions\BulkActionGroup::make([
            //         Tables\Actions\DeleteBulkAction::make(),
            //     ]),
            // ])
            ->columns(
                $livewire->isGridLayout()
                    ? static::getGridTableColumns()
                    : static::getListTableColumns()
            )
            ->contentGrid(
                fn() => $livewire->isListLayout()
                    ? null
                    : [
                        'md' => 2,
                        'lg' => 3,
                        'xl' => 4,
                    ]
            );
    }

    public static function getListTableColumns(): array
    {
        return [
            Stack::make([
                TextColumn::make('amount')
                    ->icon('heroicon-m-phone'),
                TextColumn::make('tools')
                    ->icon('heroicon-m-envelope'),
            ]),
        ];
    }

    public static function getGridTableColumns(): array
    {
        return [
            Stack::make([
                TextColumn::make('amount')
                    ->icon('heroicon-m-phone'),
                TextColumn::make('tools')
                    ->icon('heroicon-m-envelope'),
            ]),
        ];
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
            'index' => Pages\ListChecklistSafeties::route('/'),
            'create' => Pages\CreateChecklistSafety::route('/create'),
            'edit' => Pages\EditChecklistSafety::route('/{record}/edit'),
        ];
    }
}
