<?php

namespace Tests\Feature;

use App\Support\Locales;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdsAndAnalyticsTest extends TestCase
{
    use RefreshDatabase;

    private function enableAds(): void
    {
        config([
            'ads.enabled' => true,
            'ads.client_id' => 'ca-pub-123',
            'ads.slots' => ['top' => '111', 'bottom' => '222', 'sidebar' => '333'],
        ]);
    }

    public function test_no_ads_render_when_disabled_globally(): void
    {
        $this->makeTool();

        $this->get('/json-formatter')
            ->assertOk()
            ->assertDontSee('adsbygoogle', false)
            ->assertDontSee('data-ad-slot', false);
    }

    public function test_ads_render_when_enabled(): void
    {
        $this->enableAds();
        $this->makeTool();

        $this->get('/json-formatter')
            ->assertOk()
            ->assertSee('pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-123', false)
            ->assertSee('data-ad-slot="top"', false)
            ->assertSee('data-ad-slot="bottom"', false)
            ->assertSee('data-ad-slot="sidebar"', false);
    }

    public function test_ad_script_is_deferred_and_top_and_bottom_units_have_a_fixed_size(): void
    {
        $this->enableAds();
        $this->makeTool();

        $this->get('/json-formatter')
            ->assertOk()
            ->assertDontSee('<script async src="https://pagead2.googlesyndication.com', false)
            ->assertSee('ad-unit-top', false)
            ->assertSee('ad-unit-bottom', false)
            ->assertSee('data-ad-format="vertical"', false)
            ->assertDontSee('data-ad-format="auto"', false);
    }

    public function test_affiliate_offer_stays_off_until_it_has_an_https_url_and_a_brand(): void
    {
        $this->makeTool(['slug' => 'password-generator', 'name' => 'Password Generator']);

        $this->get('/password-generator')->assertOk()->assertDontSee('data-affiliate-click', false);

        config(['affiliates.offers.password-manager.url' => 'http://partner.example/x', 'affiliates.offers.password-manager.brand' => 'Acme']);
        $this->get('/password-generator')->assertOk()->assertDontSee('data-affiliate-click', false);

        config(['affiliates.offers.password-manager.url' => 'https://partner.example/x']);
        $this->get('/password-generator')
            ->assertOk()
            ->assertSee('data-affiliate-click="password-manager"', false)
            ->assertSee('rel="sponsored noopener"', false)
            ->assertSee('Try Acme')
            ->assertSee('we may earn a commission');
    }

    public function test_affiliate_offer_only_shows_on_its_own_tools(): void
    {
        config(['affiliates.offers.password-manager.url' => 'https://partner.example/x', 'affiliates.offers.password-manager.brand' => 'Acme']);
        $this->makeTool();

        $this->get('/json-formatter')->assertOk()->assertDontSee('data-affiliate-click', false);
    }

    public function test_affiliate_texts_are_translated_in_every_locale(): void
    {
        $keys = ['Sponsored', 'Try :brand', 'Affiliate link: we may earn a commission at no extra cost to you.'];
        foreach (config('affiliates.offers') as $offer) {
            array_push($keys, $offer['title'], $offer['text']);
        }

        foreach (Locales::codes() as $locale) {
            if (Locales::isDefault($locale)) {
                continue;
            }
            $dictionary = json_decode(file_get_contents(lang_path("{$locale}.json")), true);
            foreach ($keys as $key) {
                $this->assertArrayHasKey($key, $dictionary, "{$locale}: {$key}");
            }
        }
    }

    public function test_ads_do_not_render_when_disabled_for_the_tool(): void
    {
        $this->enableAds();
        $this->makeTool(['ads_enabled' => false]);

        $this->get('/json-formatter')->assertOk()->assertDontSee('adsbygoogle', false);
    }

    public function test_premium_tools_never_show_ads(): void
    {
        $this->enableAds();
        $this->makeTool(['is_premium' => true]);

        $this->get('/json-formatter')->assertOk()->assertDontSee('adsbygoogle', false);
    }

    public function test_slot_without_id_renders_nothing(): void
    {
        $this->enableAds();
        config(['ads.slots.sidebar' => null]);
        $this->makeTool();

        $this->get('/json-formatter')
            ->assertSee('data-ad-slot="top"', false)
            ->assertDontSee('data-ad-slot="sidebar"', false);
    }

    public function test_analytics_disabled_renders_nothing(): void
    {
        $this->get('/')->assertOk()->assertDontSee('googletagmanager', false);
    }

    public function test_ga4_tag_renders_when_enabled(): void
    {
        config(['analytics.enabled' => true, 'analytics.ga_id' => 'G-TEST123']);

        $this->get('/')
            ->assertOk()
            ->assertSee('https://www.googletagmanager.com/gtag/js?id=G-TEST123', false)
            ->assertSee("gtag('config', \"G-TEST123\"", false);
    }

    public function test_ga4_script_is_not_loaded_up_front(): void
    {
        config(['analytics.enabled' => true, 'analytics.ga_id' => 'G-TEST123']);

        $this->get('/')
            ->assertOk()
            ->assertDontSee('<script async src="https://www.googletagmanager.com/gtag/js', false);
    }

    public function test_gtm_takes_precedence_over_ga4(): void
    {
        config(['analytics.enabled' => true, 'analytics.ga_id' => 'G-TEST123', 'analytics.gtm_id' => 'GTM-ABC']);

        $this->get('/')
            ->assertOk()
            ->assertSee('"GTM-ABC"', false)
            ->assertSee('ns.html?id=GTM-ABC', false)
            ->assertSee('data-analytics="gtm"', false)
            ->assertDontSee('gtag/js', false);
    }
}
