<?php

namespace App\Filament\Resources\LandPrices\Pages;

use App\Filament\Resources\LandPrices\LandPriceResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewLandPrice extends ViewRecord
{
    protected static string $resource = LandPriceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
