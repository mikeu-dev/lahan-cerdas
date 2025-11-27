<?php

namespace App\Filament\Resources\PlotLocationScores;

use App\Filament\Resources\PlotLocationScores\Pages\CreatePlotLocationScore;
use App\Filament\Resources\PlotLocationScores\Pages\EditPlotLocationScore;
use App\Filament\Resources\PlotLocationScores\Pages\ListPlotLocationScores;
use App\Filament\Resources\PlotLocationScores\Pages\ViewPlotLocationScore;
use App\Filament\Resources\PlotLocationScores\Schemas\PlotLocationScoreForm;
use App\Filament\Resources\PlotLocationScores\Schemas\PlotLocationScoreInfolist;
use App\Filament\Resources\PlotLocationScores\Tables\PlotLocationScoresTable;
use App\Models\PlotLocationScore;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PlotLocationScoreResource extends Resource
{
    protected static ?string $model = PlotLocationScore::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Plot Location Score';

    public static function form(Schema $schema): Schema
    {
        return PlotLocationScoreForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PlotLocationScoreInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PlotLocationScoresTable::configure($table);
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
            'index' => ListPlotLocationScores::route('/'),
            'create' => CreatePlotLocationScore::route('/create'),
            'view' => ViewPlotLocationScore::route('/{record}'),
            'edit' => EditPlotLocationScore::route('/{record}/edit'),
        ];
    }
}
