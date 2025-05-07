<?php

namespace App\Filament\Resources\DisasterHistoriesResource\Pages;

use App\Filament\Resources\DisasterHistoriesResource;
use App\Models\CompanyData;
use Carbon\Carbon;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions;

class CreateDisasterHistories extends CreateRecord
{
    protected static string $resource = DisasterHistoriesResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

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
}
