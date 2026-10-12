<?php

namespace App\Support;

use App\Models\Category;
use App\Models\Tool;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

/**
 * Cached, read-only view of the active categories and tools.
 *
 * Every page (navigation, search, home, sitemap) reads from here so the
 * catalog is queried once and then served from cache until a model changes.
 */
class Catalog
{
    private const CACHE_KEY = 'catalog.v1';

    /** @var array{categories: Collection<int, Category>, tools: Collection<int, Tool>}|null */
    private static ?array $memo = null;

    /**
     * Active categories, ordered, each with its active tools loaded.
     *
     * @return Collection<int, Category>
     */
    public static function categories(): Collection
    {
        return self::load()['categories'];
    }

    /**
     * Active tools (in active categories), ordered, each with its category loaded.
     *
     * @return Collection<int, Tool>
     */
    public static function tools(): Collection
    {
        return self::load()['tools'];
    }

    /** Find an active tool by its internal (default-locale) slug. */
    public static function tool(string $slug): ?Tool
    {
        return self::tools()->firstWhere('slug', $slug);
    }

    /** Find an active tool by its URL slug in a locale. */
    public static function toolByLocalSlug(string $slug, string $locale): ?Tool
    {
        return self::tools()->first(fn (Tool $t) => $t->localSlug($locale) === $slug);
    }

    public static function category(string $slug): ?Category
    {
        return self::categories()->firstWhere('slug', $slug);
    }

    public static function categoryByLocalSlug(string $slug, string $locale): ?Category
    {
        return self::categories()->first(fn (Category $c) => $c->localSlug($locale) === $slug);
    }

    /**
     * Lower sort_order means more prominent.
     *
     * @return Collection<int, Tool>
     */
    public static function popular(int $limit = 8): Collection
    {
        return self::tools()->take($limit)->values();
    }

    /** @return Collection<int, Tool> */
    public static function recent(int $limit = 4): Collection
    {
        return self::tools()->sortByDesc('created_at')->take($limit)->values();
    }

    /**
     * Tools from the same category first, then filled with other popular tools.
     *
     * @return Collection<int, Tool>
     */
    public static function related(Tool $tool, int $limit = 4): Collection
    {
        $others = self::tools()->reject(fn (Tool $t) => $t->id === $tool->id);

        return $others->where('category_id', $tool->category_id)
            ->concat($others->where('category_id', '!=', $tool->category_id))
            ->take($limit)
            ->values();
    }

    /**
     * Minimal payload for the client-side search box.
     *
     * `alias` is the default-language name, so e.g. "merge pdf" also finds "Unir PDF".
     *
     * @return array<int, array{name: string, alias: string, url: string, description: string, category: string, icon: ?string}>
     */
    public static function searchIndex(): array
    {
        return self::tools()->map(fn (Tool $t) => [
            'name' => $t->name,
            'alias' => Locales::isDefault() ? '' : (string) $t->getRawOriginal('name'),
            'url' => $t->url(),
            'description' => $t->short_description,
            'category' => $t->category->name,
            'icon' => $t->icon,
        ])->all();
    }

    public static function flush(): void
    {
        self::$memo = null;
        Cache::forget(self::CACHE_KEY);
    }

    private static function load(): array
    {
        return self::$memo ??= Cache::rememberForever(self::CACHE_KEY, function () {
            $categories = Category::active()->ordered()
                ->with(['tools' => fn ($q) => $q->where('is_active', true)->ordered()])
                ->get();

            $tools = $categories
                ->flatMap(fn (Category $c) => $c->tools->each(fn (Tool $t) => $t->setRelation('category', $c)))
                ->sortBy([['sort_order', 'asc'], ['name', 'asc']])
                ->values();

            return ['categories' => $categories, 'tools' => $tools];
        });
    }
}
