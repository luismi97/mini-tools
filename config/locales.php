<?php

/*
| Supported languages. The default locale lives at the site root without a
| prefix (/merge-pdf); every other locale is served under /{prefix}/ with its
| own translated slugs (/es/unir-pdf).
|
| To add a language:
|   1. Add an entry here.
|   2. Add lang/{code}.json (Blade/PHP UI strings) and lang/js/{code}.json (JS strings).
|   3. Add database/seeders/content/{code}/tools.php, categories.php and the
|      static pages in resources/views/pages/{code}/.
|   4. Run php artisan db:seed and php artisan seo:images, then php artisan test
|      (the i18n tests list anything still missing).
*/

return [
    'default' => 'en',

    'supported' => [
        'en' => [
            'name' => 'English',
            'native' => 'English',
            'prefix' => '',
            'hreflang' => 'en',
            'og' => 'en_US',
            'intl' => 'en-US',
            // Default currency of the money calculators (the visitor can change it).
            'currency' => 'USD',
            'segments' => ['category' => 'category'],
        ],
        'es' => [
            'name' => 'Spanish',
            'native' => 'Español',
            'prefix' => 'es',
            'hreflang' => 'es',
            'og' => 'es_LA',
            // Latin American Spanish number/date formatting (1,234.56) — the largest Spanish-speaking audience.
            'intl' => 'es-419',
            'currency' => 'USD',
            'segments' => ['category' => 'categoria'],
        ],
        'pt' => [
            'name' => 'Portuguese',
            'native' => 'Português',
            'prefix' => 'pt',
            'hreflang' => 'pt',
            // Brazilian Portuguese — by far the largest Portuguese-speaking audience.
            'og' => 'pt_BR',
            'intl' => 'pt-BR',
            'currency' => 'BRL',
            'segments' => ['category' => 'categoria'],
        ],
        'fr' => [
            'name' => 'French',
            'native' => 'Français',
            'prefix' => 'fr',
            'hreflang' => 'fr',
            'og' => 'fr_FR',
            'intl' => 'fr-FR',
            'currency' => 'EUR',
            'segments' => ['category' => 'categorie'],
        ],
        'de' => [
            'name' => 'German',
            'native' => 'Deutsch',
            'prefix' => 'de',
            'hreflang' => 'de',
            'og' => 'de_DE',
            'intl' => 'de-DE',
            'currency' => 'EUR',
            'segments' => ['category' => 'kategorie'],
        ],
        'it' => [
            'name' => 'Italian',
            'native' => 'Italiano',
            'prefix' => 'it',
            'hreflang' => 'it',
            'og' => 'it_IT',
            'intl' => 'it-IT',
            'currency' => 'EUR',
            'segments' => ['category' => 'categoria'],
        ],
    ],
];
