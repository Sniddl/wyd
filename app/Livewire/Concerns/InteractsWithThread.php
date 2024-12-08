<?php

namespace App\Livewire\Concerns;

use App\Models\Thread;
use Livewire\Attributes\Url;

trait InteractsWithThread
{
    use InteractsWithGuild;
    use InteractsWithChannel;
    use InteractsWithDiscussion;

    #[Url()]
    public ?Thread $thread = null;
}
