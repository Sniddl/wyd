<?php

namespace App\Livewire\Ui;

use App\Livewire\Traits\InteractsWithModal;
use App\Livewire\Traits\InteractsWithUser;
use App\Models\Guild;
use Livewire\Attributes\Url;
use Livewire\Component;

class Aside extends Component
{
    use InteractsWithModal;
    use InteractsWithUser;

    public bool $responsive = false;

    public ?string $guildId = null;

    public function render()
    {
        $guild = Guild::with('channels.threads')->firstWhere('identifier', $this->guildId);
        return view('livewire.ui.aside', compact('guild'));
    }
}
