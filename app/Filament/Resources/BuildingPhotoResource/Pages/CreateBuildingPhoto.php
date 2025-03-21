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
        $data['bcm_building_assignment_code'] = 'BPBD/01/29022025/RSV-01';

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
