<?php

namespace App\Filament\Resources\CompanydataResource\Pages;

use App\Filament\Resources\CompanydataResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCompanydatas extends ListRecords
{
    protected static string $resource = CompanydataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
