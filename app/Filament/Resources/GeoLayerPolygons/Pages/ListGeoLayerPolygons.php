<?php

namespace App\Filament\Resources\GeoLayerPolygons\Pages;

use App\Filament\Resources\GeoLayerPolygons\GeoLayerPolygonResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListGeoLayerPolygons extends ListRecords
{
    protected static string $resource = GeoLayerPolygonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
