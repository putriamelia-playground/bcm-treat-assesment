<?php

namespace App\Filament\Resources\ChecklistSafetyResource\Pages;

use App\Filament\Resources\ChecklistSafetyResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;
use Hydrat\TableLayoutToggle\Concerns\HasToggleableTable;

class ListChecklistSafeties extends ListRecords
{
    use HasToggleableTable;

    protected static string $resource = ChecklistSafetyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
