<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Canonical URLs, sitemap and Open Graph links must always use the
        // configured domain, never whatever host the request came in on.
        if ($this->app->isProduction()) {
            URL::forceRootUrl(config('app.url'));
            URL::forceScheme('https');
        }
    }
}
