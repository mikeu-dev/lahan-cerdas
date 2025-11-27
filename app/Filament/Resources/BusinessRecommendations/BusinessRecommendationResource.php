<?php

namespace App\Filament\Resources\BusinessRecommendations;

use App\Filament\Resources\BusinessRecommendations\Pages\CreateBusinessRecommendation;
use App\Filament\Resources\BusinessRecommendations\Pages\EditBusinessRecommendation;
use App\Filament\Resources\BusinessRecommendations\Pages\ListBusinessRecommendations;
use App\Filament\Resources\BusinessRecommendations\Pages\ViewBusinessRecommendation;
use App\Filament\Resources\BusinessRecommendations\Schemas\BusinessRecommendationForm;
use App\Filament\Resources\BusinessRecommendations\Schemas\BusinessRecommendationInfolist;
use App\Filament\Resources\BusinessRecommendations\Tables\BusinessRecommendationsTable;
use App\Models\BusinessRecommendation;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BusinessRecommendationResource extends Resource
{
    protected static ?string $model = BusinessRecommendation::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Business Recommendation';

    public static function form(Schema $schema): Schema
    {
        return BusinessRecommendationForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return BusinessRecommendationInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BusinessRecommendationsTable::configure($table);
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
            'index' => ListBusinessRecommendations::route('/'),
            'create' => CreateBusinessRecommendation::route('/create'),
            'view' => ViewBusinessRecommendation::route('/{record}'),
            'edit' => EditBusinessRecommendation::route('/{record}/edit'),
        ];
    }
}
