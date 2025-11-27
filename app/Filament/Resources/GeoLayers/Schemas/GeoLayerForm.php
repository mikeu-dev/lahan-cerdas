<?php

namespace App\Filament\Resources\GeoLayers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class GeoLayerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('layer_type')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('source'),
            ]);
    }
}
