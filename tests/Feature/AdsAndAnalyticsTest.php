<?php

namespace Tests\Feature;

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
