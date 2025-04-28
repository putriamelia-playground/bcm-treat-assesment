<?php

namespace App\Filament\Resources\GensetResource\Pages;

use App\Filament\Resources\GensetResource;
use Filament\Resources\Pages\Page;

class FormGenset extends Page
{
    protected static string $resource = GensetResource::class;

    protected static string $view = 'filament.resources.genset-resource.pages.form-genset';
}
