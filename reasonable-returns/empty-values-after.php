<?php

function vowels($string)
{
    $vowels = preg_replace('/[^aeiou]/', '', $string);

    if (empty($vowels)) {
        return [];
    }

    return str_split($vowels);
}

function vowel_histogram($string)
{
    $histogram = array_count_values(vowels($string));

    ksort($histogram);

    return http_build_query($histogram, '', ', ');
}

echo vowel_histogram($argv[1]), PHP_EOL;
