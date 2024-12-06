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

    public ?int $channelId = null;
    public ?int $guildId = null;

    public function render()
    {
        $posts = Post::latest()->when(
            $this->channelId,
            fn($query) => $query->where('channel_id', $this->channelId)
        )->when(
            $this->guildId,
            fn($query) => $query->where('guild_id', $this->guildId)
        )->paginate();

        return view('livewire.post.listing', [
            'posts' => $posts
        ]);
    }
}
