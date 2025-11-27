<?php

namespace App\Filament\Resources\InvestmentSimulations\Pages;

use App\Filament\Resources\InvestmentSimulations\InvestmentSimulationResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewInvestmentSimulation extends ViewRecord
{
    protected static string $resource = InvestmentSimulationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
