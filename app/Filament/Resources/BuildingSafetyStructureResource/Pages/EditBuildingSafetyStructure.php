<?php

namespace App\Filament\Resources\BuildingSafetyStructureResource\Pages;

use App\Filament\Resources\BuildingSafetyStructureResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBuildingSafetyStructure extends EditRecord
{
    protected static string $resource = BuildingSafetyStructureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
