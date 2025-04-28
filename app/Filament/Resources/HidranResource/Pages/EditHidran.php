<?php

namespace App\Filament\Resources\HidranResource\Pages;

use App\Filament\Resources\HidranResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHidran extends EditRecord
{
    protected static string $resource = HidranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
