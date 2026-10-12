<?php

namespace Tests\Feature;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LaunchReadinessTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_pages_set_no_cookies_so_the_cdn_can_cache_them(): void
    {
        $this->seed(DatabaseSeeder::class);

        foreach (['/', '/merge-pdf', '/category/pdf-tools', '/about', '/sitemap.xml'] as $url) {
            $response = $this->get($url)->assertOk();
            $this->assertEmpty($response->headers->getCookies(), "{$url} must not set cookies");
        }
    }

    public function test_production_pages_are_publicly_cacheable(): void
    {
        $this->seed(DatabaseSeeder::class);
        $this->app['env'] = 'production';
        config(['app.url' => 'http://localhost']);

        $cacheControl = $this->get('/merge-pdf')->assertOk()->headers->get('Cache-Control');
        $this->assertStringContainsString('public', $cacheControl);
        $this->assertStringContainsString('s-maxage=86400', $cacheControl);

        // Errors are never cached at the edge.
        $this->assertStringNotContainsString('s-maxage', (string) $this->get('/does-not-exist')->headers->get('Cache-Control'));
    }

    public function test_pages_are_not_cached_outside_production(): void
    {
        $this->assertStringNotContainsString('s-maxage', (string) $this->get('/')->headers->get('Cache-Control'));
    }

    public function test_ads_txt_is_generated_from_the_publisher_id(): void
    {
        $this->get('/ads.txt')->assertNotFound();

        config(['ads.client_id' => 'ca-pub-1234567890123456']);

        $this->get('/ads.txt')
            ->assertOk()
            ->assertHeader('Content-Type', 'text/plain; charset=UTF-8')
            ->assertSeeText('google.com, pub-1234567890123456, DIRECT, f08c47fec0942fa0');
    }

    public function test_adsense_verification_meta_renders_even_with_ads_disabled(): void
    {
        $this->get('/')->assertDontSee('google-adsense-account', false);

        config(['ads.client_id' => 'ca-pub-1234567890123456', 'ads.enabled' => false]);

        $this->get('/')
            ->assertSee('<meta name="google-adsense-account" content="ca-pub-1234567890123456">', false)
            ->assertDontSee('adsbygoogle.js', false);
    }

    public function test_ga4_sets_consent_mode_defaults_before_config(): void
    {
        config(['analytics.enabled' => true, 'analytics.ga_id' => 'G-TEST123']);

        $html = $this->get('/')->getContent();

        $consent = strpos($html, "gtag('consent', 'default'");
        $configCall = strpos($html, "gtag('config'");
        $this->assertNotFalse($consent);
        $this->assertLessThan($configCall, $consent, 'Consent defaults must come before gtag config');
        $this->assertStringContainsString('"DE"', $html);
    }
}
