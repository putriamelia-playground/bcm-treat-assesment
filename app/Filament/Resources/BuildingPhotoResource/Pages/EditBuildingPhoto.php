<?php

namespace App\Filament\Resources\BuildingPhotoResource\Pages;

use App\Filament\Resources\BuildingPhotoResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions;

class EditBuildingPhoto extends EditRecord
{
    protected static string $resource = BuildingPhotoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
