<?php

namespace App\Filament\Resources\DisasterHistoriesResource\Pages;

use App\Filament\Resources\DisasterHistoriesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDisasterHistories extends EditRecord
{
    protected static string $resource = DisasterHistoriesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
