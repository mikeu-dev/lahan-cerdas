<?php

namespace App\Filament\Resources\GeoLayers;

use App\Filament\Resources\GeoLayers\Pages\CreateGeoLayer;
use App\Filament\Resources\GeoLayers\Pages\EditGeoLayer;
use App\Filament\Resources\GeoLayers\Pages\ListGeoLayers;
use App\Filament\Resources\GeoLayers\Pages\ViewGeoLayer;
use App\Filament\Resources\GeoLayers\Schemas\GeoLayerForm;
use App\Filament\Resources\GeoLayers\Schemas\GeoLayerInfolist;
use App\Filament\Resources\GeoLayers\Tables\GeoLayersTable;
use App\Models\GeoLayer;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class GeoLayerResource extends Resource
{
    protected static string|UnitEnum|null $navigationGroup = 'GIS / Geospasial';
    protected static ?string $model = GeoLayer::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Geo Layer';

    public static function form(Schema $schema): Schema
    {
        return GeoLayerForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return GeoLayerInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GeoLayersTable::configure($table);
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
            'index' => ListGeoLayers::route('/'),
            'create' => CreateGeoLayer::route('/create'),
            'view' => ViewGeoLayer::route('/{record}'),
            'edit' => EditGeoLayer::route('/{record}/edit'),
        ];
    }
}
