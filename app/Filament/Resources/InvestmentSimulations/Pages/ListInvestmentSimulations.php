<?php

namespace App\Filament\Resources\InvestmentSimulations\Pages;

use App\Filament\Resources\InvestmentSimulations\InvestmentSimulationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListInvestmentSimulations extends ListRecords
{
    protected static string $resource = InvestmentSimulationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
