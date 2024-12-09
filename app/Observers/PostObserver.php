<?php

namespace App\Observers;

use App\Models\Post;
use App\Services\Content\Enricher;

class PostObserver
{
    public function created(Post $post)
    {
        $post->enrich(db: true);
    }
}
