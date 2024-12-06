<?php

namespace App\Livewire\Page;

use App\Livewire\Concerns\InteractsWithFeed;
use App\Livewire\Concerns\InteractsWithGuild;
use App\Livewire\Concerns\InteractsWithThread;
use App\Livewire\Layouts\Page;
use App\Models\Guild;
use App\Models\Post;

class Channel extends Page
{
    use InteractsWithFeed;

    public function getPosts()
    {
        return Post::latest()
            ->where('guild_id', $this->guild->id)
            ->when(
                $this->channel && $this->thread,
                fn($query) => $query->where('channel_id', $this->thread->id),
            )->when(
                $this->channel && !$this->thread,
                fn($query) => $query->where('channel_id', $this->channel->id),
            )
            ->paginate();
    }

    public function getTitle()
    {
        return $this->thread?->name ?? $this->channel?->name ?? $this->guild?->name;
    }

    public function render()
    {
        return view('livewire.page.channel');
    }
}
