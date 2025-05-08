<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RegulationResource\Pages;
use App\Filament\Resources\RegulationResource\RelationManagers;
use App\Models\Regulation;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextArea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RegulationResource extends Resource
{
    protected static ?string $model = Regulation::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $navigationGroup = 'Informasi';

    protected static ?string $navigationLabel = 'Daftar Regulasi';

    protected static ?string $breadcrumb = 'Daftar Regulasi';

    protected static ?string $pluralModelLabel = 'Daftar Regulasi';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('bcm_regulation_type_id')
                    ->relationship(name: 'regulationType', titleAttribute: 'regulation_type_name'),
                TextArea::make('regulation_value')
                    ->label('Isi Regulasi')
                    ->required()
                    ->maxLength(255),
                TextInput::make('regulation_year')
                    ->label('Tahun Regulasi')
                    ->required()
                    ->maxLength(255),
                Select::make('regulation_status')
                    ->options([
                        '0' => 'Tidak Berlaku',
                        '1' => 'Berlaku',
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            // ->groups([
            //     Group::make('regulationType.regulation_type_name')
            //         ->titlePrefixedWithLabel(false),
            // ])
            ->defaultGroup('regulationType.regulation_type_name')
            ->columns([
                TextColumn::make('regulation_value')
                    ->label('Nama Regulasi')
                    ->wrap(),
                TextColumn::make('regulation_year')
                    ->label('Tahun Regulasi'),
                // TextColumn::make('regulationType.regulation_type_name')
                //     ->label('Jenis Regulasi'),
                TextColumn::make('regulation_status')
                    ->label('Status Regulasi')
                    ->formatStateUsing(function (string $state) {
                        if ($state == 0) {
                            return 'Tidak Berlaku';
                        } else {
                            return 'Berlaku';
                        }
                    }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
        // ->bulkActions([
        //     Tables\Actions\BulkActionGroup::make([
        //         Tables\Actions\DeleteBulkAction::make(),
        //     ]),
        // ]);
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
            'index' => Pages\ListRegulations::route('/'),
            'create' => Pages\CreateRegulation::route('/create'),
            'edit' => Pages\EditRegulation::route('/{record}/edit'),
        ];
    }
}
