<?php

namespace App\Observers;

use App\Models\Post;
use App\Services\ContentParsing\Enricher;

class PostObserver
{
    public function created(Post $post)
    {
        $post->enrich(db: true);
    }
}
