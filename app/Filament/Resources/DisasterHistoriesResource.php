<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DisasterHistoriesResource\Pages;
use App\Filament\Resources\DisasterHistoriesResource\RelationManagers;
use App\Models\AssessmentCode;
use App\Models\DisasterHistory;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Tables;
use Icetalker\FilamentTableRepeater\Forms\Components\TableRepeater;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DisasterHistoriesResource extends Resource
{
    protected static ?string $model = DisasterHistory::class;

    protected static ?string $navigationGroup = 'Assessment';

    protected static ?string $navigationIcon = 'heroicon-o-exclamation-triangle';

    protected static ?string $navigationLabel = 'Historis Bencana';

    protected static ?string $breadcrumb = 'Historis Bencana';

    protected static ?string $pluralModelLabel = 'Historis Bencana';

    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('bcm_assessment_code')
                    ->label('Kode Assessment')
                    ->options(fn() => AssessmentCode::pluck('assignment_code', 'user_id'))
                    ->default(auth()->user()->id)
                    ->columnSpan('full')
                    ->disabled(),
                Select::make('disaster_type')
                    ->label('Jenis Bencana')
                    ->options([
                        1 => 'Gempa Bumi',
                        2 => 'Kebakaran',
                        3 => 'Banjir',
                        4 => 'Kebakaran Hutan',
                        5 => 'Liquid',
                    ])
                    ->dehydrateStateUsing(fn($state, $record, $component) => $component->getOptions()[$state] ?? null),
                DatePicker::make('disaster_time')
                    ->label('Waktu'),
                TextInput::make('disaster_impact')
                    ->label('Dampak Bencana'),
                TextInput::make('disaster_fatality')
                    ->label('Jumlah Korban Jiwa')
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('disaster_type')
                    ->label('Jenis Bencana'),
                TextColumn::make('disaster_time')
                    ->label('Waktu'),
                TextColumn::make('disaster_impact')
                    ->label('Dampak Bencana'),
                TextColumn::make('disaster_fatality')
                    ->label('Jumlah Korban Jiwa'),
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
            'index' => Pages\ListDisasterHistories::route('/'),
            'create' => Pages\CreateDisasterHistories::route('/create'),
            'edit' => Pages\EditDisasterHistories::route('/{record}/edit'),
        ];
    }
}
