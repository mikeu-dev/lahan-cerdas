<?php

namespace App\Filament\Resources\BusinessRecommendations\Pages;

use App\Filament\Resources\BusinessRecommendations\BusinessRecommendationResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditBusinessRecommendation extends EditRecord
{
    protected static string $resource = BusinessRecommendationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
