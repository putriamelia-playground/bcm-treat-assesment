<?php

namespace App\Filament\Resources\BuildingPhotoResource\Pages;

use App\Filament\Resources\BuildingPhotoResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;

class ListBuildingPhotos extends ListRecords
{
    protected static string $resource = BuildingPhotoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Foto Gedung')
                ->icon('heroicon-s-plus')
        ];
    }
}
