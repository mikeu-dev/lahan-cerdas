<?php

namespace App\Filament\Resources\LocationFactors;

use App\Filament\Resources\LocationFactors\Pages\CreateLocationFactor;
use App\Filament\Resources\LocationFactors\Pages\EditLocationFactor;
use App\Filament\Resources\LocationFactors\Pages\ListLocationFactors;
use App\Filament\Resources\LocationFactors\Pages\ViewLocationFactor;
use App\Filament\Resources\LocationFactors\Schemas\LocationFactorForm;
use App\Filament\Resources\LocationFactors\Schemas\LocationFactorInfolist;
use App\Filament\Resources\LocationFactors\Tables\LocationFactorsTable;
use App\Models\LocationFactor;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class LocationFactorResource extends Resource
{
    protected static string|UnitEnum|null $navigationGroup = 'Master';
    protected static ?string $model = LocationFactor::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Location Factor';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Schema $schema): Schema
    {
        return LocationFactorForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return LocationFactorInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LocationFactorsTable::configure($table);
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
            'index' => ListLocationFactors::route('/'),
            'create' => CreateLocationFactor::route('/create'),
            'view' => ViewLocationFactor::route('/{record}'),
            'edit' => EditLocationFactor::route('/{record}/edit'),
        ];
    }
}
