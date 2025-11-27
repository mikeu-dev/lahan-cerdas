<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ============================
        // 1. ROOT: INDONESIA
        // ============================
        $indonesia = Region::create([
            'user_id'   => 1,
            'name'      => 'INDONESIA',
            'parent_id' => null,
        ]);

        // ============================
        // 2. AMBIL SELURUH PROVINSI
        // ============================
        $provinces = Http::get(
            "https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json"
        )->json();

        // Ambil Provinsi Jawa Barat
        $jawaBarat = collect($provinces)->first(function ($p) {
            return trim(strtolower($p['name'])) === 'jawa barat';
        });

        if (!$jawaBarat) {
            dd("Provinsi Jawa Barat tidak ditemukan.", $provinces);
        }


        $provinceRegion = Region::create([
            'user_id'   => 1,
            'name'      => $jawaBarat['name'],
            'parent_id' => $indonesia->id,
        ]);

        // ============================
        // 3. AMBIL KABUPATEN DI JAWA BARAT
        // ============================
        $regencies = Http::get(
            "https://www.emsifa.com/api-wilayah-indonesia/api/regencies/{$jawaBarat['id']}.json"
        )->json();

        // Pilih hanya Purwakarta
        $purwakarta = collect($regencies)->first(function ($item) {
            return strtolower(trim($item['name'])) === 'kabupaten purwakarta';
        });

        if (!$purwakarta) {
            dd("Purwakarta tidak ditemukan.", $regencies);
        }

        $purwakartaRegion = Region::create([
            'user_id'   => 1,
            'name'      => $purwakarta['name'],
            'parent_id' => $provinceRegion->id,
        ]);

        // ============================
        // 4. AMBIL KECAMATAN PURWAKARTA
        // ============================
        $districts = Http::get(
            "https://www.emsifa.com/api-wilayah-indonesia/api/districts/{$purwakarta['id']}.json"
        )->json();

        foreach ($districts as $district) {

            $districtRegion = Region::create([
                'user_id'   => 1,
                'name'      => $district['name'],
                'parent_id' => $purwakartaRegion->id,
            ]);

            // ============================
            // 5. AMBIL DESA TIAP KECAMATAN
            // ============================
            $villages = Http::get(
                "https://www.emsifa.com/api-wilayah-indonesia/api/villages/{$district['id']}.json"
            )->json();

            foreach ($villages as $village) {
                Region::create([
                    'user_id'   => 1,
                    'name'      => $village['name'],
                    'parent_id' => $districtRegion->id,
                ]);
            }
        }
    }
}
