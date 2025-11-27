<?php

namespace App\Filament\Resources\GeoLayers\Pages;

use App\Filament\Resources\GeoLayers\GeoLayerResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListGeoLayers extends ListRecords
{
    protected static string $resource = GeoLayerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
