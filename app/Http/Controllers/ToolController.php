<?php

namespace App\Http\Controllers;

use App\Support\Catalog;
use App\Support\Locales;
use App\Support\Seo;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Renders any active tool by its (localized) slug. Each tool lives in its own
 * view (resources/views/tools/{slug}.blade.php, keyed by the internal slug)
 * and its own JS entry, so adding a tool never touches this controller. A tool
 * that needs server-side logic gets its own controller under App\Http\Controllers\Tools.
 */
class ToolController extends Controller
{
    public function show(string $slug): View|RedirectResponse
    {
        $locale = Locales::current();
        $tool = Catalog::toolByLocalSlug($slug, $locale);

        if (! $tool) {
            // A default-locale slug used under another locale (/es/merge-pdf) → its translated URL.
            $fallback = Locales::isDefault() ? null : Catalog::tool($slug);
            abort_unless($fallback, 404);

            return redirect()->to($fallback->url(), 301);
        }

        $view = "tools.{$tool->slug}";
        abort_unless(view()->exists($view), 404);

        $category = $tool->category;

        $seo = Seo::make($tool->seoTitle(), $tool->seoDescription())
            ->image(Seo::ogImage($tool->slug))
            ->alternates(collect(Locales::codes())->mapWithKeys(fn ($l) => [$l => $tool->url($l)])->all());
        $seo->breadcrumbs([
            $category->name => $category->url(),
            $tool->name => $tool->url(),
        ])
            ->schema([
                '@type' => 'WebApplication',
                'name' => $tool->name,
                'description' => $tool->seoDescription(),
                'url' => $tool->url(),
                'applicationCategory' => $category->slug === 'developer-tools' ? 'DeveloperApplication' : 'UtilitiesApplication',
                'operatingSystem' => 'Any',
                'browserRequirements' => 'Requires JavaScript',
                'isAccessibleForFree' => ! $tool->is_premium,
                'offers' => ['@type' => 'Offer', 'price' => '0', 'priceCurrency' => 'USD'],
                'inLanguage' => Locales::get('hreflang'),
                'image' => $seo->image,
                'dateModified' => $tool->updated_at?->toAtomString(),
                'publisher' => Seo::publisher(),
            ]);

        return view($view, [
            'seo' => $seo,
            'tool' => $tool,
            'related' => Catalog::related($tool),
        ]);
    }
}
