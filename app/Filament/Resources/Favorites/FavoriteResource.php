<?php

namespace App\Filament\Resources\Favorites;

use App\Filament\Resources\Favorites\Pages\CreateFavorite;
use App\Filament\Resources\Favorites\Pages\EditFavorite;
use App\Filament\Resources\Favorites\Pages\ListFavorites;
use App\Filament\Resources\Favorites\Pages\ViewFavorite;
use App\Filament\Resources\Favorites\Schemas\FavoriteForm;
use App\Filament\Resources\Favorites\Schemas\FavoriteInfolist;
use App\Filament\Resources\Favorites\Tables\FavoritesTable;
use App\Models\Favorite;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FavoriteResource extends Resource
{
    protected static ?string $model = Favorite::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Favorite';

    public static function form(Schema $schema): Schema
    {
        return FavoriteForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return FavoriteInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FavoritesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFavorites::route('/'),
            'create' => CreateFavorite::route('/create'),
            'view' => ViewFavorite::route('/{record}'),
            'edit' => EditFavorite::route('/{record}/edit'),
        ];
    }
}
