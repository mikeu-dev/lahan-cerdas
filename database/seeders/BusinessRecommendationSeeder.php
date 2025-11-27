<?php

namespace Database\Seeders;

use App\Models\BusinessRecommendation;
use App\Models\LandPlot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusinessRecommendationSeeder extends Seeder
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

        $businessTypes = [
            'Minimarket / Supermarket',
            'Ruko / Kantor Komersial',
            'Kafe / Restoran',
            'Toko Elektronik',
            'Perumahan / Kost',
            'Gudang / Logistik',
            'SPBU',
            'Franchise Makanan / Minuman',
            'Laundry / Jasa Kebersihan',
            'Fitness Center / Gym'
        ];

        $reasons = [
            'Potensi ekonomi wilayah tinggi',
            'Tren bisnis meningkat di daerah ini',
            'Kebutuhan pasar belum terpenuhi',
            'Sesuai dengan peraturan zonasi RDTR',
            'Dekat pusat transportasi dan fasilitas umum',
            'Permintaan pasar untuk jenis usaha ini tinggi',
            'Data BPS dan BI mendukung pertumbuhan usaha',
            'Cocok untuk UMKM atau franchise',
        ];

        foreach ($plots as $plot) {
            // Jumlah rekomendasi per plot: 1–3 bisnis
            $numRecommendations = rand(1, 3);

            for ($i = 0; $i < $numRecommendations; $i++) {
                $business = $businessTypes[array_rand($businessTypes)];
                $reason = $reasons[array_rand($reasons)];
                $score = rand(60, 100); // skor potensi bisnis

                BusinessRecommendation::create([
                    'land_plot_id' => $plot->id,
                    'recommended_business' => $business,
                    'potential_score' => $score,
                    'reason' => $reason,
                ]);
            }
        }
    }
}
