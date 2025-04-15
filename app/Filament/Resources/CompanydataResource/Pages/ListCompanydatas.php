<?php

namespace App\Filament\Resources\CompanyDataResource\Pages;

use App\Filament\Resources\CompanydataResource\Widgets\CurentCodeInfo;
use App\Filament\Resources\CompanyDataResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;

class ListCompanyDatas extends ListRecords
{
    protected static string $resource = CompanyDataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Data Perusahaan')
                ->icon('heroicon-s-plus')
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            CurentCodeInfo::class,
        ];
    }
}
