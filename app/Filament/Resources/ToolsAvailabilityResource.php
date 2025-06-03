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
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ToolsAvailabilityResource extends Resource
{
    protected static ?string $model = ToolsAvailability::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $navigationGroup = 'Assessment';

    protected static ?string $navigationLabel = 'Daftar Ketersediaan Alat';

    protected static ?string $breadcrumb = 'Daftar Ketersediaan Alat';

    protected static ?string $pluralModelLabel = 'Daftar Ketersediaan Alat';

    protected static ?int $navigationSort = 3;

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
                TextColumn::make('tools')
                    ->label('Alat')
                    ->alignment('center'),
                TextColumn::make('tools_type')
                    ->label('Jenis Alat')
                    ->formatStateUsing(function (string $state) {
                        if ($state == 0) {
                            return 'Peralatan Wajib Ada';
                        } else {
                            return 'Tambahan';
                        }
                    })
                    ->alignment('center'),
                IconColumn::make('is_available')
                    ->boolean()
                    ->label('Ketersediaan Alat')
                    ->alignment('center'),
                TextColumn::make('amount')
                    ->label('Jumlah')
                    ->formatStateUsing(function (string $state) {
                        if ($state == 0) {
                            return '';
                        } else {
                            return $state;
                        }
                    })
                    ->alignment('center'),
                TextColumn::make('notes')
                    ->label('Keterangan')
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\CreateAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->paginated(false);;
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
