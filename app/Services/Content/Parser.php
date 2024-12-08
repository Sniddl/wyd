<?php

namespace App\Services\Content;

use App\Models\User;
use Illuminate\Support\Str;

class Parser
{
    public function enrich(string $string): string
    {
        $content = $this->parse($string);
        return $string;
    }

    public function parse(string $string): array
    {
        $words = explode(' ', $string);
        $pipeline = [
            fn($word) => $this->hashtag($word),
            fn($word) => $this->mention($word),
        ];
        $data = [];
        foreach ($words as $index => $word) {
            $data[$index] = [
                'type' => 'plaintext',
                'original' => $word,
                'enriched' => $word,
            ];
            foreach ($pipeline as $method) {
                $result = $method($word);
                if ($result) {
                    $data[$index] = $result;
                    break;
                }
            }
        }
        return $data;
    }

    public function hashtag(string $word): ?array
    {
        if (str($word)->startsWith('#')) {
            if ($hashtag = str($word)->match('/[A-Za-z0-9]+/')) {
                $href = route('hashtag', compact('hashtag'));
                $after = str($word)->after($hashtag);
                return [
                    'type' => 'hashtag',
                    'hashtag' => $hashtag,
                    'original' => $word,
                    'enriched' => trim(<<<HTML
                        <a class="hashtag" href="$href">#{$hashtag}</a>{$after}
                    HTML),
                ];
            }
        }
        return null;
    }

    public function mention(string $word): ?array
    {
        if (str($word)->startsWith('@')) {
            if ($username = str($word)->match('/[A-Za-z0-9_\-]+/')) {
                $user = User::firstWhere('username', $username);
                if ($user) {
                    $href = route('profile', compact('user'));
                    return [
                        'type' => 'mention',
                        'original' => $word,
                        'enriched' => trim(<<<HTML
                            <a class="mention" href="$href">$word</a>
                        HTML),
                        'user' => $user->id
                    ];
                }
            }
        }
        return null;
    }
}
