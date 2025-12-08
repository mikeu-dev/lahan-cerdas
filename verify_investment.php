<?php

require __DIR__ . '/vendor/autoload.php';

use App\Services\InvestmentCalculator;

$price = 100000;
$duration = 5;
$rate = 10;

$projected = InvestmentCalculator::calculateProjectedValue($price, $duration, $rate);
$roi = InvestmentCalculator::calculateRoi($price, $projected);

echo "Price: $price\n";
echo "Duration: $duration years\n";
echo "Rate: $rate%\n";
echo "Projected: " . round($projected, 2) . "\n";
echo "ROI: " . round($roi, 2) . "%\n";

$expectedProjected = 100000 * pow(1.1, 5); // 161051
if (round($projected, 2) == round($expectedProjected, 2)) {
    echo "TEST PASSED: Projected Value correct.\n";
} else {
    echo "TEST FAILED: Projected Value incorrect.\n";
}
