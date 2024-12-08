<?php

namespace App\Livewire\Page;

use App\Livewire\Concerns\InteractsWithFeed;
use App\Livewire\Layouts\Page;
use App\Models\Post;
use Livewire\Attributes\Url;
use Livewire\Component;

class Discussion extends Page
{
    use InteractsWithFeed;

    public ?string $title = 'Discussion';

    public function render()
    {
        return view('livewire.page.discussion');
    }

    public function getPosts()
    {
        return $this->post->replies()->withCount('replies')->paginate();
    }
}
