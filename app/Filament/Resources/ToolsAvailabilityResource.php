<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ToolsAvailabilityResource\Pages;
use App\Filament\Resources\ToolsAvailabilityResource\RelationManagers;
use App\Models\ToolsAvailability;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ToolsAvailabilityResource extends Resource
{
    protected static ?string $model = ToolsAvailability::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $navigationLabel = 'Daftar Ketersediaan Alat';

    protected static ?string $breadcrumb = 'Daftar Ketersediaan Alat';

    protected static ?string $pluralModelLabel = 'Daftar Ketersediaan Alat';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Repeater::make('bcm_tools_availabilities')
                //     ->schema([
                //         Checkbox::make('is_available')
                //             ->label(fn($state, $get) => __($get('tools')))
                //             ->live()
                //             ->default(false),
                //         TextInput::make('amount')
                //             ->label('Jumlah')
                //             ->nullable()
                //             ->disabled(fn($get) => !$get('is_available')),
                //     ])
                //     ->addable(false)
                //     ->deletable(false)
                //     ->reorderable(false)
                //     ->grid(3)
                //     ->columnSpan('full')
                //     ->default([
                //         ['tools' => 'APAR'],
                //         ['tools' => 'APAB'],
                //         // ['tools' => 'CCTV'],
                //         // ['tools' => 'Tangga Darurat'],
                //         // ['tools' => 'Genset'],
                //         // ['tools' => 'Bahan Bakar Genset'],
                //         // ['tools' => 'Assembly point'],
                //         // ['tools' => 'Kotak P3K'],
                //         // ['tools' => 'UPS(Uninterruptible Power Supply)'],
                //         // ['tools' => 'Nomor Kontak Darurat'],
                //     ]),
                // Repeater::make('bcm_tools_availabilities_2')
                //     ->schema([
                //         Checkbox::make('is_available')
                //             ->label(fn($state, $get) => __($get('tools')))
                //             ->live()
                //             ->default(false),
                //     ])
                //     ->addable(false)
                //     ->deletable(false)
                //     ->reorderable(false)
                //     ->grid(3)
                //     ->columnSpan('full')
                //     ->default([
                //         ['tools' => 'Sprinkler'],
                //         ['tools' => 'Hidran'],
                //         ['tools' => 'Trafo'],
                //         ['tools' => 'Smoke Detector'],
                //         ['tools' => 'Heat Detector'],
                //         ['tools' => 'Petunjuk Jalur Evakuasi'],
                //         ['tools' => 'Paging Gedung'],
                //     ])
                Repeater::make('dummy')
                    ->schema([
                        TextInput::make('name')->required(),
                        Select::make('role')
                            ->options([
                                'member' => 'Member',
                                'administrator' => 'Administrator',
                                'owner' => 'Owner',
                            ])
                            ->required(),
                    ])
                    ->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListToolsAvailabilities::route('/'),
            'create' => Pages\CreateToolsAvailability::route('/create'),
            'edit' => Pages\EditToolsAvailability::route('/{record}/edit'),
        ];
    }
}
