<?php

namespace App\Filament\Resources\ApabResource\Pages;

use App\Filament\Resources\ApabResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;

class ListApabs extends ListRecords
{
    protected static string $resource = ApabResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
