<?php

namespace App\Models;

use App\Models\Concerns\HasTranslations;
use App\Support\Catalog;
use Database\Factories\ToolFactory;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tool extends Model
{
    /** @use HasFactory<ToolFactory> */
    use HasFactory;

    use HasTranslations;

    /** Fields read in the current locale (see HasTranslations). */
    protected array $translatable = ['name', 'short_description', 'description', 'content', 'steps', 'faq', 'seo_title', 'seo_description'];

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'short_description',
        'description',
        'content',
        'steps',
        'faq',
        'translations',
        'icon',
        'is_active',
        'is_premium',
        'ads_enabled',
        'seo_title',
        'seo_description',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'is_premium' => 'boolean',
            'ads_enabled' => 'boolean',
            'sort_order' => 'integer',
            'steps' => 'array',
            'faq' => 'array',
            'translations' => 'array',
        ];
    }

    protected static function booted(): void
    {
        static::saved(fn () => Catalog::flush());
        static::deleted(fn () => Catalog::flush());
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    #[Scope]
    protected function active(Builder $query): void
    {
        $query->where('is_active', true)
            ->whereHas('category', fn (Builder $q) => $q->where('is_active', true));
    }

    #[Scope]
    protected function ordered(Builder $query): void
    {
        $query->orderBy('sort_order')->orderBy('name');
    }

    public function url(?string $locale = null): string
    {
        return lroute('tool.show', ['slug' => $this->localSlug($locale)], $locale);
    }

    public function seoTitle(): string
    {
        return $this->seo_title ?: $this->name.' — '.__('Free Online Tool');
    }

    public function seoDescription(): string
    {
        return $this->seo_description ?: $this->short_description;
    }

    /**
     * Whether ads may be shown on this tool's page. Premium tools never show ads.
     */
    public function showsAds(): bool
    {
        return config('ads.enabled') && $this->ads_enabled && ! $this->is_premium;
    }
}
