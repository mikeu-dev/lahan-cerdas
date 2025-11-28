<?php

namespace Database\Seeders;

use App\Models\GeoLayer;
use App\Models\GeoLayerPolygon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class GeoLayerPolygonSeeder extends Seeder
{
    /**
     * Jalankan seeder.
     */
    public function run(): void
    {
        $layers = GeoLayer::all();

        if ($layers->isEmpty()) {
            $this->command->warn("Tidak ada GeoLayer. Seeder dihentikan.");
            return;
        }

        foreach ($layers as $layer) {

            // Tentukan nama file berdasarkan slug nama layer
            $fileName = 'geo/' . str()->slug($layer->name) . '.json';

            // Ambil dari disk 'seeder'
            if (!Storage::disk('seeder')->exists($fileName)) {
                $this->command->warn("File GeoJSON tidak ditemukan: {$fileName}");
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

                $geometry = $feature['geometry'];
                $properties = $feature['properties'] ?? [];

                // Tentukan nama tampilan otomatis
                $displayName =
                    $properties['name']
                    ?? $properties['NAMOBJ']
                    ?? $properties['WADMKD']
                    ?? $properties['WADMKC']
                    ?? $properties['WADMKK']
                    ?? $properties['WADMPR']
                    ?? $properties['WADMDS']
                    ?? 'Fitur Tanpa Nama';

                GeoLayerPolygon::create([
                    'layer_id'      => $layer->id,
                    'display_name'  => $displayName,
                    'properties'    => $properties,
                    'geometry_type' => $geometry['type'] ?? null,
                    'geometry'      => $geometry,
                ]);

                $count++;
            }

            $this->command->info("Layer '{$layer->name}' berhasil disimpan: {$count} fitur.");
        }
    }
}
