<?php

namespace App\Filament\Resources\LandPrices\Pages;

use App\Filament\Resources\LandPrices\LandPriceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLandPrices extends ListRecords
{
    protected static string $resource = LandPriceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
