<?php

namespace App\Http\Controllers;

use App\Support\Catalog;
use App\Support\Locales;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    /**
     * One <url> per page per locale, each listing all its language versions
     * (xhtml:link hreflang), as recommended by Google for multilingual sites.
     */
    public function sitemap(): Response
    {
        $locales = Locales::codes();
        $alternates = fn (callable $urlFor) => collect($locales)->mapWithKeys(fn ($l) => [$l => $urlFor($l)])->all();

        // Each entry: [alternates (locale => url), lastmod]
        $pages = collect([[$alternates(fn ($l) => lroute('home', [], $l)), Catalog::tools()->max('updated_at')]])
            ->concat(
                // Empty categories are noindex, so they are left out of the sitemap too.
                Catalog::categories()
                    ->filter(fn ($c) => $c->tools->isNotEmpty())
                    ->map(fn ($c) => [$alternates(fn ($l) => $c->url($l)), $c->tools->max('updated_at')])
            )
            ->concat(Catalog::tools()->map(fn ($t) => [$alternates(fn ($l) => $t->url($l)), $t->updated_at]))
            ->concat(collect(array_keys(PageController::PAGES))->map(fn ($key) => [$alternates(fn ($l) => PageController::url($key, $l)), null]));

        // ->values() drops the locale keys; otherwise flatMap would merge (overwrite) entries by key.
        $urls = $pages->flatMap(fn ($page) => collect($page[0])->values()->map(fn ($loc) => [
            'loc' => $loc,
            'lastmod' => $page[1],
            'alternates' => $page[0],
        ]))->values();

        return response()
            ->view('sitemap', ['urls' => $urls, 'hreflang' => collect($locales)->mapWithKeys(fn ($l) => [$l => Locales::get('hreflang', $l)])])
            ->header('Content-Type', 'application/xml; charset=UTF-8');
    }

    /**
     * ads.txt authorizes Google to sell ads on this domain (required by AdSense).
     * Built from ADS_CLIENT_ID ("ca-pub-123…" → "pub-123…"); 404 until configured.
     */
    public function adsTxt(): Response
    {
        $client = (string) config('ads.client_id');
        abort_unless(preg_match('/^(?:ca-)?(pub-\d+)$/', $client, $m), 404);

        return response("google.com, {$m[1]}, DIRECT, f08c47fec0942fa0\n")
            ->header('Content-Type', 'text/plain; charset=UTF-8');
    }

    public function robots(): Response
    {
        $lines = app()->isProduction()
            ? ['User-agent: *', 'Disallow: /up', '', 'Sitemap: '.route('sitemap')]
            : ['User-agent: *', 'Disallow: /'];

        return response(implode("\n", $lines)."\n")
            ->header('Content-Type', 'text/plain; charset=UTF-8');
    }
}
