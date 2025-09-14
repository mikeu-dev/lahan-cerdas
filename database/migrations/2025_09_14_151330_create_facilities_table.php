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
        Schema::create('facilities', function (Blueprint $table) {
            $table->id();
            $table->string('nama_fasilitas', 150);
            $table->string('jenis', 50);
            $table->foreignId('village_id')->nullable()->constrained()->cascadeOnDelete(); // opsional
            $table->foreignId('district_id')->nullable()->constrained()->cascadeOnDelete(); // opsional
            $table->geometry('geom', 'POINT', 4326)->nullable();
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
        Schema::dropIfExists('facilities');
    }
};
