<?php

namespace App\Filament\Resources\PriceHistories\Pages;

use App\Filament\Resources\PriceHistories\PriceHistoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPriceHistories extends ListRecords
{
    protected static string $resource = PriceHistoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
