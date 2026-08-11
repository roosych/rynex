<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SeoCanonicalHostTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // The middleware and the canonical/OG tags both read config('app.url')
        // dynamically per-request, so this is enough to simulate production.
        config(['app.url' => 'https://rynexfix.com']);
    }

    public function test_www_host_redirects_to_non_www_with_301_preserving_path_and_query(): void
    {
        $response = $this->get('http://www.rynexfix.com/services/vent-hood-repair?test=1');

        $response->assertStatus(301);
        $response->assertRedirect('https://rynexfix.com/services/vent-hood-repair?test=1');
    }

    public function test_non_www_host_is_served_directly_without_redirect(): void
    {
        $response = $this->get('https://rynexfix.com/');

        $response->assertStatus(200);
    }

    public function test_canonical_tag_has_no_www_and_matches_the_request_path(): void
    {
        $response = $this->get('https://rynexfix.com/');

        $response->assertOk();
        $response->assertSee('<link rel="canonical" href="https://rynexfix.com/">', false);
        $response->assertDontSee('www.rynexfix.com', false);
    }

    public function test_favicon_link_is_not_duplicated(): void
    {
        $html = $this->get('https://rynexfix.com/')->getContent();

        $this->assertSame(1, substr_count($html, '<link rel="icon"'));
        $this->assertStringNotContainsString('shortcut icon', $html);
    }
}
