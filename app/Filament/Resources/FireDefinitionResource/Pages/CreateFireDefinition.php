<?php

namespace App\Filament\Resources\FireDefinitionResource\Pages;

use App\Filament\Resources\FireDefinitionResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions;

class CreateFireDefinition extends CreateRecord
{
    protected static string $resource = FireDefinitionResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
