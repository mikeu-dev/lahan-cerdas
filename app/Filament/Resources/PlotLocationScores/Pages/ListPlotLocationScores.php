<?php

namespace App\Filament\Resources\PlotLocationScores\Pages;

use App\Filament\Resources\PlotLocationScores\PlotLocationScoreResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPlotLocationScores extends ListRecords
{
    protected static string $resource = PlotLocationScoreResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
