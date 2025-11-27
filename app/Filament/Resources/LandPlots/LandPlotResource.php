<?php

namespace App\Filament\Resources\LandPlots;

use App\Filament\Resources\LandPlots\Pages\CreateLandPlot;
use App\Filament\Resources\LandPlots\Pages\EditLandPlot;
use App\Filament\Resources\LandPlots\Pages\ListLandPlots;
use App\Filament\Resources\LandPlots\Pages\ViewLandPlot;
use App\Filament\Resources\LandPlots\Schemas\LandPlotForm;
use App\Filament\Resources\LandPlots\Schemas\LandPlotInfolist;
use App\Filament\Resources\LandPlots\Tables\LandPlotsTable;
use App\Models\LandPlot;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class LandPlotResource extends Resource
{
    protected static string|UnitEnum|null $navigationGroup = 'Master';
    protected static ?string $model = LandPlot::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Land Plot';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    public static function form(Schema $schema): Schema
    {
        return LandPlotForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return LandPlotInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LandPlotsTable::configure($table);
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
            'index' => ListLandPlots::route('/'),
            'create' => CreateLandPlot::route('/create'),
            'view' => ViewLandPlot::route('/{record}'),
            'edit' => EditLandPlot::route('/{record}/edit'),
        ];
    }
}
