<?php

namespace App\Filament\Resources\Regions\Schemas;

use App\Models\Region;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class RegionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('user_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('name'),
                TextEntry::make('parent_id')
                    ->numeric()
                    ->placeholder('-'),
            ]);
    }
}
