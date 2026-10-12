<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Tool;
use App\Support\Seo;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ToolPageTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Every tool in the seeder must have a working page with complete SEO.
     * New tools are covered automatically once they are added to ToolSeeder.
     */
    public function test_every_seeded_tool_renders_with_seo(): void
    {
        $this->seed(DatabaseSeeder::class);

        $tools = Tool::all();
        $this->assertGreaterThanOrEqual(25, $tools->count());

        foreach ($tools as $tool) {
            $response = $this->get("/{$tool->slug}");

            $this->assertSame(200, $response->status(), "/{$tool->slug} should render (missing view?)");
            $this->assertNotEmpty($tool->seo_title, "{$tool->slug} needs an seo_title");
            $this->assertLessThanOrEqual(Seo::MAX_TITLE, mb_strlen($tool->seo_title), "{$tool->slug} seo_title is too long for Google");
            $this->assertNotEmpty($tool->content, "{$tool->slug} needs long-form content (database/seeders/content/tools.php)");
            $this->assertGreaterThanOrEqual(80, str_word_count(strip_tags($tool->content)), "{$tool->slug} content is too thin");
            $this->assertFileExists(public_path("images/og/{$tool->slug}.png"), "{$tool->slug} needs an OG image: php artisan seo:images");
            $this->assertNotEmpty($tool->seo_description, "{$tool->slug} needs an seo_description");
            $this->assertLessThanOrEqual(160, mb_strlen($tool->seo_description), "{$tool->slug} seo_description is too long");

            $response
                ->assertSee('<title>'.e(Seo::make($tool->seoTitle(), '')->fullTitle()).'</title>', false)
                ->assertSee('content="index, follow, max-image-preview:large', false)
                ->assertSee('"dateModified"', false)
                ->assertSee('/images/og/'.$tool->slug.'.png', false)
                ->assertSee('<meta name="description" content="'.e($tool->seo_description).'">', false)
                ->assertSee('<link rel="canonical" href="'.url($tool->slug).'">', false)
                ->assertSee('property="og:title"', false)
                ->assertSee('property="og:image"', false)
                ->assertSee('name="twitter:card" content="summary_large_image"', false)
                ->assertSee('"@type":"WebApplication"', false)
                ->assertSee('"@type":"BreadcrumbList"', false)
                ->assertSee('"@type":"FAQPage"', false)
                ->assertSee('data-tool="'.$tool->slug.'"', false)
                ->assertSee('<h1', false)
                ->assertSee('How to use')
                ->assertSee('Frequently asked questions')
                ->assertSee('Related tools');

            $this->assertFileExists(resource_path("js/tools/{$tool->slug}.js"), "{$tool->slug} needs its JS entry");
        }
    }

    public function test_every_tool_view_has_a_seeded_tool(): void
    {
        $this->seed(DatabaseSeeder::class);

        $views = collect(glob(resource_path('views/tools/*.blade.php')))
            ->map(fn ($path) => basename($path, '.blade.php'));

        $this->assertEqualsCanonicalizing($views->all(), Tool::pluck('slug')->all());
    }

    public function test_loan_calculator_shows_the_disclaimer(): void
    {
        $this->seed(DatabaseSeeder::class);

        $this->get('/loan-calculator')
            ->assertOk()
            ->assertSee('This calculator provides estimates for informational purposes only.')
            ->assertSee('Actual loan terms may vary by lender.');
    }

    public function test_inactive_tool_returns_404(): void
    {
        $this->makeTool(['is_active' => false]);

        $this->get('/json-formatter')->assertNotFound();
    }

    public function test_tool_in_inactive_category_returns_404(): void
    {
        $this->makeTool([], ['is_active' => false]);

        $this->get('/json-formatter')->assertNotFound();
    }

    public function test_active_tool_without_a_view_returns_404(): void
    {
        $this->makeTool(['slug' => 'not-built-yet']);

        $this->get('/not-built-yet')->assertNotFound();
    }

    public function test_unknown_slug_returns_404_page(): void
    {
        $this->get('/does-not-exist')
            ->assertNotFound()
            ->assertSee('Page not found')
            ->assertSee('noindex', false);
    }

    public function test_related_tools_prefer_the_same_category(): void
    {
        $tool = $this->makeTool();
        $sibling = Tool::factory()->for($tool->category)->create(['name' => 'Sibling Tool', 'sort_order' => 50]);
        $other = Tool::factory()->for(Category::factory())->create(['name' => 'Other Tool', 'sort_order' => 1]);

        $this->get('/json-formatter')
            ->assertOk()
            ->assertSeeInOrder(['Related tools', $sibling->name, $other->name]);
    }

    public function test_json_ld_cannot_break_out_of_the_script_tag(): void
    {
        $this->makeTool(['seo_description' => '</script><script>alert(1)</script>']);

        $response = $this->get('/json-formatter')->assertOk();

        $this->assertStringNotContainsString('<script>alert(1)</script>', $response->getContent());
    }

    public function test_reserved_paths_are_not_captured_by_the_tool_route(): void
    {
        $this->seed(DatabaseSeeder::class);

        $this->get('/sitemap.xml')->assertOk();
        $this->get('/robots.txt')->assertOk();
        $this->get('/up')->assertOk();
        $this->get('/category/developer-tools')->assertOk();
    }
}
