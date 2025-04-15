<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BuildingPhotoResource\Pages;
use App\Filament\Resources\BuildingPhotoResource\RelationManagers;
use App\Filament\Resources\CompanydataResource\Widgets\CurentCodeInfo;
use App\Filament\Traits\CodeGlobalWidgets;
use App\Models\AssessmentCode;
use App\Models\BuildingPhoto;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextArea;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BuildingPhotoResource extends Resource
{
    protected static ?string $model = BuildingPhoto::class;

    use CodeGlobalWidgets;

    protected static ?string $navigationIcon = 'heroicon-o-building-library';

    protected static ?string $navigationGroup = 'Assessment';

    protected static ?string $navigationLabel = 'Foto Gedung';

    protected static ?string $breadcrumb = 'Foto Gedung';

    protected static ?string $pluralModelLabel = 'Foto Gedung';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('bcm_assessment_code')
                    // ->relationship(
                    //     name: 'codeAssessment',
                    //     titleAttribute: 'assignment_code',
                    //     modifyQueryUsing: fn(Builder $query) => $query->where('assignment_code', auth()->user()->current_assessment_code),
                    // ),
                    // ->default('ap'),
                    // ->options([
                    //     'draft' => 'Draft',
                    //     'reviewing' => 'Reviewing',
                    //     'published' => 'Published',
                    // ])
                    // ->default('draft'),
                    // ->options(fn() => AssessmentCode::where('assignment_code', auth()->user()->current_assessment_code)->pluck('assignment_code', 'user_id'))
                    ->options(fn() => AssessmentCode::pluck('assignment_code', 'user_id'))
                    ->default(auth()->user()->id)
                    ->disabled()
                    ->dehydrated(false),  // don't auto save
                TextArea::make('building_address')
                    ->label('Alamat Gedung')
                    ->required()
                    ->maxLength(255)
                    // ->columnSpan('full')
                    ->rows(5)
                    ->cols(5),
                FileUpload::make('front_building_photo')
                    ->image()
                    ->label('Lokasi Depan Gedung'),
                FileUpload::make('entrance_building_photo')
                    ->label('Pintu Masuk'),
                FileUpload::make('exit_building_photo')
                    ->label('Pintu Keluar'),
                FileUpload::make('leftside_building_photo')
                    ->label('Lokasi Sisi Kiri Gedung'),
                FileUpload::make('rightside_building_photo')
                    ->label('Lokasi Sisi Kanan Gedung'),
                FileUpload::make('behind_building_photo')
                    ->label('Lokasi Belakang Gedung'),
            ])
            ->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('bcm_assessment_code')
                    ->label('Kode Assesment'),
                ImageColumn::make('front_building_photo')
                    ->square(),
                ImageColumn::make('entrance_building_photo')->square(),
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
            'index' => Pages\ListBuildingPhotos::route('/'),
            'create' => Pages\CreateBuildingPhoto::route('/create'),
            'edit' => Pages\EditBuildingPhoto::route('/{record}/edit'),
        ];
    }

    public static function getWidgets(): array
    {
        // return [
        //     CurentCodeInfo::class,
        // ];

        return array_merge(parent::getWidgets(), [
            CurentCodeInfo::class,
        ]);
    }
}
