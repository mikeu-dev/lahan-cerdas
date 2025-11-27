<?php

namespace App\Filament\Resources\InvestmentSimulations\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class InvestmentSimulationInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('user_id')
                    ->numeric(),
                TextEntry::make('land_plot_id')
                    ->numeric(),
                TextEntry::make('purchase_price')
                    ->numeric(),
                TextEntry::make('investment_duration')
                    ->numeric(),
                TextEntry::make('expected_growth_rate')
                    ->numeric(),
                TextEntry::make('scenario'),
                TextEntry::make('projected_value')
                    ->numeric(),
                TextEntry::make('roi_percent')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
