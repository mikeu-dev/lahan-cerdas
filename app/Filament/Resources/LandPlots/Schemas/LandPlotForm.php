<?php

namespace App\Filament\Resources\LandPlots\Schemas;

use App\Forms\Components\MapPicker;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class LandPlotForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                TextInput::make('region_id')
                    ->required()
                    ->numeric(),
                TextInput::make('title')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                Section::make('Location Details')
                    ->schema([
                        MapPicker::make('location_map')
                            ->label('Pick Location on Map')
                            ->latField('data.latitude')
                            ->lngField('data.longitude')
                            ->columnSpanFull(),
                        Grid::make(2)
                            ->schema([
                                TextInput::make('latitude')
                                    ->required()
                                    ->numeric(),
                                TextInput::make('longitude')
                                    ->required()
                                    ->numeric(),
                            ]),
                        TextInput::make('address')
                            ->columnSpanFull(),
                    ]),
                TextInput::make('land_area')
                    ->required()
                    ->numeric(),
                TextInput::make('status')
                    ->required()
                    ->default('saved'),
            ]);
    }
}
