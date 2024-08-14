<?php

function getCount(string $str): int {
    $vowelsCount = 0;

    $vowels = ['a', 'e', 'i', 'o', 'u',];

    // Split the string into an array
    $strArray = str_split($str);

    foreach ($strArray as $character) {
        if (in_array($character, $vowels )) {
            $vowelsCount++;
        }
    }

    return $vowelsCount;
}

echo getCount('eee');