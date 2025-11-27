<?php

namespace App\Filament\Resources\PlotLocationScores\Pages;

use App\Filament\Resources\PlotLocationScores\PlotLocationScoreResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPlotLocationScore extends ViewRecord
{
    protected static string $resource = PlotLocationScoreResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
