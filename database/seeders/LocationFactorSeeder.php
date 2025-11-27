<?php

namespace Database\Seeders;

use App\Models\LocationFactor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationFactorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $factors = [
            // Kategori Transport
            ['name' => 'Jarak ke jalan raya besar', 'category' => 'transport', 'weight' => 0.25],
            ['name' => 'Jarak ke bandara', 'category' => 'transport', 'weight' => 0.15],
            ['name' => 'Jarak ke stasiun/pelabuhan', 'category' => 'transport', 'weight' => 0.20],
            ['name' => 'Jarak ke halte BRT/MRT/LRT', 'category' => 'transport', 'weight' => 0.10],

            // Kategori Facility
            ['name' => 'Sekolah', 'category' => 'facility', 'weight' => 0.10],
            ['name' => 'Universitas', 'category' => 'facility', 'weight' => 0.10],
            ['name' => 'Rumah sakit', 'category' => 'facility', 'weight' => 0.10],
            ['name' => 'Mall', 'category' => 'facility', 'weight' => 0.05],
            ['name' => 'Perkantoran', 'category' => 'facility', 'weight' => 0.05],

            // Kategori Safety
            ['name' => 'Statistik kriminal daerah', 'category' => 'safety', 'weight' => 0.15],
            ['name' => 'Jarak ke kantor polisi', 'category' => 'safety', 'weight' => 0.10],

            // Kategori Economic
            ['name' => 'Kepadatan penduduk', 'category' => 'economic', 'weight' => 0.10],
            ['name' => 'Pendapatan regional (PDRB)', 'category' => 'economic', 'weight' => 0.15],
            ['name' => 'Tingkat pertumbuhan ekonomi', 'category' => 'economic', 'weight' => 0.15],
        ];

        foreach ($factors as $factor) {
            LocationFactor::create($factor);
        }
    }
}
