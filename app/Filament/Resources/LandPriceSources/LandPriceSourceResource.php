<?php

namespace App\Filament\Resources\LandPriceSources;

use App\Filament\Resources\LandPriceSources\Pages\CreateLandPriceSource;
use App\Filament\Resources\LandPriceSources\Pages\EditLandPriceSource;
use App\Filament\Resources\LandPriceSources\Pages\ListLandPriceSources;
use App\Filament\Resources\LandPriceSources\Pages\ViewLandPriceSource;
use App\Filament\Resources\LandPriceSources\Schemas\LandPriceSourceForm;
use App\Filament\Resources\LandPriceSources\Schemas\LandPriceSourceInfolist;
use App\Filament\Resources\LandPriceSources\Tables\LandPriceSourcesTable;
use App\Models\LandPriceSource;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class LandPriceSourceResource extends Resource
{
    protected static string|UnitEnum|null $navigationGroup = 'Master';
    protected static ?string $model = LandPriceSource::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'LandPrice';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Schema $schema): Schema
    {
        return LandPriceSourceForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return LandPriceSourceInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LandPriceSourcesTable::configure($table);
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
            'index' => ListLandPriceSources::route('/'),
            'create' => CreateLandPriceSource::route('/create'),
            'view' => ViewLandPriceSource::route('/{record}'),
            'edit' => EditLandPriceSource::route('/{record}/edit'),
        ];
    }
}
