<?php

namespace App\Filament\Widgets;

use App\Models\InvestmentSimulation;
use Filament\Widgets\ChartWidget;

class InvestmentSimulationChart extends ChartWidget
{
    protected ?string $heading = 'Proyeksi Investasi Lahan';

    protected function getData(): array
    {
        // Ambil 10 simulasi terbaru
        $simulations = InvestmentSimulation::query()
            ->latest()
            ->take(10)
            ->get();

        return [
            'labels' => $simulations->pluck('land_plot_id')->map(fn($id) => "Plot $id")->toArray(),
            'datasets' => [
                [
                    'label' => 'Projected Value',
                    'data' => $simulations->pluck('projected_value')->toArray(),
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'fill' => true,
                    'tension' => 0.3, // membuat garis lebih smooth
                ],
                [
                    'label' => 'ROI (%)',
                    'data' => $simulations->pluck('roi_percent')->toArray(),
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'fill' => true,
                    'tension' => 0.3,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
