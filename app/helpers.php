<?php

use App\Support\Locales;

if (! function_exists('lroute')) {
    /**
     * Locale-aware route(): lroute('home') → "/" in English, "/es" in Spanish.
     */
    function lroute(string $name, array $parameters = [], ?string $locale = null): string
    {
        return Locales::route($name, $parameters, $locale);
    }
}
