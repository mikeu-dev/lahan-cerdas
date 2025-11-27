<?php

namespace App\Filament\Resources\GeoLayerPolygons\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class GeoLayerPolygonForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('layer_id')
                    ->required()
                    ->numeric(),
                Textarea::make('geojson')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
