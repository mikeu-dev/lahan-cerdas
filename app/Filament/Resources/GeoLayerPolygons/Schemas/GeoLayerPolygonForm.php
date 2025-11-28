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
                TextInput::make('display_name'),
                TextInput::make('properties'),
                TextInput::make('geometry_type'),
                Textarea::make('geometry')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
