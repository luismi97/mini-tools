<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\TranslationController;
use App\Support\Locales;
use Illuminate\Support\Facades\Route;

Route::get('/sitemap.xml', [SitemapController::class, 'sitemap'])->name('sitemap');
Route::get('/robots.txt', [SitemapController::class, 'robots'])->name('robots');
Route::get('/ads.txt', [SitemapController::class, 'adsTxt'])->name('ads-txt');
Route::get('/i18n/{locale}.js', [TranslationController::class, 'js'])->where('locale', '[a-z]{2}(?:-[A-Z]{2})?')->name('i18n');

/*
| One route group per locale. The default locale has no prefix (/merge-pdf);
| others use theirs (/es/unir-pdf). Prefixed locales register first so the
| default locale's /{slug} catch-all can never swallow "/es".
| Route names: "home" (default) and "es.home" (Spanish) — use lroute().
*/
foreach (Locales::routeOrder() as $locale) {
    $config = Locales::all()[$locale];

    Route::prefix($config['prefix'])
        ->name(Locales::routePrefix($locale))
        ->middleware("locale:{$locale}")
        ->group(function () use ($locale, $config) {
            Route::get('/', HomeController::class)->name('home');

            Route::get('/'.$config['segments']['category'].'/{slug}', [CategoryController::class, 'show'])
                ->where('slug', '[a-z0-9-]+')
                ->name('category.show');

            Route::get('/{page}', [PageController::class, 'show'])
                ->whereIn('page', PageController::slugs($locale))
                ->name('page');

            // Tools that need a backend register their own routes here, above the catch-all.

            // Catch-all for tools: must stay LAST in the group. Only active tool slugs resolve.
            Route::get('/{slug}', [ToolController::class, 'show'])
                ->where('slug', '[a-z0-9]+(?:-[a-z0-9]+)*')
                ->name('tool.show');
        });
}
