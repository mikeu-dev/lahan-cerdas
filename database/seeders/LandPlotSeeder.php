<?php

namespace Database\Seeders;

use App\Models\LandPlot;
use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class LandPlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $purwakartaRegions = Region::where('name', 'like', '%KABUPATEN PURWAKARTA%')->get();

        if ($purwakartaRegions->isEmpty()) {
            $this->command->info('Tidak ada region di Purwakarta. Seeder dibatalkan.');
            return;
        }

        $sampleData = [
            [
                'title' => 'Lahan Perumahan di Ciseureuh',
                'description' => 'Cocok untuk rumah tinggal, dekat sekolah dan pasar',
                'address' => 'Jl. Raya Ciseureuh, Purwakarta',
                'land_area' => 600
            ],
            [
                'title' => 'Lahan Industri Lemahabang',
                'description' => 'Cocok untuk gudang atau pabrik skala kecil',
                'address' => 'Kawasan Industri Lemahabang, Purwakarta',
                'land_area' => 2500
            ],
            [
                'title' => 'Lahan Pertanian Sukatani',
                'description' => 'Dekat area persawahan, cocok untuk pertanian organik',
                'address' => 'Desa Sukatani, Purwakarta',
                'land_area' => 1500
            ],
            [
                'title' => 'Lahan Strategis Dekat Terminal',
                'description' => 'Dekat terminal bus dan pusat kota',
                'address' => 'Terminal Leuwipanjang, Purwakarta',
                'land_area' => 1200
            ],
            [
                'title' => 'Lahan Komersial di Kota Purwakarta',
                'description' => 'Cocok untuk minimarket atau ruko',
                'address' => 'Jl. Raya Kota Purwakarta',
                'land_area' => 800
            ],
        ];

        $statusOptions = ['available', 'saved', 'draft'];

        foreach ($sampleData as $item) {
            $region = $purwakartaRegions->random();

            $response = Http::withHeaders([
                'User-Agent' => 'LahanCerdasSeeder/1.0 (rikiruswandi28@gmail.com)',
            ])->get('https://nominatim.openstreetmap.org/search', [
                'q' => $item['address'] . ', ' . $region->name,
                'format' => 'json',
                'limit' => 1
            ]);

            $lat = null;
            $lon = null;

            $lat = $response->successful() && isset($response[0]) ? $response[0]['lat'] : -6.55;
            $lon = $response->successful() && isset($response[0]) ? $response[0]['lon'] : 107.44;

            LandPlot::create([
                'user_id' => 1,
                'region_id' => $region->id,
                'title' => $item['title'],
                'description' => $item['description'],
                'address' => $item['address'],
                'land_area' => $item['land_area'],
                'status' => $statusOptions[array_rand($statusOptions)],
                'latitude' => $lat,
                'longitude' => $lon,
            ]);


            sleep(1); // agar tidak terkena rate-limit Nominatim
        }
    }
}
