<?php

function number($bus_stops) {

    $numberOfPassengers = 0;

    foreach ($bus_stops as $stop) {
        $numberOfPassengers += ($stop[0] - $stop[1]);
    }
    return $numberOfPassengers;
}

echo number([[3,0],[9,1],[4,8],[12,2],[6,1],[7,8]]);