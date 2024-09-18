<?php

function handle($request, Closure $next)
{
    if (env('APP_ENV') != 'development') {
        if ($request->getScheme() != 'https') {
            URL::forceScheme('https');

            return redirect('https://www.example.com/' . $request->getPath());
        }
    }

    return $next($request);
}