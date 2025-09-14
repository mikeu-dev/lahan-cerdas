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
        Schema::create('land_prices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('village_id')->constrained()->cascadeOnDelete();
            $table->integer('tahun');
            $table->decimal('harga_per_m2', 15, 2);
            $table->string('sumber', 150)->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('land_prices');
    }
};
