<?php

namespace Tests\Feature;

use App\Http\Controllers\PageController;
use App\Models\Category;
use App\Models\Tool;
use App\Support\Locales;
use App\Support\Seo;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Lang;
use Tests\TestCase;

/**
 * Every language other than the default must be complete: UI strings, tool and
 * category content, legal pages and OG images. Adding a locale to
 * config/locales.php makes these tests cover it automatically.
 */
class I18nTest extends TestCase
{
    use RefreshDatabase;

    /** @return list<string> */
    private function translatedLocales(): array
    {
        return array_values(array_filter(Locales::codes(), fn ($l) => ! Locales::isDefault($l)));
    }

    public function test_every_locale_has_its_files(): void
    {
        foreach ($this->translatedLocales() as $locale) {
            $this->assertFileExists(lang_path("{$locale}.json"));
            $this->assertFileExists(lang_path("js/{$locale}.json"));
            $this->assertFileExists(database_path("seeders/content/{$locale}/tools.php"));
            $this->assertFileExists(database_path("seeders/content/{$locale}/categories.php"));
            foreach (array_keys(PageController::PAGES) as $page) {
                $this->assertFileExists(resource_path("views/pages/{$locale}/{$page}.blade.php"));
            }
            foreach (['segments', 'hreflang', 'og', 'intl', 'prefix', 'native'] as $key) {
                $this->assertNotEmpty(Locales::get($key, $locale), "config/locales.php: {$locale}.{$key} is missing");
            }
        }
    }

    /**
     * Renders every page in every translated locale and fails on any __() key
     * that has no translation — this also covers dynamic keys such as option
     * labels, page titles and the site tagline.
     */
    public function test_rendered_pages_have_no_missing_ui_translations(): void
    {
        $this->seed(DatabaseSeeder::class);
        $missing = [];
        Lang::handleMissingKeysUsing(function (string $key, array $replace, ?string $locale) use (&$missing) {
            if ($locale !== null && ! Locales::isDefault($locale)) {
                $missing[$locale][$key] = true;
            }

            return $key;
        });

        foreach ($this->translatedLocales() as $locale) {
            $urls = [lroute('home', [], $locale)];
            foreach (Category::all() as $category) {
                $urls[] = $category->url($locale);
            }
            foreach (Tool::all() as $tool) {
                $urls[] = $tool->url($locale);
            }
            foreach (array_keys(PageController::PAGES) as $page) {
                $urls[] = PageController::url($page, $locale);
            }
            foreach ($urls as $url) {
                $this->get($url)->assertOk();
            }
            $this->get(lroute('home', [], $locale).'/no-such-page')->assertNotFound();
        }
        Lang::handleMissingKeysUsing(null);

        $this->assertSame([], array_map('array_keys', $missing), 'Add these keys to lang/{locale}.json');
    }

    /** Static check of the JS dictionaries: every t('…') / $t('…') literal in the code. */
    public function test_js_dictionaries_cover_every_literal_key(): void
    {
        $keys = [];
        $files = array_merge(
            glob(resource_path('js/{lib,tools,components}/*.js'), GLOB_BRACE),
            glob(resource_path('views/{,components/,components/*/,tools/,errors/}*.blade.php'), GLOB_BRACE),
        );
        $q = '\'((?:[^\'\\\\]|\\\\.)*)\'';
        foreach ($files as $file) {
            preg_match_all('/(?<![\w$])\$?tc?\(\s*'.$q.'(?:\s*,\s*'.$q.')?/', file_get_contents($file), $m, PREG_SET_ORDER);
            foreach ($m as $match) {
                $keys[stripcslashes($match[1])] = basename($file);
                if (str_contains($match[0], 'tc(') && ($match[2] ?? '') !== '') {
                    $keys[stripcslashes($match[2])] = basename($file);
                }
            }
        }
        unset($keys['']);
        $this->assertGreaterThan(150, count($keys), 'The key scanner found too few keys — is the regex broken?');

        foreach ($this->translatedLocales() as $locale) {
            $dict = json_decode(file_get_contents(lang_path("js/{$locale}.json")), true, flags: JSON_THROW_ON_ERROR);
            $missing = array_diff(array_keys($keys), array_keys($dict));
            $this->assertSame([], array_values($missing), "Add these keys to lang/js/{$locale}.json");
        }
    }

    public function test_every_tool_and_category_is_fully_translated(): void
    {
        $this->seed(DatabaseSeeder::class);

        $englishSlugs = Tool::pluck('slug')->all();

        foreach ($this->translatedLocales() as $locale) {
            $slugs = [];
            foreach (Tool::all() as $tool) {
                $t = $tool->translationsFor($locale);
                $where = "{$locale} translation of tool {$tool->slug}";
                // /{prefix}/{english-slug} 301s to the localized URL, so a localized slug must
                // never be the English slug of a different tool.
                $this->assertFalse(
                    ($t['slug'] ?? null) !== $tool->slug && in_array($t['slug'] ?? null, $englishSlugs, true),
                    "{$where}: slug is the English slug of another tool",
                );
                foreach (['slug', 'name', 'short_description', 'description', 'seo_title', 'seo_description', 'content'] as $field) {
                    $this->assertNotEmpty($t[$field] ?? null, "{$where}: missing {$field}");
                }
                $this->assertMatchesRegularExpression('/^[a-z0-9]+(?:-[a-z0-9]+)*$/', $t['slug'], "{$where}: invalid slug");
                $this->assertNotContains($t['slug'], PageController::slugs($locale), "{$where}: slug collides with a page");
                $slugs[] = $t['slug'];
                $this->assertLessThanOrEqual(Seo::MAX_TITLE, mb_strlen($t['seo_title']), "{$where}: seo_title too long");
                $this->assertLessThanOrEqual(160, mb_strlen($t['seo_description']), "{$where}: seo_description too long");
                $this->assertGreaterThanOrEqual(80, preg_match_all('/\p{L}+/u', strip_tags($t['content'])), "{$where}: content is too thin");
                $this->assertGreaterThanOrEqual(3, count($t['steps'] ?? []), "{$where}: needs steps");
                $this->assertGreaterThanOrEqual(3, count($t['faq'] ?? []), "{$where}: needs faq");
                $this->assertCount(count($tool->getRawOriginal('steps') ? json_decode($tool->getRawOriginal('steps'), true) : []), $t['steps'], "{$where}: steps count differs from English");
                $this->assertFileExists(public_path("images/og/{$locale}/{$tool->slug}.png"), "{$where}: run php artisan seo:images");
            }
            $this->assertSame(count($slugs), count(array_unique($slugs)), "{$locale}: tool slugs must be unique");

            foreach (Category::all() as $category) {
                $t = $category->translationsFor($locale);
                foreach (['slug', 'name', 'description', 'intro', 'seo_title', 'seo_description'] as $field) {
                    $this->assertNotEmpty($t[$field] ?? null, "{$locale} translation of category {$category->slug}: missing {$field}");
                }
                $this->assertFileExists(public_path("images/og/{$locale}/category-{$category->slug}.png"));
            }
            $this->assertFileExists(public_path("images/og/{$locale}/default.png"));
        }
    }

    public function test_spanish_tool_page_is_localized_with_alternates(): void
    {
        $this->seed(DatabaseSeeder::class);

        $this->get('/es/unir-pdf')
            ->assertOk()
            ->assertSee('<html lang="es"', false)
            ->assertSee('<link rel="alternate" hreflang="en" href="'.url('/merge-pdf').'">', false)
            ->assertSee('<link rel="alternate" hreflang="es" href="'.url('/es/unir-pdf').'">', false)
            ->assertSee('<link rel="alternate" hreflang="x-default" href="'.url('/merge-pdf').'">', false)
            ->assertSee('<link rel="canonical" href="'.url('/es/unir-pdf').'">', false)
            ->assertSee('<meta property="og:locale" content="es_LA">', false)
            ->assertSee('"inLanguage":"es"', false)
            ->assertSee('Preguntas frecuentes')
            ->assertSee('Cómo usar Unir PDF')
            ->assertSee(url('/i18n/es.js'), false)
            ->assertDontSee('Frequently asked questions');

        // The English page links to the Spanish version, and the switcher offers it.
        $this->get('/merge-pdf')
            ->assertSee('<link rel="alternate" hreflang="es" href="'.url('/es/unir-pdf').'">', false)
            ->assertSee('href="'.url('/es/unir-pdf').'" hreflang="es"', false)
            ->assertDontSee('/i18n/', false);
    }

    public function test_spanish_category_home_and_pages_render(): void
    {
        $this->seed(DatabaseSeeder::class);

        $this->get('/es')->assertOk()->assertSee('Herramientas gratis en línea')->assertSee(url('/es/categoria/herramientas-pdf'), false);
        $this->get('/es/categoria/herramientas-pdf')->assertOk()->assertSee('Herramientas PDF')->assertSee('"name":"Inicio"', false);
        $this->get('/es/politica-de-privacidad')->assertOk()->assertSee('Política de privacidad')->assertSee('localmente en tu navegador');
        $this->get('/es/acerca-de')->assertOk()->assertSee('Privado por diseño');
    }

    public function test_english_slugs_under_a_locale_prefix_redirect_to_the_localized_url(): void
    {
        $this->seed(DatabaseSeeder::class);

        $this->get('/es/merge-pdf')->assertRedirect('/es/unir-pdf')->assertStatus(301);
        $this->get('/es/categoria/pdf-tools')->assertRedirect('/es/categoria/herramientas-pdf')->assertStatus(301);
        $this->get('/unir-pdf')->assertNotFound();
    }

    public function test_pages_carry_the_mobile_menu_and_language_preference_helpers(): void
    {
        $this->seed(DatabaseSeeder::class);
        $html = $this->get('/merge-pdf')->assertOk()->getContent();

        // Mobile menu with every language and the "suggest" link.
        $this->assertStringContainsString('id="mobile-menu"', $html);
        $this->assertStringContainsString('data-locale="de"', $html);
        // Returning visitors are redirected before paint; the banner is written in the suggested language.
        $this->assertStringContainsString("localStorage.getItem('tk-locale')", $html);
        $this->assertStringContainsString('Diese Seite gibt es auch auf Deutsch.', $html);

        // Pages without translations (404) get neither the redirect nor the banner.
        $notFound = $this->get('/no-such-tool')->assertNotFound()->getContent();
        $this->assertStringNotContainsString('tk-locale', $notFound);
        $this->assertStringNotContainsString('localeSuggestion', $notFound);
    }

    public function test_money_calculators_default_to_the_locale_currency(): void
    {
        $this->seed(DatabaseSeeder::class);

        // German: EUR is the default and already in the option list.
        $this->get(Tool::where('slug', 'loan-calculator')->first()->url('de'))
            ->assertOk()
            ->assertSee('window.__currency = "EUR"', false);

        // Portuguese: BRL is not in the base lists, so it is prepended as the first option.
        $html = $this->get(Tool::where('slug', 'mortgage-calculator')->first()->url('pt'))
            ->assertOk()
            ->assertSee('window.__currency = "BRL"', false)
            ->getContent();
        $this->assertLessThan(strpos($html, '<option>USD</option>'), strpos($html, '<option>BRL</option>'));

        // English keeps USD and does not add extra currencies.
        $this->get('/mortgage-calculator')
            ->assertSee('window.__currency = "USD"', false)
            ->assertDontSee('<option>BRL</option>', false);
    }

    public function test_js_dictionary_is_served_as_a_cacheable_script(): void
    {
        $this->get('/i18n/es.js?v=abc')
            ->assertOk()
            ->assertHeader('Content-Type', 'application/javascript; charset=UTF-8')
            ->assertSee('window.__i18n = ', false)
            ->assertSee('Copiado');
        $this->assertStringContainsString('immutable', $this->get('/i18n/es.js')->headers->get('Cache-Control'));
        $this->get('/i18n/en.js')->assertNotFound();
        $this->get('/i18n/xx.js')->assertNotFound();
    }
}
