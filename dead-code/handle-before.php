<?php

function handle($request, Closure $next)
{
    $pieces = explode(".", $request->getHost());
    $subdomain = $pieces[0];
    $mainDomain = $pieces[1];
    $intention = $request->path();

    // If the subdomain is app, then force non SSL
    // If the
    if ($subdomain == 'app' || $subdomain == 'application') {
        // die("need to force scheme to https");
        URL::forceScheme('http');
    } else {
        // die("need to force scheme to https");
        if ($request->server->get("HTTP_X_FORWARDED_PROTO") == 'http') {
            //die($request, $intention, $request->headers->get('referer'));
            return redirect('https://' . $subdomain . '.example.com/' . $intention);
        }

        // URL::forceScheme('https');
    }

    if (config('force_app_subdomain')) {
        return redirect('https://app.example.com/' . $intention);
    }

    return $next($request);

    if ($mainDomain != 'example') {
        // return redirect('https://www.example.com');
        $intention = $request->path();
        redirect('https://' . $subdomain . '.example.com/' . $intention);
    }

    //  if($subdomain == 'app' || $subdomain == 'application'){
    //       return $next($request);
    //  }

    //  if( $subdomain=='www' || $subdomain=='web'){
    //      return $next($request);
    //  }

    // abort(404);
}