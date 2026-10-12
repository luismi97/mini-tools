<?php

namespace App\Http\Controllers;

use App\Support\Locales;
use App\Support\Seo;
use App\Support\Translations;
use Illuminate\Http\Response;

/**
 * Serves lang/js/{locale}.json as a tiny script (window.__i18n = {...}).
 * The URL carries a content hash (?v=…), so browsers and the CDN can cache it
 * for a year instead of every page embedding the whole dictionary.
 */
class TranslationController extends Controller
{
    public function js(string $locale): Response
    {
        abort_unless(in_array($locale, Locales::codes(), true) && ! Locales::isDefault($locale), 404);

        return response('window.__i18n = '.Seo::json(Translations::js($locale)).";\n")
            ->header('Content-Type', 'application/javascript; charset=UTF-8')
            ->header('Cache-Control', 'public, max-age=31536000, immutable');
    }
}
