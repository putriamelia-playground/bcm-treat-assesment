<?php

namespace App\Filament\Resources\FireDefinitionResource\Pages;

use App\Filament\Resources\FireDefinitionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFireDefinitions extends ListRecords
{
    protected static string $resource = FireDefinitionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
