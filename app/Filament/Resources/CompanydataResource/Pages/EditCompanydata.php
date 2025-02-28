<?php

namespace App\Filament\Resources\CompanydataResource\Pages;

use App\Filament\Resources\CompanydataResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCompanydata extends EditRecord
{
    protected static string $resource = CompanydataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
