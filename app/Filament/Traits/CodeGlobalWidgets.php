<?php

namespace App\Filament\Traits;

use App\Filament\Resources\CompanydataResource\Widgets\CurentCodeInfo;

trait CodeGlobalWidgets
{
    public static function getWidgets(): array
    {
        return [
            CurentCodeInfo::class,
        ];
    }
}
