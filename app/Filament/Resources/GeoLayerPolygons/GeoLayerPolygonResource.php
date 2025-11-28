<?php

namespace App\Filament\Resources\GeoLayerPolygons;

use App\Filament\Resources\GeoLayerPolygons\Pages\CreateGeoLayerPolygon;
use App\Filament\Resources\GeoLayerPolygons\Pages\EditGeoLayerPolygon;
use App\Filament\Resources\GeoLayerPolygons\Pages\ListGeoLayerPolygons;
use App\Filament\Resources\GeoLayerPolygons\Pages\ViewGeoLayerPolygon;
use App\Filament\Resources\GeoLayerPolygons\Schemas\GeoLayerPolygonForm;
use App\Filament\Resources\GeoLayerPolygons\Schemas\GeoLayerPolygonInfolist;
use App\Filament\Resources\GeoLayerPolygons\Tables\GeoLayerPolygonsTable;
use App\Models\GeoLayerPolygon;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class GeoLayerPolygonResource extends Resource
{
    protected static string|UnitEnum|null $navigationGroup = 'GIS / Geospasial';
    protected static ?string $model = GeoLayerPolygon::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Geo Layer Polygon';
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Schema $schema): Schema
    {
        return GeoLayerPolygonForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return GeoLayerPolygonInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GeoLayerPolygonsTable::configure($table);
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
            'index' => ListGeoLayerPolygons::route('/'),
            'create' => CreateGeoLayerPolygon::route('/create'),
            'view' => ViewGeoLayerPolygon::route('/{record}'),
            'edit' => EditGeoLayerPolygon::route('/{record}/edit'),
        ];
    }
}
