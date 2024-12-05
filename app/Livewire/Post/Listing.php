<?php

namespace App\Livewire\Post;

use App\Models\Post;
use Livewire\Component;

class Listing extends Component
{

    public array $types = ['void'];

    protected $listeners = [
        'shout' => '$refresh'
    ];

    public function render()
    {
        $posts = Post::latest()->whereIn('model_type', $this->types)->paginate();
        return view('livewire.post.listing', [
            'posts' => $posts
        ]);
    }
}
