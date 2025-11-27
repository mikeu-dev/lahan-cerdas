<?php

namespace App\Filament\Resources\LandPrices\Pages;

use App\Filament\Resources\LandPrices\LandPriceResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditLandPrice extends EditRecord
{
    protected static string $resource = LandPriceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
