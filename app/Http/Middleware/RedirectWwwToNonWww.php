<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Canonicalizes the host to APP_URL. Only fires when the request's Host is
 * literally "www." + the configured host, so local/dev hosts (which don't
 * have a www. counterpart configured) are never touched — nothing to redirect.
 */
class RedirectWwwToNonWww
{
    public function handle(Request $request, Closure $next): Response
    {
        $canonicalHost = parse_url((string) config('app.url'), PHP_URL_HOST);

        if ($canonicalHost && strcasecmp($request->getHost(), 'www.'.$canonicalHost) === 0) {
            $target = rtrim((string) config('app.url'), '/').$request->getRequestUri();

            return redirect()->to($target, 301);
        }

        return $next($request);
    }
}
