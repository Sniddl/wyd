<?php

namespace App\Livewire\Auth;

use App\Livewire\Traits\InteractsWithModal;
use Livewire\Component;

class Register extends Component
{
    use InteractsWithModal;

    public function render()
    {
        return view('livewire.auth.register');
    }
}
