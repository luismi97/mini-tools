<?php

namespace App\Support;

/**
 * Per-page SEO metadata rendered by the main layout:
 * title, description, canonical, Open Graph, Twitter card and JSON-LD.
 */
class Seo
{
    /** @var array<int, array{label: string, url: string}> */
    public array $breadcrumbs = [];

    /** @var array<int, array<string, mixed>> */
    public array $schemas = [];

    public bool $noindex = false;

    public string $ogType = 'website';

    /** @var array<string, string> locale => URL of this page in that locale (hreflang) */
    public array $alternates = [];

    public function __construct(
        public string $title,
        public string $description,
        public ?string $canonical = null,
        public ?string $image = null,
    ) {
        $this->canonical ??= url()->current();
        $this->image ??= self::ogImage('default') ?? asset(config('site.og_image'));
    }

    public static function make(string $title, string $description): self
    {
        return new self($title, $description);
    }

    /** Google shows roughly the first 60 characters of a title. */
    public const MAX_TITLE = 60;

    /**
     * The full <title>. The site name is appended only when it fits in
     * MAX_TITLE characters, so the keyword-rich part is never truncated.
     */
    public function fullTitle(): string
    {
        $site = config('site.name');
        if (str_contains($this->title, $site)) {
            return $this->title;
        }

        $branded = "{$this->title} | {$site}";

        return mb_strlen($branded) <= self::MAX_TITLE ? $branded : $this->title;
    }

    /**
     * Value for <meta name="robots">: indexable pages allow large image
     * previews and full snippets (helps Discover and rich results).
     */
    public function robots(): string
    {
        return $this->noindex
            ? 'noindex, follow'
            : 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1';
    }

    /**
     * The site publisher, referenced from other schema objects.
     *
     * @return array<string, mixed>
     */
    public static function organization(): array
    {
        $home = lroute('home', [], Locales::default());

        return array_filter([
            '@type' => 'Organization',
            '@id' => $home.'#organization',
            'name' => config('site.name'),
            'url' => $home,
            'logo' => [
                '@type' => 'ImageObject',
                'url' => asset('images/logo-512.png'),
                'width' => 512,
                'height' => 512,
            ],
            'sameAs' => config('site.same_as') ?: null,
        ]);
    }

    /** The publisher reference used by page-level schema objects. */
    public static function publisher(): array
    {
        return ['@id' => lroute('home', [], Locales::default()).'#organization'];
    }

    /**
     * URL of a generated Open Graph image, or null. Default locale images live in
     * public/images/og/{name}.png, others in public/images/og/{locale}/{name}.png.
     * Images are created with `php artisan seo:images`.
     */
    public static function ogImage(string $name, ?string $locale = null): ?string
    {
        $locale ??= Locales::current();
        $path = Locales::isDefault($locale) ? "images/og/{$name}.png" : "images/og/{$locale}/{$name}.png";

        return is_file(public_path($path)) ? asset($path) : null;
    }

    /**
     * URLs of this page in every locale, for hreflang links and the language switcher.
     *
     * @param  array<string, string>  $urls  locale => URL
     */
    public function alternates(array $urls): self
    {
        $this->alternates = $urls;

        return $this;
    }

    public function image(?string $url): self
    {
        if ($url) {
            $this->image = $url;
        }

        return $this;
    }

    public function noindex(bool $noindex = true): self
    {
        $this->noindex = $noindex;

        return $this;
    }

    public function schema(array $schema): self
    {
        $this->schemas[] = ['@context' => 'https://schema.org'] + $schema;

        return $this;
    }

    /**
     * Breadcrumb trail (Home is prepended automatically). Also emits BreadcrumbList JSON-LD.
     *
     * @param  array<string, string>  $items  label => url
     */
    public function breadcrumbs(array $items): self
    {
        $trail = [__('Home') => lroute('home')] + $items;

        $this->breadcrumbs = collect($trail)
            ->map(fn (string $url, string $label) => ['label' => $label, 'url' => $url])
            ->values()
            ->all();

        return $this->schema([
            '@type' => 'BreadcrumbList',
            'itemListElement' => collect($this->breadcrumbs)->map(fn (array $crumb, int $i) => [
                '@type' => 'ListItem',
                'position' => $i + 1,
                'name' => $crumb['label'],
                'item' => $crumb['url'],
            ])->all(),
        ]);
    }

    /**
     * JSON-LD safe for embedding inside a <script> tag.
     */
    public static function json(array $data): string
    {
        return json_encode(
            $data,
            JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT
        );
    }
}
