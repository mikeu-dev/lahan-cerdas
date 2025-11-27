<?php

namespace App\Filament\Resources\BusinessRecommendations\Pages;

use App\Filament\Resources\BusinessRecommendations\BusinessRecommendationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBusinessRecommendations extends ListRecords
{
    protected static string $resource = BusinessRecommendationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
