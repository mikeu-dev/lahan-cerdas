<?php

namespace App\Filament\Resources\InvestmentSimulations\Pages;

use App\Filament\Resources\InvestmentSimulations\InvestmentSimulationResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditInvestmentSimulation extends EditRecord
{
    protected static string $resource = InvestmentSimulationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
