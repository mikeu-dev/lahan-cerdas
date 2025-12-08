<?php

namespace App\Filament\Resources\BusinessRecommendations\Schemas;

use App\Models\LandPlot;
use App\Services\RecommendationEngine;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class BusinessRecommendationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('land_plot_id')
                    ->relationship('plot', 'title')
                    ->required()
                    ->live()
                    ->afterStateUpdated(function (Get $get, Set $set) {
                        $plotId = $get('land_plot_id');
                        if ($plotId) {
                            $plot = LandPlot::find($plotId);
                            if ($plot) {
                                $data = RecommendationEngine::generate($plot);
                                $set('recommended_business', $data['recommended_business']);
                                $set('potential_score', $data['potential_score']);
                                $set('reason', $data['reason']);
                            }
                        }
                    }),
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
