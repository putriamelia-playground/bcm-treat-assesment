<?php

namespace App\Filament\Resources\CompanyDataResource\Pages;

use App\Filament\Resources\CompanyDataResource;
use App\Models\ToolsAvailability;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions;
use Illuminate\Database\Eloquent\Model;

class CreateCompanyData extends CreateRecord
{
    protected static string $resource = CompanyDataResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['building_assignment_code'] = 'JSR/01/25032025/PAV-01';

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    // protected function handleRecordCreation(array $data): Model
    // {
    //     $result = static::getModel()::create($data);

    //     $data = new ToolsAvailability;
    //     $data->bcm_building_assignment_code = $result->building_assignment_code;
    //     $data->save();

    //     // dd($result->building_assignment_code);
    //     return $result;
    // }
}
