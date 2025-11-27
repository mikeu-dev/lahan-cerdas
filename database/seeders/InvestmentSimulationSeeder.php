<?php

namespace Database\Seeders;

use App\Models\InvestmentSimulation;
use App\Models\LandPlot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InvestmentSimulationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plots = LandPlot::all();

        if ($plots->isEmpty()) {
            $this->command->warn('Tidak ada LandPlot. Seeder dibatalkan.');
            return;
        }

        $scenarios = ['optimistic', 'moderate', 'pessimistic'];

        foreach ($plots as $plot) {
            // Ambil harga rata-rata per m2 dari LandPrice
            $priceRecord = $plot->prices()->inRandomOrder()->first();

            if (!$priceRecord) {
                continue; // lewati jika tidak ada harga
            }

            $purchasePrice = $priceRecord->price_per_m2 * $plot->land_area;

            // Buat 1-3 simulasi per plot
            $numSimulations = rand(1, 3);

            for ($i = 0; $i < $numSimulations; $i++) {
                $duration = rand(1, 10); // tahun
                $growthRate = rand(5, 15) / 100; // 5% - 15% per tahun
                $scenario = $scenarios[array_rand($scenarios)];

                // Proyeksi nilai: compound growth
                $projectedValue = round($purchasePrice * pow(1 + $growthRate, $duration));

                // ROI %
                $roiPercent = round(($projectedValue - $purchasePrice) / $purchasePrice * 100, 2);

                InvestmentSimulation::create([
                    'user_id' => $plot->user_id,
                    'land_plot_id' => $plot->id,
                    'purchase_price' => $purchasePrice,
                    'investment_duration' => $duration,
                    'expected_growth_rate' => $growthRate * 100, // dalam persen
                    'scenario' => $scenario,
                    'projected_value' => $projectedValue,
                    'roi_percent' => $roiPercent,
                ]);
            }
        }
    }
}
