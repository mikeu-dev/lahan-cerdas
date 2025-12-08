<?php

namespace App\Services;

class InvestmentCalculator
{
    /**
     * Calculate Projected Value using Compound Interest Formula.
     * Formula: P * (1 + r/100)^t
     */
    public static function calculateProjectedValue(float $purchasePrice, float $durationYears, float $growthRatePercent): float
    {
        if ($purchasePrice <= 0 || $durationYears <= 0) {
            return 0;
        }

        return $purchasePrice * pow((1 + ($growthRatePercent / 100)), $durationYears);
    }

    /**
     * Calculate ROI (Return on Investment) Percentage.
     * Formula: ((ProjectedValue - PurchasePrice) / PurchasePrice) * 100
     */
    public static function calculateRoi(float $purchasePrice, float $projectedValue): float
    {
        if ($purchasePrice <= 0) {
            return 0;
        }

        return (($projectedValue - $purchasePrice) / $purchasePrice) * 100;
    }
}
