<?php

/*
| Central advertising configuration. Ad code lives only in the
| <x-ads.*> components; tool views never contain ad code directly.
*/

return [
    'enabled' => (bool) env('ADS_ENABLED', false),

    // Google AdSense publisher ID, e.g. "ca-pub-1234567890123456".
    'client_id' => env('ADS_CLIENT_ID'),

    'slots' => [
        'top' => env('ADS_SLOT_TOP'),
        'bottom' => env('ADS_SLOT_BOTTOM'),
        'sidebar' => env('ADS_SLOT_SIDEBAR'),
    ],
];
