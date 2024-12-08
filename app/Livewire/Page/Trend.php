<?php

namespace App\Livewire\Page;

use App\Livewire\Concerns\InteractsWithFeed;
use App\Livewire\Layouts\Page;
use App\Models\Hashtag;
use Livewire\Attributes\Url;
use Livewire\Component;

class Trend extends Page
{
    use InteractsWithFeed;

    #[Url()]
    public Hashtag $hashtag;

    public function render()
    {
        return view('livewire.page.hashtag');
    }

    public function getPosts()
    {
        return $this->hashtag->posts()->latest()->paginate();
    }
}
