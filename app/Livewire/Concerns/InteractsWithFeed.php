<?php

namespace App\Livewire\Concerns;

use App\Livewire\Forms\ShoutForm;
use Illuminate\Support\Facades\Auth;

trait InteractsWithFeed
{
    use InteractsWithThread;

    public ShoutForm $shoutForm;

    public function shout()
    {
        $this->shoutForm->validate();

        /** @var \App\Models\User $user */
        $user = Auth::user();

        $user->posts()->create([
            'bait' => $this->shoutForm->bait,
            'guild_id' => $this->guild?->id,
            'channel_id' => $this->thread?->id ?? $this->channel?->id
        ]);

        $this->shoutForm->reset();
        $this->dispatch('shout');
    }
}
