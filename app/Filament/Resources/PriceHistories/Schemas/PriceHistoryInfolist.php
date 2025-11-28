<?php

namespace App\Filament\Resources\PriceHistories\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PriceHistoryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('region_id')
                    ->numeric(),
                TextEntry::make('year'),
                TextEntry::make('avg_price')
                    ->numeric(),
                TextEntry::make('min_price')
                    ->numeric(),
                TextEntry::make('max_price')
                    ->numeric(),
                TextEntry::make('notes')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
