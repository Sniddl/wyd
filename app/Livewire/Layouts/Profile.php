<?php

namespace App\Livewire\Layouts;

use App\Livewire\Concerns\InteractsWithFeed;
use App\Models\User;
use Livewire\Attributes\Url;

abstract class Profile extends Page
{
    use InteractsWithFeed;
    #[Url()]
    public ?User $user = null;
}
