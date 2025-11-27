<?php

namespace App\Filament\Resources\GeoLayerPolygons\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class GeoLayerPolygonInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('layer_id')
                    ->numeric(),
                TextEntry::make('geojson')
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
