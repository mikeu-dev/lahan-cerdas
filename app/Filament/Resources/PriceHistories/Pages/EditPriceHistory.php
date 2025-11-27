<?php

namespace App\Filament\Resources\PriceHistories\Pages;

use App\Filament\Resources\PriceHistories\PriceHistoryResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPriceHistory extends EditRecord
{
    protected static string $resource = PriceHistoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
