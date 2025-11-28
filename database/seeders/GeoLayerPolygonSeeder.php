<?php

namespace Database\Seeders;

use App\Models\GeoLayer;
use App\Models\GeoLayerPolygon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class GeoLayerPolygonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $layers = GeoLayer::all();

        if ($layers->isEmpty()) {
            $this->command->warn("Tidak ada GeoLayer. Seeder dihentikan.");
            return;
        }

        foreach ($layers as $layer) {

            // File dicari otomatis berdasarkan nama layer (slug)
            $fileName = 'geo/' . str()->slug($layer->name) . '.json';

            // gunakan disk 'seeder'
            if (!Storage::disk('seeder')->exists($fileName)) {
                $this->command->warn("File GeoJSON tidak ditemukan untuk layer: {$layer->name} ({$fileName})");
                continue;
            }

            $raw = Storage::disk('seeder')->get($fileName);
            $json = json_decode($raw, true);

            if (!$json || !isset($json['features'])) {
                $this->command->error("Format GeoJSON tidak valid: {$fileName}");
                continue;
            }

            $count = 0;

            foreach ($json['features'] as $feature) {
                if (!isset($feature['geometry'])) {
                    continue;
                }

                GeoLayerPolygon::create([
                    'layer_id' => $layer->id,
                    'geojson' => json_encode($feature),
                ]);

                $count++;
            }

            $this->command->info("Layer '{$layer->name}' berhasil disimpan: {$count} fitur.");
        }
    }
}
