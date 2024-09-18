<?php

function vowels($string)
{
    $vowels = preg_replace('/[^aeiou]/', '', $string);

    if (empty($vowels)) {
        return null;
    }

    return str_split($vowels);
}

function vowel_histogram($string)
{
    $vowels = vowels($string);

    if ($vowels === null) {
        return null;
    }

    $histogram = array_count_values($vowels);

    ksort($histogram);

    return http_build_query($histogram, '', ', ');
}

echo vowel_histogram($argv[1]), PHP_EOL;
