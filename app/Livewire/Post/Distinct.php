<?php

namespace App\Livewire\Post;

use Livewire\Component;

class Distinct extends Component
{

    public ?string $replyTo = null;

    public function render()
    {
        return view('livewire.post.distinct');
    }
}
