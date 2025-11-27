<?php

namespace App\Filament\Resources\PriceHistories\Pages;

use App\Filament\Resources\PriceHistories\PriceHistoryResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPriceHistory extends ViewRecord
{
    protected static string $resource = PriceHistoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
