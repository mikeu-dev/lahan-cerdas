<?php

namespace App\Filament\Resources\BusinessRecommendations\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class BusinessRecommendationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('land_plot_id')
                    ->required()
                    ->numeric(),
                TextInput::make('recommended_business')
                    ->required(),
                TextInput::make('potential_score')
                    ->required()
                    ->numeric(),
                Textarea::make('reason')
                    ->columnSpanFull(),
            ]);
    }
}
