<?php

/*
| Analytics configuration used by the <x-analytics /> component.
| If a GTM container ID is set it takes precedence over the GA4 tag.
*/

return [
    'enabled' => (bool) env('ANALYTICS_ENABLED', false),

    // GA4 measurement ID, e.g. "G-XXXXXXXXXX".
    'ga_id' => env('ANALYTICS_GA_ID'),

    // Google Tag Manager container ID, e.g. "GTM-XXXXXXX".
    'gtm_id' => env('ANALYTICS_GTM_ID'),

    // Regions where analytics/ads storage is denied until the user consents
    // (EEA + United Kingdom + Switzerland). Used for Google Consent Mode v2.
    'consent_regions' => [
        'AT', 'BE', 'BG', 'HR', 'CY', 'CZ', 'DK', 'EE', 'FI', 'FR', 'DE', 'GR', 'HU', 'IS', 'IE', 'IT',
        'LV', 'LI', 'LT', 'LU', 'MT', 'NL', 'NO', 'PL', 'PT', 'RO', 'SK', 'SI', 'ES', 'SE', 'GB', 'CH',
    ],
];
