<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Avoids duplicate content: in production every page is served from a single
 * scheme + host (APP_URL), and paths with uppercase letters 301 to lowercase.
 */
class CanonicalUrl
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! in_array($request->method(), ['GET', 'HEAD'], true)) {
            return $next($request);
        }

        $path = $request->getPathInfo();
        $lowerPath = strtolower($path);
        $target = null;

        if (app()->isProduction() && config('site.force_canonical_host')) {
            $canonical = parse_url((string) config('app.url'));
            $scheme = $canonical['scheme'] ?? 'https';
            $host = $canonical['host'] ?? $request->getHost();

            if ($request->getHost() !== $host || $request->getScheme() !== $scheme) {
                $target = "{$scheme}://{$host}{$lowerPath}";
            }
        }

        if ($target === null && $path !== $lowerPath) {
            $target = $request->getSchemeAndHttpHost().$lowerPath;
        }

        if ($target !== null) {
            $query = $request->getQueryString();

            return redirect()->to($target.($query ? "?{$query}" : ''), 301);
        }

        return $next($request);
    }
}
