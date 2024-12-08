<?php

namespace App\Livewire\Concerns;

use Illuminate\Support\Facades\Auth;

trait InteractsWithGuilds
{
    public $guilds;

    public function getGuildMemberships()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        return collect($user ? $user->guilds()->get() : null);
    }
}
