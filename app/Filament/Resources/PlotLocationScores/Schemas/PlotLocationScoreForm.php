<?php

namespace App\Filament\Resources\PlotLocationScores\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PlotLocationScoreForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('land_plot_id')
                    ->required()
                    ->numeric(),
                TextInput::make('factor_id')
                    ->required()
                    ->numeric(),
                TextInput::make('score')
                    ->required()
                    ->numeric(),
                Textarea::make('detail')
                    ->columnSpanFull(),
            ]);
    }
}
