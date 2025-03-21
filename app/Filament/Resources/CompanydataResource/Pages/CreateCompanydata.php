<?php

namespace App\Filament\Resources\CompanyDataResource\Pages;

use App\Filament\Resources\CompanyDataResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions;

class CreateCompanyData extends CreateRecord
{
    protected static string $resource = CompanyDataResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['building_assignment_code'] = 'BPBD/01/29022025/RSV-01';

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
