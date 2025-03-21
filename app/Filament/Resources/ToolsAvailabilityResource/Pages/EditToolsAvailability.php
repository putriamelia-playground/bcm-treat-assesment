<?php

namespace App\Filament\Resources\ToolsAvailabilityResource\Pages;

use App\Filament\Resources\ToolsAvailabilityResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditToolsAvailability extends EditRecord
{
    protected static string $resource = ToolsAvailabilityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
