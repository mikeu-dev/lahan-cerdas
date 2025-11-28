<?php

namespace Database\Seeders;

use App\Models\GeoLayer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeoLayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $layers = [
            [
                'name' => 'Administrasi Kabupaten Purwakarta',
                'layer_type' => 'vector',
                'description' => 'Batas wilayah administratif Kabupaten Purwakarta',
                'source' => 'Setda Purwakart'
            ],
            [
                'name' => 'Administrasi Kecamatan',
                'layer_type' => 'vector',
                'description' => 'Batas kecamatan Kabupaten Purwakarta (area & garis)',
                'source' => 'Setda Purwakart'
            ],
            [
                'name' => 'Administrasi Desa',
                'layer_type' => 'vector',
                'description' => 'Batas desa/kelurahan Kabupaten Purwakarta',
                'source' => 'Setda Purwakarta'
            ],
            [
                'name' => 'Balai Desa',
                'layer_type' => 'vector',
                'description' => 'Lokasi balai desa',
                'source' => 'Setda Purwakarta'
            ],
            [
                'name' => 'Kantor Kecamatan',
                'layer_type' => 'vector',
                'description' => 'Lokasi kantor kecamatan',
                'source' => 'Setda Purwakarta'
            ],
            [
                'name' => 'Kantor Kelurahan',
                'layer_type' => 'vector',
                'description' => 'Lokasi kantor kelurahan',
                'source' => 'Setda Purwakarta'
            ],
        ];

        foreach ($layers as $layer) {
            GeoLayer::create($layer);
        }
    }
}
