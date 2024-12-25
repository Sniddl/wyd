<?php

namespace App\Observers;

use App\Models\Notification;
use App\Models\Post;
use App\Services\Content\Enricher;
use Illuminate\Support\Facades\Auth;

class PostObserver
{
    public function retrieved(Post $post)
    {
        // $post->views += 1;
        // $post->save();
    }

    public function creating(Post $post)
    {
        $slugLength = 89;
        $randomness = 11;
        $prefix = str()->slug(substr($post->content, 0, $slugLength));
        $post->identifier = str()->random($randomness);
        $post->slug = str($prefix . ' ' . $post->identifier)->slug();
        $post->bait = substr($post->content, 0, 254);
    }

    public function created(Post $post)
    {
        if ($post->post_id) {
            $post->loadMissing('post');
            if (Auth::user()->id != $post->post->user_id) {
                Notification::create([
                    'user_id' => $post->post->user_id,
                    'post_id' => $post->id,
                    'creator_id' => $post->user_id,
                    'type' => 'reply',
                ]);
            }
        }

        $post->enrich(db: true);
    }
}
