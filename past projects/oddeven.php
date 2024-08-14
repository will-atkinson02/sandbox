<?php

function no_space(string $s): string {
    $string = str_split($s);
    foreach ($string as $key => $character) {
        if ($character === ' ') {
            $string[$key] = '';
            }
    }
    return implode('', $string);
}


$s = 'dg dfhfh dfgd  f';

echo no_space($s);
