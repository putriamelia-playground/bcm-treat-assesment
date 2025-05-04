<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BuildingSafetyStructureResource\Pages;
use App\Filament\Resources\BuildingSafetyStructureResource\RelationManagers;
use App\Models\BuildingSafetyStructure;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BuildingSafetyStructureResource extends Resource
{
    protected static ?string $model = BuildingSafetyStructure::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Assessment';

    protected static ?string $navigationLabel = 'Struktur Keselamatan Gedung';

    protected static ?string $breadcrumb = 'Struktur Keselamatan Gedung';

    protected static ?string $pluralModelLabel = 'Struktur Keselamatan Gedung';

    protected static ?int $navigationSort = 5;

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
                TextColumn::make('bcm_assessment_code')
                    ->label('Kode Assesment'),
                TextColumn::make('building_floor')
                    ->label('Lantai'),
                TextColumn::make('status')
                    ->label('Status')
                    ->formatStateUsing(function (string $state) {
                        if ($state == 0) {
                            return 'Peralatan Wajib Ada';
                        } else {
                            return 'Tambahan';
                        }
                    }),
                TextColumn::make('name')
                    ->label('Nama'),
                TextColumn::make('phone_number')
                    ->label('Nomor Handphone'),
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
            'index' => Pages\ListBuildingSafetyStructures::route('/'),
            'create' => Pages\CreateBuildingSafetyStructure::route('/create'),
            'edit' => Pages\EditBuildingSafetyStructure::route('/{record}/edit'),
        ];
    }
}
