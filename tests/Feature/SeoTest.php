<?php

namespace Tests\Feature;

use App\Http\Controllers\PageController;
use App\Models\Category;
use App\Models\Tool;
use App\Support\InternalLinker;
use App\Support\Seo;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SeoTest extends TestCase
{
    use RefreshDatabase;

    public function test_titles_keep_the_brand_only_when_it_fits(): void
    {
        $this->assertSame('Short title | Tiny Knack', Seo::make('Short title', '')->fullTitle());

        $long = 'Image Compressor — Compress JPG, PNG & WebP Online';
        $this->assertSame($long, Seo::make($long, '')->fullTitle());
        $this->assertLessThanOrEqual(Seo::MAX_TITLE, mb_strlen(Seo::make('Merge PDF Files Online — Free & Private', '')->fullTitle()));
    }

    public function test_trust_pages_render_and_are_in_the_sitemap(): void
    {
        $this->seed(DatabaseSeeder::class);
        $sitemap = $this->get('/sitemap.xml')->getContent();

        foreach (PageController::PAGES as $slug => $page) {
            $this->get("/{$slug}")
                ->assertOk()
                ->assertSee('<h1', false)
                ->assertSee($page['title'])
                ->assertSee('<link rel="canonical" href="'.url($slug).'">', false);
            $this->assertStringContainsString(url($slug), $sitemap);
        }

        $this->get('/privacy-policy')->assertSee('Google AdSense')->assertSee('adssettings.google.com', false);
        $this->get('/')->assertSee(route('page', 'privacy-policy'), false);
    }

    public function test_suggest_a_tool_page_emails_the_contact_address(): void
    {
        $this->seed(DatabaseSeeder::class);
        config(['site.contact_email' => 'owner@example.com']);

        $this->get('/suggest-a-tool')
            ->assertOk()
            ->assertSee('owner@example.com', false)
            ->assertSee('Send suggestion');
        $this->get('/de/tool-vorschlagen')->assertOk()->assertSee('Vorschlag senden');

        // Linked from the home page, the footer and the contact page.
        $this->get('/')->assertSee(url('suggest-a-tool'), false);
        $this->get('/contact')->assertSee(url('suggest-a-tool'), false);
    }

    public function test_page_slugs_never_collide_with_tool_slugs(): void
    {
        $this->seed(DatabaseSeeder::class);

        $this->assertEmpty(array_intersect(array_keys(PageController::PAGES), Tool::pluck('slug')->all()));
    }

    public function test_homepage_links_every_tool_and_declares_the_organization(): void
    {
        $this->seed(DatabaseSeeder::class);
        $html = $this->get('/')->assertOk()->getContent();

        foreach (Tool::all() as $tool) {
            $this->assertStringContainsString('href="'.url($tool->slug).'"', $html, "Home must link to {$tool->slug}");
        }
        $this->assertStringContainsString('"@type":"Organization"', $html);
        $this->assertStringContainsString('images/logo-512.png', $html);
    }

    public function test_category_pages_have_intro_and_item_list(): void
    {
        $this->seed(DatabaseSeeder::class);

        foreach (Category::all() as $category) {
            $this->assertNotEmpty($category->intro, "{$category->slug} needs an intro");
            $this->get("/category/{$category->slug}")
                ->assertOk()
                ->assertSee('"@type":"ItemList"', false)
                ->assertSee('About our', false);
        }
    }

    public function test_head_contains_icons_manifest_and_verification(): void
    {
        config(['site.verification.google' => 'google-token', 'site.verification.bing' => 'bing-token']);

        $this->get('/')
            ->assertSee('<link rel="apple-touch-icon"', false)
            ->assertSee('<link rel="manifest"', false)
            ->assertSee('<meta name="google-site-verification" content="google-token">', false)
            ->assertSee('<meta name="msvalidate.01" content="bing-token">', false)
            ->assertSee('property="og:image:alt"', false);

        $this->assertFileExists(public_path('favicon.ico'));
        $this->assertFileExists(public_path('apple-touch-icon.png'));
        $this->assertFileExists(public_path('site.webmanifest'));
        $this->assertFileExists(public_path('images/logo-512.png'));
    }

    public function test_internal_linker_links_first_mention_only_and_skips_headings_and_self(): void
    {
        $this->seed(DatabaseSeeder::class);
        $merge = Tool::where('slug', 'merge-pdf')->first();
        $linker = new InternalLinker($merge);

        $html = $linker->link('<h2>Split PDF</h2><p>Use Split PDF first, then Split PDF again. Merge PDF is this page. <code>Word Counter</code></p>');

        $this->assertStringContainsString('<h2>Split PDF</h2>', $html);
        $this->assertSame(1, substr_count($html, 'href="'.url('split-pdf').'"'));
        $this->assertStringNotContainsString(url('merge-pdf'), $html);
        $this->assertStringContainsString('<code>Word Counter</code>', $html);

        // Linking state is shared per page: a second call does not link the same tool again.
        $this->assertStringNotContainsString('href=', $linker->link('<p>Split PDF</p>'));
    }

    public function test_internal_links_are_never_nested_when_tool_names_overlap(): void
    {
        $this->seed(DatabaseSeeder::class);
        $linker = new InternalLinker(Tool::where('slug', 'mortgage-calculator')->first());

        $html = $linker->link('<p>Try the Auto Loan Calculator or the Loan Calculator.</p>');

        $this->assertSame(
            '<p>Try the <a href="'.url('auto-loan-calculator').'">Auto Loan Calculator</a> or the <a href="'.url('loan-calculator').'">Loan Calculator</a>.</p>',
            $html,
        );
    }

    public function test_tool_pages_link_to_other_tools_inside_content(): void
    {
        $this->seed(DatabaseSeeder::class);

        $this->get('/merge-pdf')->assertSee('<a href="'.url('split-pdf').'">Split PDF</a>', false);
    }

    public function test_uppercase_urls_redirect_to_lowercase(): void
    {
        $this->seed(DatabaseSeeder::class);

        $this->get('/Merge-PDF?x=1')->assertStatus(301)->assertRedirect(url('/merge-pdf?x=1'));
    }

    public function test_production_redirects_other_hosts_to_the_canonical_domain(): void
    {
        $this->seed(DatabaseSeeder::class);
        $this->app['env'] = 'production';
        config(['app.url' => 'https://tinyknack.example']);

        $this->get('http://www.tinyknack.example/merge-pdf')
            ->assertStatus(301)
            ->assertRedirect('https://tinyknack.example/merge-pdf');
    }
}
