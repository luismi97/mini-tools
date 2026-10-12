<?php

return [
    'name' => env('APP_NAME', 'Tiny Knack'),

    'tagline' => 'Tiny tools with a knack for everyday tasks.',

    'default_description' => 'Free online tools for developers, images, calculations and more. Fast, private and no sign-up required — most tools run entirely in your browser.',

    // Default Open Graph image (public path). A tool may override it by
    // providing public/images/og/{slug}.png.
    'og_image' => 'images/og-default.png',

    // Twitter/X handle without "@", optional.
    'twitter' => env('SITE_TWITTER'),

    // Public contact address shown on /contact, /privacy and /terms.
    'contact_email' => env('SITE_CONTACT_EMAIL', 'luismiguelmolina8@gmail.com'),

    // Official social profiles (Organization "sameAs"), comma-separated URLs.
    'same_as' => array_values(array_filter(array_map('trim', explode(',', (string) env('SITE_SAME_AS', ''))))),

    // Search engine ownership verification tokens (content of the meta tag only).
    'verification' => [
        'google' => env('SITE_GOOGLE_VERIFICATION'),
        'bing' => env('SITE_BING_VERIFICATION'),
    ],

    // Production canonical host enforcement (redirect www/non-www and other hosts to APP_URL).
    'force_canonical_host' => (bool) env('SITE_FORCE_CANONICAL_HOST', true),
];
