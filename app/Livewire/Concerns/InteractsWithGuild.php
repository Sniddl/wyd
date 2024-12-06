<?php

namespace App\Livewire\Concerns;

use App\Models\Guild;
use Illuminate\Support\Facades\Route;
use Livewire\Attributes\Url;

trait InteractsWithGuild
{
    #[Url()]
    public ?Guild $guild = null;
}
