<?php

namespace App\Filament\Resources\LandPriceSources\Pages;

use App\Filament\Resources\LandPriceSources\LandPriceSourceResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditLandPriceSource extends EditRecord
{
    protected static string $resource = LandPriceSourceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
