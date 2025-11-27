<?php

namespace App\Filament\Resources\LandPrices;

use App\Filament\Resources\LandPrices\Pages\CreateLandPrice;
use App\Filament\Resources\LandPrices\Pages\EditLandPrice;
use App\Filament\Resources\LandPrices\Pages\ListLandPrices;
use App\Filament\Resources\LandPrices\Pages\ViewLandPrice;
use App\Filament\Resources\LandPrices\Schemas\LandPriceForm;
use App\Filament\Resources\LandPrices\Schemas\LandPriceInfolist;
use App\Filament\Resources\LandPrices\Tables\LandPricesTable;
use App\Models\LandPrice;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class LandPriceResource extends Resource
{
    protected static string|UnitEnum|null $navigationGroup = 'Master';
    protected static ?string $model = LandPrice::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Land Price';
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Schema $schema): Schema
    {
        return LandPriceForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return LandPriceInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LandPricesTable::configure($table);
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
            'index' => ListLandPrices::route('/'),
            'create' => CreateLandPrice::route('/create'),
            'view' => ViewLandPrice::route('/{record}'),
            'edit' => EditLandPrice::route('/{record}/edit'),
        ];
    }
}
