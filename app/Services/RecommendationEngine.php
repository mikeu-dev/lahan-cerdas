<?php

namespace App\Services;

use App\Models\LandPlot;

class RecommendationEngine
{
    /**
     * Generate a business recommendation based on Land Plot attributes.
     */
    public static function generate(LandPlot $plot): array
    {
        $area = $plot->land_area;
        // Simple price efficiency calculation (price per sqm)
        // Ideally we would compare this to regional averages.
        // For now, lower price per sqm = higher potential score.
        
        $recommendation = '';
        $reason = '';
        $score = 5.0; // Default average score

        if ($area >= 10000) {
            $recommendation = 'Kawasan Industri / Pabrik';
            $reason = 'Luas lahan sangat memadai untuk pembangunan pabrik skala besar atau kawasan pergudangan logistik.';
            $score = 8.5;
        } elseif ($area >= 5000) {
            $recommendation = 'Gudang / Logistik Centre';
            $reason = 'Ukuran lahan cocok untuk gudang distribusi menengah atau pusat logistik.';
            $score = 7.5;
        } elseif ($area >= 1000) {
            $recommendation = 'Perumahan Cluster / Townhouse';
            $reason = 'Luas ideal untuk pengembangan cluster perumahan kecil atau townhouse eksklusif.';
            $score = 7.0;
        } elseif ($area >= 500) {
            $recommendation = 'Ruko / Komersial';
            $reason = 'Cocok untuk pembangunan ruko atau area komersial mix-used.';
            $score = 6.5;
        } else {
            $recommendation = 'Investasi Retail / Minimarket';
            $reason = 'Lahan kompak, strategis untuk retail kecil atau minimarket.';
            $score = 6.0;
        }

        return [
            'recommended_business' => $recommendation,
            'reason' => $reason,
            'potential_score' => $score,
        ];
    }
}
