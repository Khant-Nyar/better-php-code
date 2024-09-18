<?php

function handle($request, Closure $next)
{
    $pieces = explode(".", $request->getHost());
    $subdomain = $pieces[0];
    $intention = $request->path();

    // If the subdomain is app, then force non SSL

    if ($subdomain == 'app' || $subdomain == 'application') {
        URL::forceScheme('http');
    } else {
        if ($request->server->get("HTTP_X_FORWARDED_PROTO") == 'http') {
            return redirect('https://' . $subdomain . '.example.com/' . $intention);
        }
    }

    return $next($request);
}