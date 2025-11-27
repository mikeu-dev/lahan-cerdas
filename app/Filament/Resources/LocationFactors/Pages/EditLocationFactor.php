<?php

namespace App\Filament\Resources\LocationFactors\Pages;

use App\Filament\Resources\LocationFactors\LocationFactorResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditLocationFactor extends EditRecord
{
    protected static string $resource = LocationFactorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
