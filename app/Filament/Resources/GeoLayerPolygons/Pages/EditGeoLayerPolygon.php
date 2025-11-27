<?php

namespace App\Filament\Resources\GeoLayerPolygons\Pages;

use App\Filament\Resources\GeoLayerPolygons\GeoLayerPolygonResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditGeoLayerPolygon extends EditRecord
{
    protected static string $resource = GeoLayerPolygonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
