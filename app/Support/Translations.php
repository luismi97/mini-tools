<?php

namespace App\Support;

/**
 * UI string dictionaries.
 *  - lang/{locale}.json      → Blade/PHP strings, used by __() (Laravel built-in)
 *  - lang/js/{locale}.json   → strings used from JavaScript (t() / $t()), served by
 *                              TranslationController as a cached script (see scriptUrl())
 * English text is the key, so the default locale needs no files.
 */
class Translations
{
    /** @var array<string, array<string, string>> */
    private static array $js = [];

    /** @return array<string, string> */
    public static function js(string $locale): array
    {
        if (Locales::isDefault($locale)) {
            return [];
        }

        return self::$js[$locale] ??= self::read(lang_path("js/{$locale}.json"));
    }

    /** Versioned URL of the JS dictionary script, or null when the locale needs none. */
    public static function scriptUrl(string $locale): ?string
    {
        $path = lang_path("js/{$locale}.json");
        if (Locales::isDefault($locale) || ! is_file($path)) {
            return null;
        }

        return route('i18n', ['locale' => $locale, 'v' => substr(md5_file($path), 0, 10)]);
    }

    /** @return array<string, string> */
    public static function read(string $path): array
    {
        return is_file($path) ? (json_decode(file_get_contents($path), true, flags: JSON_THROW_ON_ERROR) ?? []) : [];
    }
}
