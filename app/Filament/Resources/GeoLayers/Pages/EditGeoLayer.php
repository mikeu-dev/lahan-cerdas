<?php

namespace App\Filament\Resources\GeoLayers\Pages;

use App\Filament\Resources\GeoLayers\GeoLayerResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditGeoLayer extends EditRecord
{
    protected static string $resource = GeoLayerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
