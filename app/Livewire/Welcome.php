<?php

namespace App\Livewire;

use App\Livewire\Traits\InteractsWithModal;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Livewire\Component;
use Illuminate\Foundation\Application;

class Welcome extends Component
{
    use InteractsWithModal;

    public function render()
    {
        return view("livewire.welcome");
    }
}
