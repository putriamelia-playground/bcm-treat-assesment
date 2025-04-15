<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FireDefinitionResource\Pages;
use App\Filament\Resources\FireDefinitionResource\RelationManagers;
use App\Models\FireDefinition;
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

class FireDefinitionResource extends Resource
{
    protected static ?string $model = FireDefinition::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $navigationGroup = 'Information';

    protected static ?string $navigationLabel = 'Daftar Definisi Kebakaran';

    protected static ?string $breadcrumb = 'Daftar Definisi Kebakaran';

    protected static ?string $pluralModelLabel = 'Daftar Definisi Kebakaran';

    protected static ?int $navigationSort = 7;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('fire_definition_object_name')
                    ->label('Objek Definisi Kebakaran')
                    ->required()
                    ->maxLength(255),
                TextArea::make('fire_definition_value')
                    ->label('Definisi Kebakaran')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('fire_definition_object_name')
                    ->label('Objek Definisi'),
                TextColumn::make('fire_definition_value')
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
            'index' => Pages\ListFireDefinitions::route('/'),
            'create' => Pages\CreateFireDefinition::route('/create'),
            'edit' => Pages\EditFireDefinition::route('/{record}/edit'),
        ];
    }
}
