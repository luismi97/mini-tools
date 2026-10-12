<?php

namespace App\Models\Concerns;

use App\Support\Locales;

/**
 * Locale-aware attributes. Base columns hold the default locale; the
 * `translations` JSON column holds the others: {"es": {"name": "…"}}.
 *
 * Reading a field listed in $translatable returns the current locale's value,
 * falling back to the default locale when it is missing. The `slug` column is
 * never swapped (it is the internal key); use localSlug() for URLs.
 */
trait HasTranslations
{
    public function getAttribute($key)
    {
        if (in_array($key, $this->translatable, true) && ! Locales::isDefault()) {
            $value = $this->translationsFor(Locales::current())[$key] ?? null;
            if ($value !== null && $value !== '' && $value !== []) {
                return $value;
            }
        }

        return parent::getAttribute($key);
    }

    /** @return array<string, mixed> */
    public function translationsFor(string $locale): array
    {
        return (parent::getAttribute('translations') ?? [])[$locale] ?? [];
    }

    /** Value of a field in a specific locale (default-locale fallback). */
    public function translate(string $field, string $locale): mixed
    {
        if (Locales::isDefault($locale)) {
            return parent::getAttribute($field);
        }

        return $this->translationsFor($locale)[$field] ?? parent::getAttribute($field);
    }

    /** URL slug for a locale; falls back to the internal (default-locale) slug. */
    public function localSlug(?string $locale = null): string
    {
        $locale ??= Locales::current();

        return Locales::isDefault($locale)
            ? parent::getAttribute('slug')
            : ($this->translationsFor($locale)['slug'] ?? parent::getAttribute('slug'));
    }
}
