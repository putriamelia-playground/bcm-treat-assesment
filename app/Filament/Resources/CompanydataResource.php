<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanydataResource\Widgets\CurentCodeInfo;
use App\Filament\Resources\CompanyDataResource\Pages;
use App\Filament\Resources\CompanyDataResource\RelationManagers;
use App\Models\AssessmentCode;
use App\Models\CompanyData;
use App\Models\OwnershipStatus;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CompanyDataResource extends Resource
{
    protected static ?string $model = CompanyData::class;

    protected static ?string $navigationGroup = 'Assessment';

    protected static ?string $navigationIcon = 'heroicon-o-document';

    protected static ?string $navigationLabel = 'Data Perusahaan';

    protected static ?string $breadcrumb = 'Data Perusahaan';

    protected static ?string $pluralModelLabel = 'Data Perusahaan';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Data Perusahaan')
                    ->schema([
                        TextInput::make('company_name')
                            ->label('Nama Perusahaan')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('building_name')
                            ->label('Nama Gedung/Fasilitas')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('build_year')
                            ->label('Tahun Pembangunan')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('use_year')
                            ->label('Tahun Penggunaan')
                            ->required()
                            ->maxLength(255),
                        Select::make('bcm_building_ownership_status_id')
                            ->label('Status Kepemilikan')
                            ->relationship(name: 'buildingownership', titleAttribute: 'owner_status_name')
                            ->native(false),
                        TextInput::make('bulding_resident')
                            ->label('Jumlah Penghuni')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->columns(2),
                Section::make('Jumlah Lantai')
                    ->schema([
                        TextInput::make('building_floor')
                            ->label('Lantai')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('building_basement')
                            ->label('Basement')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('bcm_assessment_code')
                    ->label('Kode Assesment'),
                TextColumn::make('company_name')
                    ->label('Perusahaan'),
                TextColumn::make('building_name')
                    ->label('Gedung/Fasilitas'),
                TextColumn::make('build_year')
                    ->label('Tahun Pembangunan'),
                TextColumn::make('use_year')
                    ->label('Tahun Penggunaan'),
                TextColumn::make('buildingownership.owner_status_name')
                    ->label('Status Kepemilikan'),
                TextColumn::make('bulding_resident')
                    ->label('Jumlah Penghuni'),
            ])
            ->modifyQueryUsing(function (Builder $query) {
                return $query->where('bcm_assessment_code', auth()->user()->current_assessment_code);
            })
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListCompanyDatas::route('/'),
            'create' => Pages\CreateCompanyData::route('/create'),
            'edit' => Pages\EditCompanyData::route('/{record}/edit'),
        ];
    }

    public static function getWidgets(): array
    {
        return [
            CurentCodeInfo::class,
        ];
    }
}
