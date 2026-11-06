<?php

/*
| Affiliate offers shown by <x-affiliate-offer /> below the tools listed here.
| An offer renders only when its env URL (https) and brand are set, so every
| offer stays off until the program has approved the site. Texts are English
| keys translated through lang/{locale}.json.
*/

return [
    'offers' => [
        'password-manager' => [
            'url' => env('AFFILIATE_PASSWORD_MANAGER_URL'),
            'brand' => env('AFFILIATE_PASSWORD_MANAGER_BRAND'),
            'title' => 'Need to keep your passwords safe?',
            'text' => ':brand stores them in an encrypted vault so you only have to remember one.',
            'tools' => ['password-generator'],
        ],
        'pdf-editor' => [
            'url' => env('AFFILIATE_PDF_EDITOR_URL'),
            'brand' => env('AFFILIATE_PDF_EDITOR_BRAND'),
            'title' => 'Need to edit the text inside a PDF?',
            'text' => ':brand is a PDF editor for changes these free tools don’t cover.',
            'tools' => ['merge-pdf', 'split-pdf', 'rotate-pdf', 'organize-pdf', 'delete-pdf-pages', 'add-page-numbers-to-pdf'],
        ],
    ],
];
