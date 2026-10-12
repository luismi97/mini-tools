<?php

namespace App\Http\Controllers;

use App\Support\Catalog;
use App\Support\Locales;
use App\Support\Seo;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $seo = Seo::make(__('Free Online Tools').' — '.config('site.name'), __(config('site.default_description')))
            ->alternates(collect(Locales::codes())->mapWithKeys(fn ($l) => [$l => lroute('home', [], $l)])->all())
            ->schema([
                '@type' => 'WebSite',
                '@id' => lroute('home').'#website',
                'name' => config('site.name'),
                'url' => lroute('home'),
                'inLanguage' => Locales::get('hreflang'),
                'publisher' => Seo::publisher(),
            ])
            ->schema(Seo::organization());

        return view('home', [
            'seo' => $seo,
            'popular' => Catalog::popular(),
            'recent' => Catalog::recent(),
            'categories' => Catalog::categories(),
        ]);
    }
}
