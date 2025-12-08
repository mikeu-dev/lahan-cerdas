<?php

namespace App\Filament\Resources\InvestmentSimulations\Schemas;

use App\Services\InvestmentCalculator;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
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
                    ->numeric()
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (Get $get, Set $set) {
                        $price = (float) $get('purchase_price');
                        $duration = (float) $get('investment_duration');
                        $growth = (float) $get('expected_growth_rate');

                        $projected = InvestmentCalculator::calculateProjectedValue($price, $duration, $growth);
                        $roi = InvestmentCalculator::calculateRoi($price, $projected);

                        $set('projected_value', round($projected, 2));
                        $set('roi_percent', round($roi, 2));
                    }),
                TextInput::make('investment_duration')
                    ->required()
                    ->numeric()
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (Get $get, Set $set) {
                        $price = (float) $get('purchase_price');
                        $duration = (float) $get('investment_duration');
                        $growth = (float) $get('expected_growth_rate');

                        $projected = InvestmentCalculator::calculateProjectedValue($price, $duration, $growth);
                        $roi = InvestmentCalculator::calculateRoi($price, $projected);

                        $set('projected_value', round($projected, 2));
                        $set('roi_percent', round($roi, 2));
                    }),
                TextInput::make('expected_growth_rate')
                    ->required()
                    ->numeric()
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (Get $get, Set $set) {
                        $price = (float) $get('purchase_price');
                        $duration = (float) $get('investment_duration');
                        $growth = (float) $get('expected_growth_rate');

                        $projected = InvestmentCalculator::calculateProjectedValue($price, $duration, $growth);
                        $roi = InvestmentCalculator::calculateRoi($price, $projected);

                        $set('projected_value', round($projected, 2));
                        $set('roi_percent', round($roi, 2));
                    }),
                TextInput::make('scenario')
                    ->required(),
                TextInput::make('projected_value')
                    ->required()
                    ->numeric()
                    ->readOnly(),
                TextInput::make('roi_percent')
                    ->required()
                    ->numeric()
                    ->readOnly()
                    ->suffix('%'),
            ]);
    }
}
