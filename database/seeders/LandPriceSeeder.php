<?php

namespace Database\Seeders;

use App\Models\LandPlot;
use App\Models\LandPrice;
use App\Models\LandPriceSource;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LandPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plots = LandPlot::all();
        $sources = LandPriceSource::all();

        if ($plots->isEmpty() || $sources->isEmpty()) {
            $this->command->warn('LandPlot atau LandPriceSource kosong. Seeder dibatalkan.');
            return;
        }

        foreach ($plots as $plot) {
            // Pilih 3-5 sumber acak per plot
            $selectedSources = $sources->random(rand(3, 5));

            foreach ($selectedSources as $source) {
                // Harga per m2 diacak agar realistis: 200 ribu - 3 juta/m2
                $price = rand(200000, 3000000);

                // Tahun acak antara 2022-2025
                $year = rand(2022, 2025);

                LandPrice::create([
                    'land_plot_id' => $plot->id,
                    'source_id' => $source->id,
                    'price_per_m2' => $price,
                    'year' => $year,
                    'notes' => 'Data dari ' . $source->name,
                ]);
            }
        }
    }
}
