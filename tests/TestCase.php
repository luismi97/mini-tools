<?php

namespace Tests;

use App\Models\Category;
use App\Models\Tool;
use App\Support\Catalog;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // Tests must not depend on a compiled Vite build.
        $this->withoutVite();

        // The catalog memoizes per process; start every test fresh.
        Catalog::flush();

        config([
            'ads.enabled' => false,
            'analytics.enabled' => false,
        ]);
    }

    /**
     * A tool with a real view (json-formatter) inside an active category.
     */
    protected function makeTool(array $toolAttributes = [], array $categoryAttributes = []): Tool
    {
        $category = Category::factory()->create($categoryAttributes + ['slug' => 'developer-tools', 'name' => 'Developer Tools']);

        return Tool::factory()->for($category)->create($toolAttributes + [
            'name' => 'JSON Formatter',
            'slug' => 'json-formatter',
            'seo_title' => 'JSON Formatter & Validator Online',
            'seo_description' => 'Format and validate JSON.',
        ]);
    }
}
