<?php

namespace App\Filament\Resources\CompanyDataResource\Pages;

use App\Filament\Resources\CompanyDataResource;
use App\Models\AssessmentCode;
use App\Models\ToolsAvailability;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions;
use Illuminate\Database\Eloquent\Model;

class CreateCompanyData extends CreateRecord
{
    protected static string $resource = CompanyDataResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['bcm_assessment_code'] = 'JSR/01/25032025/PAV-01';

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function handleRecordCreation(array $data): Model
    {
        $result = static::getModel()::create($data);

        $data = new AssessmentCode;
        $data->user_id = auth()->id();
        $data->assignment_code = $result->bcm_assessment_code;
        $data->save();

        return $result;
    }
}
