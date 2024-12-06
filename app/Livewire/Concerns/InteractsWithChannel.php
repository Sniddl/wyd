<?php

namespace App\Livewire\Concerns;

use App\Models\Channel;
use Livewire\Attributes\Url;

trait InteractsWithChannel
{
    #[Url()]
    public ?Channel $channel = null;
}
