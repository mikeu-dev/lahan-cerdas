<?php

namespace App\Filament\Resources\LandPrices\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class LandPriceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('land_plot_id')
                    ->required()
                    ->numeric(),
                TextInput::make('source_id')
                    ->required()
                    ->numeric(),
                TextInput::make('price_per_m2')
                    ->required()
                    ->numeric(),
                TextInput::make('year')
                    ->required(),
                Textarea::make('notes')
                    ->columnSpanFull(),
            ]);
    }
}
