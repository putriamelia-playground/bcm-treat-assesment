<?php

namespace App\Filament\Resources\ToolsAvailabilityResource\Pages;

use App\Filament\Resources\ToolsAvailabilityResource;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Resources\Pages\Page;

class FormToolsAvailability extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string $resource = ToolsAvailabilityResource::class;

    public function mount(): void
    {
        $this->form->fill();
    }
}
