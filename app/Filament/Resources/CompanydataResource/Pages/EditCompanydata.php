<?php

namespace App\Filament\Resources\CompanyDataResource\Pages;

use App\Filament\Resources\CompanyDataResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions;

class EditCompanyData extends EditRecord
{
    protected static string $resource = CompanyDataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
