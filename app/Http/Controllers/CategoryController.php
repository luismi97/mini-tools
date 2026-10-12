<?php

namespace App\Http\Controllers;

use App\Support\Catalog;
use App\Support\Locales;
use App\Support\Seo;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    public function show(string $slug): View|RedirectResponse
    {
        $category = Catalog::categoryByLocalSlug($slug, Locales::current());

        if (! $category) {
            $fallback = Locales::isDefault() ? null : Catalog::category($slug);
            abort_unless($fallback, 404);

            return redirect()->to($fallback->url(), 301);
        }

        $seo = Seo::make($category->seoTitle(), $category->seoDescription())
            ->image(Seo::ogImage("category-{$category->slug}"))
            ->alternates(collect(Locales::codes())->mapWithKeys(fn ($l) => [$l => $category->url($l)])->all())
            ->breadcrumbs([$category->name => $category->url()])
            // Empty categories are thin content: keep them out of the index until they have tools.
            ->noindex($category->tools->isEmpty())
            ->schema([
                '@type' => 'CollectionPage',
                'name' => $category->seoTitle(),
                'description' => $category->seoDescription(),
                'url' => $category->url(),
                'inLanguage' => Locales::get('hreflang'),
                'publisher' => Seo::publisher(),
                // ItemList tells search engines which tools this category contains.
                'mainEntity' => [
                    '@type' => 'ItemList',
                    'numberOfItems' => $category->tools->count(),
                    'itemListElement' => $category->tools->values()->map(fn ($tool, $i) => [
                        '@type' => 'ListItem',
                        'position' => $i + 1,
                        'url' => $tool->url(),
                        'name' => $tool->name,
                    ])->all(),
                ],
            ]);

        return view('category', [
            'seo' => $seo,
            'category' => $category,
            'otherCategories' => Catalog::categories()->reject(fn ($c) => $c->id === $category->id),
        ]);
    }
}
