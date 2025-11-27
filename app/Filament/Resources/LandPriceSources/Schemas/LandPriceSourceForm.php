<?php

namespace App\Filament\Resources\LandPriceSources\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class LandPriceSourceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('reliability_score')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
