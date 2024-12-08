<?php

namespace App\Livewire\Concerns;

use App\Models\Post;
use Livewire\Attributes\Url;

trait InteractsWithDiscussion
{
    #[Url()]
    public ?Post $post = null;
}
