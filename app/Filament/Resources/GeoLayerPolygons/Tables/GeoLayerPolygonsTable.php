<?php

namespace App\Filament\Resources\GeoLayerPolygons\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class GeoLayerPolygonsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('layer.name')
                    ->sortable(),
                TextColumn::make('display_name')
                    ->searchable(),
                TextColumn::make('geometry_type')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('geometry_type')
                    ->label('Jenis Geometri')
                    ->options([
                        'Polygon' => 'Polygon',
                        'MultiPolygon' => 'MultiPolygon',
                        'LineString' => 'LineString',
                        'Point' => 'Point',
                    ])
                    ->searchable(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
