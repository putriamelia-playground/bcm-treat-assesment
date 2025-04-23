<?php

namespace App\Filament\Resources\AparResource\Pages;

use App\Filament\Resources\AparResource;
use Filament\Resources\Pages\Page;

class FormApar extends Page
{
    protected static string $resource = AparResource::class;

    protected static string $view = 'filament.resources.apar-resource.pages.form-apar';
}
