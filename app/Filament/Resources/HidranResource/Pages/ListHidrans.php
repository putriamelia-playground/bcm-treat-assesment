<?php

namespace App\Filament\Resources\HidranResource\Pages;

use App\Filament\Resources\HidranResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;

class ListHidrans extends ListRecords
{
    protected static string $resource = HidranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
