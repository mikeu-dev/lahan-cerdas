<?php

namespace App\Filament\Resources\InvestmentSimulations;

use App\Filament\Resources\InvestmentSimulations\Pages\CreateInvestmentSimulation;
use App\Filament\Resources\InvestmentSimulations\Pages\EditInvestmentSimulation;
use App\Filament\Resources\InvestmentSimulations\Pages\ListInvestmentSimulations;
use App\Filament\Resources\InvestmentSimulations\Pages\ViewInvestmentSimulation;
use App\Filament\Resources\InvestmentSimulations\Schemas\InvestmentSimulationForm;
use App\Filament\Resources\InvestmentSimulations\Schemas\InvestmentSimulationInfolist;
use App\Filament\Resources\InvestmentSimulations\Tables\InvestmentSimulationsTable;
use App\Models\InvestmentSimulation;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class InvestmentSimulationResource extends Resource
{
    protected static string|UnitEnum|null $navigationGroup = 'Analisis & Rekomendasi';
    protected static ?string $model = InvestmentSimulation::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Investment Simulation';
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Schema $schema): Schema
    {
        return InvestmentSimulationForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return InvestmentSimulationInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return InvestmentSimulationsTable::configure($table);
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
            'index' => ListInvestmentSimulations::route('/'),
            'create' => CreateInvestmentSimulation::route('/create'),
            'view' => ViewInvestmentSimulation::route('/{record}'),
            'edit' => EditInvestmentSimulation::route('/{record}/edit'),
        ];
    }
}
