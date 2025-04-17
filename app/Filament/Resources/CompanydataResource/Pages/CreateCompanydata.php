<?php

namespace App\Filament\Resources\CompanyDataResource\Pages;

use App\Filament\Resources\CompanyDataResource;
use App\Models\AssessmentCode;
use App\Models\CompanyData;
use App\Models\ToolsAvailability;
use Carbon\Carbon;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions;
use Illuminate\Database\Eloquent\Model;

class CreateCompanyData extends CreateRecord
{
    protected static string $resource = CompanyDataResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $code01 = auth()->user()->assessor_company_code;
        $code02 = CompanyData::count() + 1;
        $code03date = Carbon::now()->format('d');
        $code03month = Carbon::now()->format('m');
        $code04 = Carbon::now()->format('Y');

        $finalAssessmentCode = $code01 . '/' . $code02 . '/' . $code03date . '-' . $code03month . '/' . $code04;
        $data['bcm_assessment_code'] = $finalAssessmentCode;

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
