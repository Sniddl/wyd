<?php

namespace App\Livewire\Ui;

use App\Livewire\Auth\Login;
use App\Livewire\Traits\InteractsWithModal;
use App\Livewire\Traits\InteractsWithUser;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class StatusBar extends Component
{
    use InteractsWithModal;
    use InteractsWithUser;

    public string $title = "Home";

    public function render()
    {
        return view('livewire.ui.status-bar');
    }
}
