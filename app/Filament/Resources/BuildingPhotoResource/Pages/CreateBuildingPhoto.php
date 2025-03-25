<?php

namespace App\Filament\Resources\BuildingPhotoResource\Pages;

use App\Filament\Resources\BuildingPhotoResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions;

class CreateBuildingPhoto extends CreateRecord
{
    protected static string $resource = BuildingPhotoResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['bcm_building_assignment_code'] = 'JSR/01/25032025/PAV-01';

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
