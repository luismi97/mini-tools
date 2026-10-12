<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\Tool;
use App\Support\Catalog;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CatalogTest extends TestCase
{
    use RefreshDatabase;

    public function test_only_active_tools_in_active_categories_are_listed_in_order(): void
    {
        $active = Category::factory()->create();
        $inactive = Category::factory()->inactive()->create();
        Tool::factory()->for($active)->create(['slug' => 'b', 'sort_order' => 20]);
        Tool::factory()->for($active)->create(['slug' => 'a', 'sort_order' => 10]);
        Tool::factory()->for($active)->inactive()->create(['slug' => 'off']);
        Tool::factory()->for($inactive)->create(['slug' => 'orphan']);

        $this->assertSame(['a', 'b'], Catalog::tools()->pluck('slug')->all());
        $this->assertSame([$active->id], Catalog::categories()->pluck('id')->all());
        $this->assertNull(Catalog::tool('orphan'));
    }

    public function test_cache_is_flushed_when_a_tool_changes(): void
    {
        $tool = Tool::factory()->create(['slug' => 'x']);
        $this->assertNotNull(Catalog::tool('x'));

        $tool->update(['is_active' => false]);

        $this->assertNull(Catalog::tool('x'));
    }

    public function test_related_tools_fill_from_other_categories(): void
    {
        $tool = Tool::factory()->create(['slug' => 'main']);
        $sibling = Tool::factory()->for($tool->category)->create(['slug' => 'sibling', 'sort_order' => 99]);
        $others = Tool::factory()->count(5)->create(['sort_order' => 1]);

        $related = Catalog::related(Catalog::tool('main'));

        $this->assertCount(4, $related);
        $this->assertSame('sibling', $related->first()->slug);
        $this->assertNotContains('main', $related->pluck('slug'));
    }

    public function test_search_index_contains_only_public_metadata(): void
    {
        Tool::factory()->create(['name' => 'Searchable', 'slug' => 'searchable']);

        $entry = Catalog::searchIndex()[0];

        $this->assertSame(['name', 'alias', 'url', 'description', 'category', 'icon'], array_keys($entry));
        $this->assertSame('', $entry['alias'], 'The default locale needs no alias');
        $this->assertSame(url('/searchable'), $entry['url']);
    }

    public function test_tool_shows_ads_only_when_globally_enabled_and_allowed(): void
    {
        $tool = Tool::factory()->make(['ads_enabled' => true, 'is_premium' => false]);

        config(['ads.enabled' => false]);
        $this->assertFalse($tool->showsAds());

        config(['ads.enabled' => true]);
        $this->assertTrue($tool->showsAds());

        $tool->is_premium = true;
        $this->assertFalse($tool->showsAds());
    }
}
