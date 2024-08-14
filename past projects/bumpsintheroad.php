<?php

function bump(string $x): string {
    // Tracker
    $nBumps = 0;

    // Split the string into an array
    $road = str_split($x);

    // Loop over each element in road
    foreach ($road as $character) {
        // if the character is 'n' add one
        if ($character === 'n') {
            $nBumps++;
        }
    }
    if ($nBumps <= 15) {
        return 'Woohoo!';
    } else {
        return 'Car Dead';
    }
}

echo bump('nnn_n__n_n___nnnnn___n__nnn__');