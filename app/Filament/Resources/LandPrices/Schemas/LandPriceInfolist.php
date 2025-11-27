<?php

namespace App\Filament\Resources\LandPrices\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class LandPriceInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('land_plot_id')
                    ->numeric(),
                TextEntry::make('source_id')
                    ->numeric(),
                TextEntry::make('price_per_m2')
                    ->numeric(),
                TextEntry::make('year')
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
