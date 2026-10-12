<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Sets the application locale from the route group (each locale has its own
 * URL prefix). Applied as `locale:es` in routes/web.php.
 */
class SetLocale
{
    public function handle(Request $request, Closure $next, string $locale): Response
    {
        app()->setLocale($locale);

        return $next($request);
    }
}
