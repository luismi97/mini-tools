<?php

use App\Http\Middleware\CanonicalUrl;
use App\Http\Middleware\PublicCache;
use App\Http\Middleware\SecurityHeaders;
use App\Http\Middleware\SetLocale;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias(['locale' => SetLocale::class]);

        // Behind Cloudflare / a load balancer: trust X-Forwarded-* so scheme and host are correct.
        $middleware->trustProxies(at: '*');

        // Global (not "web"): must run before routing so unmatched URLs like /Merge-PDF still redirect.
        $middleware->prepend(CanonicalUrl::class);

        // The public site has no login or forms, so no session, CSRF cookie or flashed
        // errors: responses carry no cookies and can be cached by the CDN.
        // A future tool with a backend form should use its own middleware group
        // that adds StartSession + ValidateCsrfToken back (see CLAUDE.md).
        $middleware->web(
            append: [SecurityHeaders::class, PublicCache::class],
            remove: [StartSession::class, ShareErrorsFromSession::class, ValidateCsrfToken::class],
        );
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
