<?php

namespace App\Filament\Resources\PriceHistories;

use App\Filament\Resources\PriceHistories\Pages\CreatePriceHistory;
use App\Filament\Resources\PriceHistories\Pages\EditPriceHistory;
use App\Filament\Resources\PriceHistories\Pages\ListPriceHistories;
use App\Filament\Resources\PriceHistories\Pages\ViewPriceHistory;
use App\Filament\Resources\PriceHistories\Schemas\PriceHistoryForm;
use App\Filament\Resources\PriceHistories\Schemas\PriceHistoryInfolist;
use App\Filament\Resources\PriceHistories\Tables\PriceHistoriesTable;
use App\Models\PriceHistory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class PriceHistoryResource extends Resource
{
    protected static string|UnitEnum|null $navigationGroup = 'Master';
    protected static ?string $model = PriceHistory::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Price History';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    public static function form(Schema $schema): Schema
    {
        return PriceHistoryForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PriceHistoryInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PriceHistoriesTable::configure($table);
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
            'index' => ListPriceHistories::route('/'),
            'create' => CreatePriceHistory::route('/create'),
            'view' => ViewPriceHistory::route('/{record}'),
            'edit' => EditPriceHistory::route('/{record}/edit'),
        ];
    }
}
