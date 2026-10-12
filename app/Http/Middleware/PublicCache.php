<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Marks successful public GET pages as cacheable so a CDN (Cloudflare) can
 * serve them from the edge. Pages carry no cookies or user data (sessions
 * are disabled for the public site), so a shared cache is safe.
 *
 * Browsers keep a page for 5 minutes; the CDN for a day. Purge the CDN cache
 * after each deploy (see docs/LAUNCH.md).
 */
class PublicCache
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if (
            app()->isProduction()
            && $request->isMethodCacheable()
            && $response->getStatusCode() === 200
            && ! $response->headers->has('Set-Cookie')
            // Versioned assets (e.g. /i18n/es.js?v=…) set their own long-lived policy.
            && ! $response->headers->hasCacheControlDirective('immutable')
        ) {
            $response->headers->set('Cache-Control', 'public, max-age=300, s-maxage=86400');
        }

        return $response;
    }
}
