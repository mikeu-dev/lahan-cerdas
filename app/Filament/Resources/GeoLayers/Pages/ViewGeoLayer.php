<?php

namespace App\Filament\Resources\GeoLayers\Pages;

use App\Filament\Resources\GeoLayers\GeoLayerResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewGeoLayer extends ViewRecord
{
    protected static string $resource = GeoLayerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
