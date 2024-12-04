<?php

namespace App\Livewire\Ui;

use App\Livewire\Traits\InteractsWithModal;
use App\Livewire\Traits\InteractsWithUser;
use Livewire\Component;

class Aside extends Component
{
    use InteractsWithModal;
    use InteractsWithUser;

    public bool $responsive = false;

    public function render()
    {
        return view('livewire.ui.aside');
    }
}
