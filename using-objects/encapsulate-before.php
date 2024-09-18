<?php

function limit($numbers, $min, $max)
{
    $accumulator = [];

    foreach ($numbers as $number) {
        if ($number >= $min && $number <= $max) {
            $accumulator[] = $number;
        }
    }

    return $accumulator;
}
