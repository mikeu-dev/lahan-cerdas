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
        Schema::create('plot_location_scores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('land_plot_id')->constrained('land_plots');
            $table->foreignId('factor_id')->constrained('location_factors');
            $table->float('score');
            $table->text('detail')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plot_location_scores');
    }
};
