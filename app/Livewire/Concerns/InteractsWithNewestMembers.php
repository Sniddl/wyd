<?php

namespace App\Livewire\Concerns;

use App\Models\User;

trait InteractsWithNewestMembers
{
    public function getNewestMembers()
    {
        return User::latest()->take(3)->get();
    }
}
