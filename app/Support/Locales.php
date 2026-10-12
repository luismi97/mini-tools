<?php

namespace App\Support;

/**
 * Supported locales (config/locales.php) and locale-aware URL helpers.
 */
class Locales
{
    public static function default(): string
    {
        return config('locales.default');
    }

    /** @return array<string, array<string, mixed>> */
    public static function all(): array
    {
        return config('locales.supported');
    }

    /** @return string[] */
    public static function codes(): array
    {
        return array_keys(self::all());
    }

    public static function current(): string
    {
        return app()->getLocale();
    }

    public static function isDefault(?string $locale = null): bool
    {
        return ($locale ?? self::current()) === self::default();
    }

    public static function get(string $key, ?string $locale = null): mixed
    {
        return data_get(self::all(), ($locale ?? self::current()).'.'.$key);
    }

    /**
     * Options for a money calculator's currency selector: the given codes, plus the
     * current locale's default currency first when the list does not include it.
     *
     * @param  string[]  $codes
     * @return string[]
     */
    public static function currencies(array $codes): array
    {
        $default = self::get('currency') ?? 'USD';

        return in_array($default, $codes, true) ? $codes : [$default, ...$codes];
    }

    /** Route-name prefix: '' for the default locale, 'es.' for Spanish. */
    public static function routePrefix(string $locale): string
    {
        return self::isDefault($locale) ? '' : "{$locale}.";
    }

    /** Locales ordered so the default (un-prefixed, catch-all) routes register last. */
    public static function routeOrder(): array
    {
        $codes = self::codes();
        usort($codes, fn ($a, $b) => self::isDefault($a) <=> self::isDefault($b));

        return $codes;
    }

    public static function route(string $name, array $parameters = [], ?string $locale = null): string
    {
        return route(self::routePrefix($locale ?? self::current()).$name, $parameters);
    }
}
