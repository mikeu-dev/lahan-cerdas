<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('geo_layer_polygons', function (Blueprint $table) {
            $table->id();

            // Relasi ke layer
            $table->foreignId('layer_id')
                ->constrained('geo_layers')
                ->cascadeOnDelete();

            // Nama / identitas feature (dibaca manusia)
            $table->string('display_name')->nullable()->index();

            // Properties dari feature
            $table->json('properties')->nullable();

            // Tipe geometry (Point, Polygon, MultiPolygon, LineString)
            $table->string('geometry_type')->nullable();

            // Geometry dalam format GeoJSON
            $table->longText('geometry');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('geo_layer_polygons');
    }
};
