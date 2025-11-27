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
        Schema::create('investment_simulations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('land_plot_id')->constrained();
            $table->decimal('purchase_price', 18, 2);
            $table->integer('investment_duration');
            $table->float('expected_growth_rate');
            $table->enum('scenario', ['optimistic', 'moderate', 'pessimistic']);
            $table->decimal('projected_value', 18, 2);
            $table->float('roi_percent');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investment_simulations');
    }
};
