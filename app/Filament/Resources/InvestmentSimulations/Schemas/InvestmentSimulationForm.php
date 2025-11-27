<?php

namespace App\Filament\Resources\InvestmentSimulations\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class InvestmentSimulationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                TextInput::make('land_plot_id')
                    ->required()
                    ->numeric(),
                TextInput::make('purchase_price')
                    ->required()
                    ->numeric(),
                TextInput::make('investment_duration')
                    ->required()
                    ->numeric(),
                TextInput::make('expected_growth_rate')
                    ->required()
                    ->numeric(),
                TextInput::make('scenario')
                    ->required(),
                TextInput::make('projected_value')
                    ->required()
                    ->numeric(),
                TextInput::make('roi_percent')
                    ->required()
                    ->numeric(),
            ]);
    }
}
