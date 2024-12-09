<?php

namespace App\Livewire\Layouts;

use App\Models\User;
use Livewire\Attributes\Url;

abstract class Profile extends Page
{
    #[Url()]
    public ?User $user = null;
}
