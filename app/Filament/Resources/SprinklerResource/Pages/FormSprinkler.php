<?php

namespace App\Filament\Resources\SprinklerResource\Pages;

use App\Filament\Resources\SprinklerResource;
use Filament\Resources\Pages\Page;

class FormSprinkler extends Page
{
    protected static string $resource = SprinklerResource::class;

    protected static string $view = 'filament.resources.sprinkler-resource.pages.form-sprinkler';
}
