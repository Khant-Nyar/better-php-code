<?php

function limit($numbers, NumberRange $range)
{
    $accumulator = [];

    foreach ($numbers as $number) {
        if ($range->includes($number)) {
            $accumulator[] = $number;
        }
    }

    return $accumulator;
}

class NumberRange
{
    private $min;
    private $max;

    public function __construct($min, $max)
    {
        $this->min = $min;
        $this->max = $max;
    }

    public function includes($number)
    {
        return $number >= $this->min && $number <= $this->max;
    }
}


