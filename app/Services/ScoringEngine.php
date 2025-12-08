<?php

namespace App\Services;

use App\Models\LandPlot;
use App\Models\LocationFactor;

class ScoringEngine
{
    /**
     * Generate a score for a specific land plot and factor.
     * Currently simulated based on random but consistently seeded logic per plot/factor.
     */
    public static function generateScore(LandPlot $plot, LocationFactor $factor): float
    {
        // In a real implementation, this would use GIS analysis (distance to closest road, etc).
        // For now, we simulate intelligence.
        
        // Seed random generator with plot ID + factor ID to get consistent results
        srand($plot->id + $factor->id);
        
        // Base score 1-10
        $baseScore = rand(40, 95) / 10;
        
        // Adjust by factor weight (if weight is 1-5, normalize impact)
        // $adjustedScore = $baseScore * ($factor->weight / 3); 
        
        return round($baseScore, 1);
    }
}
