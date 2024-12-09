<?php

namespace Tests\Feature\Services\Content;

use App\Models\Post;
use App\Services\Content\Enricher;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EnricherTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     */
    public function test_enriches_hashtags_1(): void
    {
        Post::withoutEvents(function () {
            $enricher = new Enricher();
            $post = Post::create([
                'user_id' => 1,
                'bait' => 'hello world #wyd'
            ]);
            $result = $enricher->enrich($post, $post->bait);
            dump($result);
        });
    }

    public function test_enriches_mention_1(): void
    {
        Post::withoutEvents(function () {
            $enricher = new Enricher();
            $post = Post::create([
                'user_id' => 1,
                'bait' => 'hello @jinx_lol what are you doing'
            ]);
            $result = $enricher->enrich($post, $post->bait);
            dump($result);
        });
    }
}
