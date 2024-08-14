<?php

function countPositivesSumNegatives(array $input): array {
    if ($input === [] || $input === null) {
        return [];
    }
    $numberOfPositives = 0;
    $sumOfNegatives = 0;
    foreach ($input as $number) {
        if ($number > 0) {
            $numberOfPositives ++;
        }
        elseif ($number < 0) {
            $sumOfNegatives += $number;
        }
    }
    return [$numberOfPositives, $sumOfNegatives];
}

echo '<pre>';
var_dump(countPositivesSumNegatives([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, -11, -12, -13, -14, -15]));