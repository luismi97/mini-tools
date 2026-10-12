<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Tool;
use App\Support\Catalog;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeAndCategoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_lists_tools_and_categories(): void
    {
        $this->seed(DatabaseSeeder::class);
        Category::factory()->create(['name' => 'Future Tools', 'slug' => 'future-tools']);

        $this->get('/')
            ->assertOk()
            ->assertSee('<title>Free Online Tools — Tiny Knack</title>', false)
            ->assertSee('Future Tools')
            ->assertSee('Popular tools')
            ->assertSee('Categories')
            ->assertSee('Recently added')
            ->assertSee('JSON Formatter')
            ->assertSee('PDF Tools')
            ->assertSee('Coming soon')
            ->assertSee('id="search-index"', false)
            ->assertSee('"@type":"WebSite"', false);
    }

    public function test_inactive_tools_are_hidden_everywhere(): void
    {
        $this->seed(DatabaseSeeder::class);
        Tool::where('slug', 'qr-generator')->update(['is_active' => false]);
        Catalog::flush();

        $this->get('/')->assertOk()->assertDontSee('QR Code Generator');
        $this->get('/sitemap.xml')->assertDontSee('/qr-generator');
    }

    public function test_category_page_lists_its_tools(): void
    {
        $this->seed(DatabaseSeeder::class);

        $this->get('/category/image-tools')
            ->assertOk()
            ->assertSee('Free Online Image Tools')
            ->assertSee('Image Compressor')
            ->assertSee('JPG to WebP')
            ->assertDontSee('Loan Calculator</h3>', false)
            ->assertSee('"@type":"BreadcrumbList"', false)
            ->assertDontSee('noindex', false);
    }

    public function test_empty_category_is_noindex(): void
    {
        Category::factory()->create(['slug' => 'empty-category', 'name' => 'Empty Tools']);

        $this->get('/category/empty-category')
            ->assertOk()
            ->assertSee('<meta name="robots" content="noindex, follow">', false)
            ->assertSee('coming soon');
    }

    public function test_inactive_or_unknown_category_returns_404(): void
    {
        Category::factory()->inactive()->create(['slug' => 'hidden']);

        $this->get('/category/hidden')->assertNotFound();
        $this->get('/category/nope')->assertNotFound();
    }

    public function test_security_headers_are_sent(): void
    {
        $this->get('/')
            ->assertHeader('X-Content-Type-Options', 'nosniff')
            ->assertHeader('X-Frame-Options', 'SAMEORIGIN')
            ->assertHeader('Referrer-Policy', 'strict-origin-when-cross-origin');
    }
}
