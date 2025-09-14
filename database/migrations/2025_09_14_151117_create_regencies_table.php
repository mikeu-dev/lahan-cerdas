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
        Schema::create('regencies', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kabupaten', 10)->unique();
            $table->string('nama_kabupaten', 100);
            $table->foreignId('province_id')->constrained()->cascadeOnDelete();
            $table->geometry('geom', 'POLYGON', 4326)->nullable();
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
        Schema::dropIfExists('regencies');
    }
};
