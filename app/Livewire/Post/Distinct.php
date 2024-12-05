<?php

namespace App\Livewire\Post;

use App\Models\Post;
use Livewire\Component;

class Distinct extends Component
{
    public int $id;
    public ?string $replyTo = null;

    public function render()
    {
        $post = Post::with('author')->findOrFail($this->id);
        return view('livewire.post.distinct', [
            'post' => $post
        ]);
    }
}
