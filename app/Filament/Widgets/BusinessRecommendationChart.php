<?php

namespace App\Filament\Widgets;

use App\Models\BusinessRecommendation;
use Filament\Widgets\ChartWidget;

class BusinessRecommendationChart extends ChartWidget
{
    protected ?string $heading = 'Rekomendasi Bisnis Teratas';

    protected ?string $pollingInterval = null; // jika ingin auto refresh, misal '5s'

    protected function getData(): array
    {
        // Ambil top 10 rekomendasi berdasarkan potential_score
        $recommendations = BusinessRecommendation::query()
            ->orderByDesc('potential_score')
            ->take(10)
            ->get();

        // Format data untuk bubble chart: x, y, r
        $bubbleData = $recommendations->map(function ($rec) {
            return [
                'x' => rand(1, 100), // bisa ganti dengan data relevan, misal ukuran lahan
                'y' => $rec->potential_score,
                'r' => $rec->potential_score / 10, // ukuran bubble proporsional
            ];
        })->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Potential Score',
                    'data' => $bubbleData,
                    'backgroundColor' => 'rgba(54, 162, 235, 0.7)',
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bubble';
    }
}
