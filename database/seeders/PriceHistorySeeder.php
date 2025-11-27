<?php

namespace Database\Seeders;

use App\Models\LandPriceSource;
use App\Models\PriceHistory;
use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PriceHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regions = Region::all();
        $sources = LandPriceSource::pluck('name')->toArray(); // ambil semua name dari LandPriceSource

        if ($regions->isEmpty()) {
            $this->command->warn('Tidak ada region. Seeder dibatalkan.');
            return;
        }

        if (empty($sources)) {
            $this->command->warn('Tidak ada sumber harga. Seeder dibatalkan.');
            return;
        }

        $years = [2020, 2021, 2022, 2023, 2024, 2025];

        foreach ($regions as $region) {

            // Base price awal untuk 2020
            $basePrice = rand(200000, 1000000); // Rp/m2

            foreach ($years as $year) {

                // Trend kenaikan 5-15% per tahun
                if ($year != 2020) {
                    $basePrice = round($basePrice * (1 + rand(5, 15) / 100), -3);
                }

                // Variasi harga ±15–30%
                $minPrice = round($basePrice * (rand(70, 85) / 100), -3);
                $maxPrice = round($basePrice * (rand(115, 130) / 100), -3);
                $avgPrice = round(($minPrice + $maxPrice) / 2, -3);

                // Pilih sumber acak dari LandPriceSource
                $source = $sources[array_rand($sources)];

                PriceHistory::create([
                    'region_id' => $region->id,
                    'year' => $year,
                    'avg_price' => $avgPrice,
                    'min_price' => $minPrice,
                    'max_price' => $maxPrice,
                    'notes' => 'Sumber data: ' . $source,
                ]);
            }
        }
    }
}
