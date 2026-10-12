<?php

namespace Tests\Feature;

use App\Http\Controllers\PageController;
use App\Models\Category;
use App\Models\Tool;
use App\Support\Catalog;
use App\Support\Locales;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SitemapTest extends TestCase
{
    use RefreshDatabase;

    public function test_sitemap_lists_home_categories_with_tools_and_active_tools(): void
    {
        $this->seed(DatabaseSeeder::class);
        Tool::factory()->for(Category::where('slug', 'calculators')->first())->inactive()->create(['slug' => 'hidden-tool']);
        Category::factory()->create(['slug' => 'empty-category']);
        Catalog::flush();

        $response = $this->get('/sitemap.xml');

        $response->assertOk()->assertHeader('Content-Type', 'application/xml; charset=UTF-8');
        $xml = simplexml_load_string($response->getContent());
        $this->assertNotFalse($xml, 'Sitemap must be valid XML');

        $locs = [];
        foreach ($xml->url as $url) {
            $locs[] = (string) $url->loc;
        }
        $this->assertContains(url('/'), $locs);
        $this->assertContains(url('/category/developer-tools'), $locs);
        $this->assertContains(url('/json-formatter'), $locs);
        $this->assertContains(url('/qr-generator'), $locs);
        $this->assertNotContains(url('/hidden-tool'), $locs);
        $this->assertNotContains(url('/category/empty-category'), $locs, 'Empty categories are excluded');
        $categoriesWithTools = Category::where('is_active', true)->whereHas('tools', fn ($q) => $q->where('is_active', true))->count();
        $perLocale = 1 + $categoriesWithTools + Tool::where('is_active', true)->count() + count(PageController::PAGES);
        $this->assertCount($perLocale * count(Locales::codes()), $locs, '(home + categories with tools + active tools + trust pages) × locales');
    }

    public function test_robots_blocks_crawlers_outside_production(): void
    {
        $this->get('/robots.txt')
            ->assertOk()
            ->assertHeader('Content-Type', 'text/plain; charset=UTF-8')
            ->assertSee('Disallow: /');
    }

    public function test_robots_allows_crawlers_in_production_and_links_sitemap(): void
    {
        $this->app['env'] = 'production';
        config(['app.url' => 'http://localhost']);

        $content = $this->get('/robots.txt')->assertOk()->getContent();

        $this->assertStringContainsString("Disallow: /up\n", $content);
        $this->assertStringNotContainsString("Disallow: /\n", $content);
        $this->assertStringContainsString('Sitemap: ', $content);
        $this->assertStringContainsString('/sitemap.xml', $content);
    }
}
