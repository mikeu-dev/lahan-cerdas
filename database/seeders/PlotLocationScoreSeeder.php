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

        foreach ($factors as $factor) {
            // Tentukan jumlah plot yang mendapat skor untuk faktor ini (misal 50%-100% plot)
            $numPlots = rand((int)($plots->count() * 0.5), $plots->count());

            // Ambil plot acak
            $randomPlots = $plots->random($numPlots);

            foreach ($randomPlots as $plot) {
                // Skor acak 50-100
                $score = rand(50, 100);

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
