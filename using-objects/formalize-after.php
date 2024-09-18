<?php

function auth(array $options = [])
{
    // ...

    if ($options['verify'] ?? false) {
        $this->verification();
    }

    // ...
}

class AuthOptions
{
    protected $verify;
    protected $captcha;

    public function __construct($verify, $captcha)
    {
        $this->verify = $verify;
        $this->captcha = $captcha;
    }
}

auth(new AuthOptions(true, false));