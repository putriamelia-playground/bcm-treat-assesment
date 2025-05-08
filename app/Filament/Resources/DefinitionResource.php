<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DefinitionResource\Pages;
use App\Filament\Resources\DefinitionResource\RelationManagers;
use App\Models\Definition;
use Filament\Forms\Components\TextArea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DefinitionResource extends Resource
{
    protected static ?string $model = Definition::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $navigationGroup = 'Informasi';

    protected static ?string $navigationLabel = 'Daftar Definisi';

    protected static ?string $breadcrumb = 'Daftar Definisi';

    protected static ?string $pluralModelLabel = 'Daftar Definisi';

    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('definition_object_name')
                    ->label('Objek Definisi')
                    ->required()
                    ->maxLength(255),
                TextArea::make('definition_value')
                    ->label('Definisi')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('definition_object_name')
                    ->label('Objek Definisi'),
                TextColumn::make('definition_value')
                    ->label('Definisi')
                    ->wrap(),
            ])
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
            'index' => Pages\ListDefinitions::route('/'),
            'create' => Pages\CreateDefinition::route('/create'),
            'edit' => Pages\EditDefinition::route('/{record}/edit'),
        ];
    }
}
