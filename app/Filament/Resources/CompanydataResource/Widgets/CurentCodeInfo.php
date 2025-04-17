<?php

namespace App\Filament\Resources\CompanydataResource\Widgets;

use App\Models\CompanyData;
use Filament\Widgets\Widget;

class CurentCodeInfo extends Widget
{
    protected static string $view = 'filament.resources.companydata-resource.widgets.curent-code-info';

    public $widgetData;

    public function mount(): void
    {
        $data = CompanyData::where('bcm_assessment_code', auth()->user()->current_assessment_code)->first();

        // $this->widgetData = [
        //     'company_name' => $data->company_name ?? '',
        //     'building_name' => $data->building_name ?? '',
        //     'build_year' => $data->build_year ?? '',
        //     'use_year' => $data->use_year ?? '',
        // ];
    }
}
