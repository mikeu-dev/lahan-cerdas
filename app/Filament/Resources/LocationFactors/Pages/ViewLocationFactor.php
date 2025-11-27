<?php

namespace App\Filament\Resources\LocationFactors\Pages;

use App\Filament\Resources\LocationFactors\LocationFactorResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewLocationFactor extends ViewRecord
{
    protected static string $resource = LocationFactorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
