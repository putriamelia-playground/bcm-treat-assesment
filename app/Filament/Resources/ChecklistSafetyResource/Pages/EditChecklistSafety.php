<?php

namespace App\Filament\Resources\ChecklistSafetyResource\Pages;

use App\Filament\Resources\ChecklistSafetyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditChecklistSafety extends EditRecord
{
    protected static string $resource = ChecklistSafetyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
