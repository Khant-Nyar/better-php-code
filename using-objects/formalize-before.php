<?php

function auth(array $options = [])
{
    // ...

    if ($options['verify'] ?? false) {
        $this->verification();
    }

    // ...
}

auth(['verify' => true, 'whatevs' => 'yada yada']);