<?php

namespace App\Livewire\Concerns;

use App\Models\Guild;
use Illuminate\Support\Facades\Auth;

trait InteractsWithGuilds
{
    public $guilds;

    public function getGuildMemberships()
    {
        if (Auth::check()) {
            /** @var \App\Models\User $user */
            $user = Auth::user();

            return collect($user ? $user->guilds()->get() : null);
        }

        return $this->getNewestGuilds(5);
    }

    public function getNewestGuilds($take = 3)
    {
        return Guild::latest()->take($take)->get();
    }

    public function getPopularGuilds($take = 3)
    {
        return $this->getNewestGuilds($take);
    }
}
