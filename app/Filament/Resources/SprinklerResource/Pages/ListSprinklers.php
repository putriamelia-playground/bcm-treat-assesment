<?php

namespace App\Filament\Resources\SprinklerResource\Pages;

use App\Filament\Resources\SprinklerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSprinklers extends ListRecords
{
    protected static string $resource = SprinklerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
