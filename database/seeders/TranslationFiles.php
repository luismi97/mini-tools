<?php

namespace Database\Seeders;

use App\Support\Locales;

/**
 * Loads per-locale content files: database/seeders/content/{locale}/{name}.php,
 * each returning [slug => [field => value]]. The default locale is not loaded
 * here — its values are the base columns.
 */
class TranslationFiles
{
    /** @return array<string, array<string, array<string, mixed>>> locale => slug => fields */
    public static function load(string $name): array
    {
        $out = [];
        foreach (Locales::codes() as $locale) {
            if (Locales::isDefault($locale)) {
                continue;
            }
            $file = __DIR__."/content/{$locale}/{$name}.php";
            $out[$locale] = is_file($file) ? require $file : [];
        }

        return $out;
    }

    /** JSON value for the `translations` column of one record, or null. */
    public static function for(array $loaded, string $slug): ?array
    {
        $result = [];
        foreach ($loaded as $locale => $records) {
            if (! empty($records[$slug])) {
                $result[$locale] = $records[$slug];
            }
        }

        return $result ?: null;
    }
}
