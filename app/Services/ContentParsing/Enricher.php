<?php

namespace App\Services\ContentParsing;

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

        $pipeline = [
            fn($post, $type, $node) => $this->plaintext($post, $type, $node),
            fn($post, $type, $node) => $this->hashtag($post, $type, $node),
            fn($post, $type, $node) => $this->mention($post, $type, $node),
        ];

        $text = [];

        foreach ($ast as $node) {
            foreach ($pipeline as $method) {
                $type = data_get($node, 'type');
                if ($result = $method($post, $type, $node)) {
                    $text[] = data_get($result, 'enriched');
                    break;
                }
            }
        }

        return implode(' ', $text);
    }

    public function hashtag(Post $post, string $type, array $data): ?array
    {
        if ($type === 'hashtag') {
            if ($this->db) {
                $hashtag = Hashtag::firstOrCreate([
                    'name' => data_get($data, 'hashtag')
                ]);

                $post->hashtags()->attach($hashtag);
            }
            return $data;
        }
        return null;
    }

    public function mention(Post $post, string $type, array $data): ?array
    {
        if ($type === 'mention') {
            if ($this->db) {
                Notification::create([
                    'user_id' => data_get($data, 'user'),
                    'post_id' => $post->id,
                    'creator_id' => $post->user_id,
                    'type' => $type,
                ]);
            }
            return $data;
        }
        return null;
    }

    public function plaintext(Post $post, string $type, array $data): ?array
    {
        return $type === 'plaintext' ? $data : null;
    }
}
