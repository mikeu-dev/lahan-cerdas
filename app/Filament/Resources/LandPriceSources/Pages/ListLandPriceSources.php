<?php

namespace App\Filament\Resources\LandPriceSources\Pages;

use App\Filament\Resources\LandPriceSources\LandPriceSourceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLandPriceSources extends ListRecords
{
    protected static string $resource = LandPriceSourceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
