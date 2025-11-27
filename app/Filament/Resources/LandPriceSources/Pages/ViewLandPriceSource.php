<?php

namespace App\Filament\Resources\LandPriceSources\Pages;

use App\Filament\Resources\LandPriceSources\LandPriceSourceResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewLandPriceSource extends ViewRecord
{
    protected static string $resource = LandPriceSourceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
