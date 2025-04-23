<?php

namespace App\Filament\Resources\ApabResource\Pages;

use App\Filament\Resources\ApabResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditApab extends EditRecord
{
    protected static string $resource = ApabResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
