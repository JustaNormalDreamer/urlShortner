<?php

namespace Tests\Feature;

use App\Models\Url;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UrlTest extends TestCase
{
    use RefreshDatabase, DatabaseMigrations;

    /**
     * @test
     */
    public function test_it_is_able_to_create_a_new_short_url_from_a_large_url()
    {
        $this->withoutExceptionHandling();

        $this->postJson('/api/urls', $this->urlData())->assertStatus(201)->assertJson([
            'data' => [
                'attributes' => [
                    'id' => 1,
                    'name' => 'Test Url',
                    'url' => 'http://www.thetechlink.com'
                ]
            ]
        ]);

        $this->assertDatabaseHas('urls', [
            'id' => 1,
            'name' => 'Test Url',
            'url' => 'http://www.thetechlink.com'
        ]);
    }

    /**
     * @test
     */
    public function test_it_shows_the_url_detail_when_a_minified_url_is_given()
    {
        $url = Url::factory()->create();

        $this->getJson("/api/urls/{$url->minify}")->assertOk()->assertJson([
            'data' => [
                'attributes' => [
                    'id' => $url->id,
                    'name' => $url->name,
                    'url' => $url->url,
                    'minify' => $url->minify,
                    'redirected' => 0
                ]
            ]
        ]);

    }

    /**
     * @test
     */
    public function test_it_redirects_to_the_original_url_when_a_shortner_is_requested()
    {
        $url = Url::factory()->create();
        $this->get("/redirect/{$url->minify}")->assertRedirect($url->url);
    }

    private function urlData()
    {
        return [
            'name' => 'Test Url',
            'url' => 'http://www.thetechlink.com',
        ];
    }
}
