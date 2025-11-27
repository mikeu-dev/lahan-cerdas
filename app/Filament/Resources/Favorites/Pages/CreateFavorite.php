<?php

namespace App\Filament\Resources\Favorites\Pages;

use App\Filament\Resources\Favorites\FavoriteResource;
use Filament\Resources\Pages\CreateRecord;

class CreateFavorite extends CreateRecord
{
    protected static string $resource = FavoriteResource::class;
}
