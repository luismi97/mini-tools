<?php

namespace App\Models;

use App\Models\Concerns\HasTranslations;
use App\Support\Catalog;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    /** @use HasFactory<CategoryFactory> */
    use HasFactory;

    use HasTranslations;

    /** Fields read in the current locale (see HasTranslations). */
    protected array $translatable = ['name', 'description', 'intro', 'seo_title', 'seo_description'];

    protected $fillable = [
        'name',
        'slug',
        'description',
        'intro',
        'translations',
        'icon',
        'is_active',
        'sort_order',
        'seo_title',
        'seo_description',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'sort_order' => 'integer',
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

    public function tools(): HasMany
    {
        return $this->hasMany(Tool::class);
    }

    #[Scope]
    protected function active(Builder $query): void
    {
        $query->where('is_active', true);
    }

    #[Scope]
    protected function ordered(Builder $query): void
    {
        $query->orderBy('sort_order')->orderBy('name');
    }

    public function url(?string $locale = null): string
    {
        return lroute('category.show', ['slug' => $this->localSlug($locale)], $locale);
    }

    public function seoTitle(): string
    {
        return $this->seo_title ?: __('Free Online :name', ['name' => $this->name]);
    }

    public function seoDescription(): string
    {
        return $this->seo_description ?: (string) $this->description;
    }
}
