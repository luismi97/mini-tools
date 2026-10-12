<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Developer Tools',
                'slug' => 'developer-tools',
                'icon' => 'code',
                'description' => 'Format, validate, encode and decode data right in your browser. Built for developers who need quick answers.',
                'seo_title' => 'Free Online Developer Tools',
            ],
            [
                'name' => 'Image Tools',
                'slug' => 'image-tools',
                'icon' => 'image',
                'description' => 'Compress, convert and resize images without uploading them anywhere. Everything runs on your device.',
                'seo_title' => 'Free Online Image Tools',
            ],
            [
                'name' => 'PDF Tools',
                'slug' => 'pdf-tools',
                'icon' => 'file-text',
                'description' => 'Merge, split and convert PDF files quickly and privately.',
                'seo_title' => 'Free Online PDF Tools',
            ],
            [
                'name' => 'Calculators',
                'slug' => 'calculators',
                'icon' => 'calculator',
                'description' => 'Fast, accurate calculators for loans, percentages, interest and everyday math.',
                'seo_title' => 'Free Online Calculators',
            ],
            [
                'name' => 'Converters',
                'slug' => 'converters',
                'icon' => 'repeat',
                'description' => 'Convert data and files between formats in a couple of clicks.',
                'seo_title' => 'Free Online Converters',
            ],
            [
                'name' => 'Text Tools',
                'slug' => 'text-tools',
                'icon' => 'type',
                'description' => 'Count, clean up and transform text instantly.',
                'seo_title' => 'Free Online Text Tools',
            ],
            [
                'name' => 'Health Calculators',
                'slug' => 'health-calculators',
                'icon' => 'heart-pulse',
                'description' => 'BMI, daily calories and pregnancy due date calculators based on standard medical formulas.',
                'seo_title' => 'Free Health Calculators',
            ],
            [
                'name' => 'Everyday Tools',
                'slug' => 'everyday-tools',
                'icon' => 'timer',
                'description' => 'Timers, stopwatches and random pickers for school, work and everyday life.',
                'seo_title' => 'Free Everyday Online Tools',
            ],
            [
                'name' => 'Generators',
                'slug' => 'generators',
                'icon' => 'sparkles',
                'description' => 'Generate QR codes, UUIDs, passwords and more for free.',
                'seo_title' => 'Free Online Generators',
            ],
        ];

        $intros = require __DIR__.'/content/categories.php';
        $translations = TranslationFiles::load('categories');

        foreach ($categories as $order => $data) {
            Category::updateOrCreate(
                ['slug' => $data['slug']],
                $data + [
                    'intro' => $intros[$data['slug']] ?? null,
                    'translations' => TranslationFiles::for($translations, $data['slug']),
                    'sort_order' => ($order + 1) * 10,
                    'is_active' => true,
                ],
            );
        }
    }
}
