<?php

namespace App\Http\Controllers;

use App\Support\Locales;
use App\Support\Seo;
use Illuminate\Contracts\View\View;

/**
 * Static trust pages (About, Privacy, Terms, Contact).
 * They build E-E-A-T signals for search engines and are required by AdSense.
 * Content lives in resources/views/pages/{locale}/{key}.blade.php.
 */
class PageController extends Controller
{
    /**
     * Page key => localized URL slugs. Titles/descriptions are translated with __().
     * ':site' is replaced with the site name.
     */
    public const PAGES = [
        'about' => [
            'slugs' => ['en' => 'about', 'es' => 'acerca-de', 'pt' => 'sobre', 'fr' => 'a-propos', 'de' => 'ueber-uns', 'it' => 'chi-siamo'],
            'title' => 'About Us',
            'description' => 'Learn who builds :site, how our free online tools work and why most of them run entirely in your browser.',
        ],
        'privacy-policy' => [
            'slugs' => ['en' => 'privacy-policy', 'es' => 'politica-de-privacidad', 'pt' => 'politica-de-privacidade', 'fr' => 'politique-de-confidentialite', 'de' => 'datenschutz', 'it' => 'privacy'],
            'title' => 'Privacy Policy',
            'description' => 'How :site handles your data: files are processed in your browser, and how we use cookies, analytics and advertising.',
        ],
        'terms' => [
            'slugs' => ['en' => 'terms', 'es' => 'terminos', 'pt' => 'termos-de-uso', 'fr' => 'conditions-utilisation', 'de' => 'nutzungsbedingungen', 'it' => 'termini'],
            'title' => 'Terms of Use',
            'description' => 'The terms that apply when you use the free online tools on :site.',
        ],
        'suggest-a-tool' => [
            'slugs' => ['en' => 'suggest-a-tool', 'es' => 'sugerir-herramienta', 'pt' => 'sugerir-ferramenta', 'fr' => 'suggerer-un-outil', 'de' => 'tool-vorschlagen', 'it' => 'suggerisci-uno-strumento'],
            'title' => 'Suggest a tool',
            'description' => 'Missing a tool on :site? Suggest a new free online tool and help us decide what to build next.',
        ],
        'contact' => [
            'slugs' => ['en' => 'contact', 'es' => 'contacto', 'pt' => 'contato', 'fr' => 'contact', 'de' => 'kontakt', 'it' => 'contatti'],
            'title' => 'Contact',
            'description' => 'Get in touch with the :site team to report a bug, suggest a new tool or ask a question.',
        ],
    ];

    /** @return string[] URL slugs of every page in a locale */
    public static function slugs(string $locale): array
    {
        return array_map(fn ($page) => $page['slugs'][$locale] ?? $page['slugs'][Locales::default()], array_values(self::PAGES));
    }

    public static function url(string $key, ?string $locale = null): string
    {
        $locale ??= Locales::current();
        $slugs = self::PAGES[$key]['slugs'];

        return lroute('page', ['page' => $slugs[$locale] ?? $slugs[Locales::default()]], $locale);
    }

    public function show(string $page): View
    {
        $locale = Locales::current();
        $key = collect(self::PAGES)->search(fn ($p) => ($p['slugs'][$locale] ?? $p['slugs'][Locales::default()]) === $page);
        abort_if($key === false, 404);

        $meta = self::PAGES[$key];
        $title = __($meta['title']);
        $description = __($meta['description'], ['site' => config('site.name')]);

        $seo = Seo::make($title, $description)
            ->alternates(collect(Locales::codes())->mapWithKeys(fn ($l) => [$l => self::url($key, $l)])->all())
            ->breadcrumbs([$title => self::url($key)])
            ->schema([
                '@type' => $key === 'about' ? 'AboutPage' : ($key === 'contact' ? 'ContactPage' : 'WebPage'),
                'name' => $title,
                'url' => self::url($key),
                'inLanguage' => Locales::get('hreflang'),
                'publisher' => ['@id' => lroute('home', [], Locales::default()).'#organization'],
            ]);

        $view = view()->exists("pages.{$locale}.{$key}") ? "pages.{$locale}.{$key}" : 'pages.'.Locales::default().".{$key}";

        return view($view, ['seo' => $seo, 'title' => $title]);
    }
}
