<?php

namespace App\Filament\Resources\PlotLocationScores\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PlotLocationScoreInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('plot.title')
                    ->numeric(),
                TextEntry::make('factor.name')
                    ->numeric(),
                TextEntry::make('score')
                    ->numeric(),
                TextEntry::make('detail')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
