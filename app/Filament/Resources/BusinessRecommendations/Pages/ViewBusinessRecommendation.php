<?php

namespace App\Filament\Resources\BusinessRecommendations\Pages;

use App\Filament\Resources\BusinessRecommendations\BusinessRecommendationResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewBusinessRecommendation extends ViewRecord
{
    protected static string $resource = BusinessRecommendationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
