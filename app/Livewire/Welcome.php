<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Livewire\Component;
use Illuminate\Foundation\Application;

class Welcome extends Component
{
    public function render()
    {
        return view("livewire.welcome");
    }
}
