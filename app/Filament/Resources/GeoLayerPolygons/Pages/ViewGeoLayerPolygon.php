<?php

namespace App\Filament\Resources\GeoLayerPolygons\Pages;

use App\Filament\Resources\GeoLayerPolygons\GeoLayerPolygonResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewGeoLayerPolygon extends ViewRecord
{
    protected static string $resource = GeoLayerPolygonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
