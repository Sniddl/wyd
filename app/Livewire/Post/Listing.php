<?php

namespace App\Livewire\Post;

use Livewire\Component;

class Listing extends Component
{
    public function render()
    {
        return view('livewire.post.listing', [
            'posts' => range(1, 10)
        ]);
    }
}
