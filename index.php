<?php

declare(strict_types=1);

function maxRot(int $n)
{
    $nString = (string)$n;
    $length = strlen($nString);
    $max = 0;
    for ($i = 0; $i < $length; $i++) {

        if ((int)$nString > $max) {
            $max = (int)$nString;
        }

        $start = substr($nString, 0, $i);

        $end = substr($nString, $i + 1);

        $middle = substr($nString, $i, 1);

        $end .= $middle;
        $nString = $start . $end;
    }
    return $max;
}


echo maxRot(38458215);
