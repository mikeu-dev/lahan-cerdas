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
        Schema::create('industrial_zones', function (Blueprint $table) {
            $table->id();
            $table->string('kode_zona', 20)->unique();
            $table->string('nama_zona', 150);
            $table->decimal('luas_ha', 12, 2)->nullable();
            $table->string('status', 50)->nullable();
            $table->foreignId('village_id')->constrained()->cascadeOnDelete();
            $table->geometry('geom', 'POLYGON', 4326)->nullable();
            $table->json('properties')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->timestamps();

            $table->spatialIndex('geom');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('industial_zones');
    }
};
