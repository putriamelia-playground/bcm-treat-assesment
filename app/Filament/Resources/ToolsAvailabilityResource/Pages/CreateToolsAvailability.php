<?php

namespace App\Filament\Resources\ToolsAvailabilityResource\Pages;

use App\Filament\Resources\ToolsAvailabilityResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions;

class CreateToolsAvailability extends CreateRecord
{
    protected static string $resource = ToolsAvailabilityResource::class;

    // protected function mutateFormDataBeforeCreate(array $data): array
    // {
    //     // $data['building_assignment_code'] = 'BPBD/01/29022025/RSV-01';

    //     dd($data);

    //     // return $data;
    // }
}
