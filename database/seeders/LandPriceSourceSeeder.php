<?php

namespace Database\Seeders;

use App\Models\LandPriceSource;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LandPriceSourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sources = [
            ['name' => 'NJOP (PBB)', 'description' => 'Nilai Jual Objek Pajak dari Pemda', 'reliability_score' => 90],
            ['name' => 'BPN', 'description' => 'Kementerian ATR/BPN', 'reliability_score' => 95],
            ['name' => 'Database Zonasi Harga Tanah', 'description' => 'Basis zonasi harga tanah pemerintah', 'reliability_score' => 85],
            ['name' => 'Rumah123', 'description' => 'Marketplace properti Rumah123', 'reliability_score' => 70],
            ['name' => 'Rumah.com', 'description' => 'Marketplace properti Rumah.com', 'reliability_score' => 70],
            ['name' => 'OLX Real Estate', 'description' => 'Marketplace OLX properti', 'reliability_score' => 60],
            ['name' => 'Pinhome', 'description' => 'Marketplace Pinhome', 'reliability_score' => 65],
            ['name' => 'Lamudi', 'description' => 'Marketplace Lamudi', 'reliability_score' => 65],
            ['name' => 'Laporan Harga Properti Bank Indonesia', 'description' => 'Data resmi Bank Indonesia', 'reliability_score' => 90],
            ['name' => 'SHPR', 'description' => 'Survei Harga Properti Residensial', 'reliability_score' => 85],
        ];

        foreach ($sources as $source) {
            LandPriceSource::create($source);
        }
    }
}
