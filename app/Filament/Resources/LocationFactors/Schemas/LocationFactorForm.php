<?php

namespace App\Filament\Resources\LocationFactors\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LocationFactorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('category')
                    ->required(),
                TextInput::make('weight')
                    ->required()
                    ->numeric()
                    ->default(1),
            ]);
    }
}
