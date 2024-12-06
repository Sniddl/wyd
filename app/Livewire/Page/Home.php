<?php

namespace App\Livewire\Page;

use App\Livewire\Concerns\InteractsWithFeed;
use App\Livewire\Concerns\InteractsWithPrompt;
use App\Livewire\Layouts\Page;
use App\Models\Post;

class Home extends Page
{
    use InteractsWithFeed;

    public function getPosts()
    {
        return Post::latest()->paginate();
    }

    public function render()
    {
        return view("livewire.page.home");
    }
}
