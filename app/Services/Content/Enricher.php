<?php

namespace App\Services\Content;

use App\Models\Hashtag;
use App\Models\Notification;
use App\Models\Post;
use App\Services\Content\Parser;

class Enricher
{
    public function __construct(public bool $db = true) {}

    public function enrich(Post $post, string $content): string
    {
        $parser = new Parser();
        $ast = $parser->parse($content);



        $grouping = collect($ast)->groupBy('type');

        foreach ($grouping as $name => $data) {
            if (method_exists($this, $name)) {
                call_user_func([$this, $name], $post, $data);
            }
        }

        return collect($ast)->pluck('enriched')->join(' ');
    }

    public function hashtag(Post $post,  $group): void
    {
        if ($this->db) {
            foreach ($group as $data) {
                $hashtag = Hashtag::firstOrCreate([
                    'name' => data_get($data, 'hashtag')
                ]);

                $post->hashtags()->attach($hashtag);
            }
        }
    }

    public function mention(Post $post, $group): void
    {
        if ($this->db) {
            $groups = collect($group)->groupBy('user');
            foreach ($groups as $userId => $group) {
                Notification::create([
                    'user_id' => $userId,
                    'post_id' => $post->id,
                    'creator_id' => $post->user_id,
                    'type' => 'mention',
                ]);
            }
        }
    }
}
