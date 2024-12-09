<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class FeedTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_chain(): void
    {
        $post = Post::query()
            ->with(["post" => fn($q) => $q->with("post")])
            ->find(6);

        $result = collect([$post]);
        while ($post != null) {
            if ($post->post) {
                $result->prepend($post->post);
            }
            $post = $post->post;
        }

        dd($result->pluck('bait'));
    }

    public function test_chain_1()
    {
        $query = "
    WITH RECURSIVE parent_chain AS (
        SELECT * FROM posts WHERE id = ?
        UNION ALL
        SELECT p.*
        FROM posts p
        INNER JOIN parent_chain pc ON p.id = pc.post_id
    )
    SELECT * FROM parent_chain
    ORDER BY depth ASC
";

        $posts = DB::select($query, [6]);
        dd($posts);
    }

    public function test_chain_2()
    {
        $query = "
        SELECT id FROM posts WHERE id = ?
        UNION ALL
        SELECT p.id
        FROM posts p
        INNER JOIN parent_chain pc ON p.id = pc.post_id
        ";

        $query = DB::table('posts')
            ->where('id', 6)
            ->unionAll(
                DB::table('posts as p')
                    ->select('p.*')
                    ->join('parent_chain as pc', 'p.id', '=', 'pc.post_id')
            );

        $result = DB::table('parent_chain')
            ->withRecursiveExpression('parent_chain', $query)
            ->orderBy('depth', 'asc')
            ->get();

        dd($result);
    }
}
