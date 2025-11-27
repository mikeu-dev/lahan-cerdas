<?php

namespace Database\Seeders;

use App\Models\LandPlot;
use App\Models\LocationFactor;
use App\Models\PlotLocationScore;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlotLocationScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plots = LandPlot::all();
        $factors = LocationFactor::all();

        if ($plots->isEmpty() || $factors->isEmpty()) {
            $this->command->warn('Tidak ada LandPlot atau LocationFactor. Seeder dibatalkan.');
            return;
        }

        foreach ($plots as $plot) {
            foreach ($factors as $factor) {
                // Skor acak 50-100 untuk realistis (bisa disesuaikan)
                $score = rand(50, 100);

                // Detail bisa berupa jarak / data POI / info tambahan
                $detail = "Simulasi nilai untuk {$factor->name}";

                PlotLocationScore::create([
                    'land_plot_id' => $plot->id,
                    'factor_id' => $factor->id,
                    'score' => $score,
                    'detail' => $detail,
                ]);
            }
        }
    }
}
