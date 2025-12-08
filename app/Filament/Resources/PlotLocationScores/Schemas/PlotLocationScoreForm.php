<?php

namespace App\Filament\Resources\PlotLocationScores\Schemas;

use App\Models\LandPlot;
use App\Models\LocationFactor;
use App\Services\ScoringEngine;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PlotLocationScoreForm
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
                        $factorId = $get('factor_id');
                        
                        if ($plotId && $factorId) {
                            $plot = LandPlot::find($plotId);
                            $factor = LocationFactor::find($factorId);
                            
                            if ($plot && $factor) {
                                $score = ScoringEngine::generateScore($plot, $factor);
                                $set('score', $score);
                            }
                        }
                    }),
                Select::make('factor_id')
                    ->relationship('factor', 'name')
                    ->required()
                    ->live()
                    ->afterStateUpdated(function (Get $get, Set $set) {
                        $plotId = $get('land_plot_id');
                        $factorId = $get('factor_id');

                        if ($plotId && $factorId) {
                            $plot = LandPlot::find($plotId);
                            $factor = LocationFactor::find($factorId);

                            if ($plot && $factor) {
                                $score = ScoringEngine::generateScore($plot, $factor);
                                $set('score', $score);
                            }
                        }
                    }),
                TextInput::make('score')
                    ->required()
                    ->numeric()
                    ->readOnly()
                    ->helperText('Score calculated by AI Engine'),
                Textarea::make('detail')
                    ->columnSpanFull(),
            ]);
    }
}
