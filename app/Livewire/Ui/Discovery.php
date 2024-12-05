<?php

namespace App\Livewire\Ui;

use App\Livewire\Traits\InteractsWithUser;
use Livewire\Component;

class Discovery extends Component
{
    use InteractsWithUser;

    public function render()
    {
        return view('livewire.ui.discovery');
    }
}
