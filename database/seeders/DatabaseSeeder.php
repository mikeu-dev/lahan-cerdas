<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            User::class,
            RegionSeeder::class,
            LandPlotSeeder::class,
            LandPriceSourceSeeder::class,
            LandPriceSeeder::class,
            PriceHistorySeeder::class,
            LocationFactorSeeder::class,
            PlotLocationScoreSeeder::class,
            BusinessRecommendationSeeder::class,
            InvestmentSimulationSeeder::class,
        ]);
    }
}
