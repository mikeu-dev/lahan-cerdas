<?php

namespace App\Filament\Resources\PlotLocationScores\Pages;

use App\Filament\Resources\PlotLocationScores\PlotLocationScoreResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPlotLocationScore extends EditRecord
{
    protected static string $resource = PlotLocationScoreResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
