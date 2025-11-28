<?php

namespace App\Filament\Resources\PriceHistories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PriceHistoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('region_id')
                    ->required()
                    ->numeric(),
                TextInput::make('year')
                    ->required(),
                TextInput::make('avg_price')
                    ->required()
                    ->numeric(),
                TextInput::make('min_price')
                    ->required()
                    ->numeric(),
                TextInput::make('max_price')
                    ->required()
                    ->numeric(),
                Textarea::make('notes')
                    ->columnSpanFull(),
            ]);
    }
}
