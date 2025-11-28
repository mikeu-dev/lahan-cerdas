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
            $table->foreignId('land_plot_id')->constrained();
            $table->foreignId('source_id')->constrained('land_price_sources');
            $table->decimal('price_per_m2', 18, 2);
            $table->integer('year');
            $table->text('notes')->nullable();
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
