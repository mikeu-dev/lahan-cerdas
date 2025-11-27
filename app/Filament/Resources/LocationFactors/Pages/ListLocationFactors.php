<?php

namespace App\Filament\Resources\LocationFactors\Pages;

use App\Filament\Resources\LocationFactors\LocationFactorResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLocationFactors extends ListRecords
{
    protected static string $resource = LocationFactorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
