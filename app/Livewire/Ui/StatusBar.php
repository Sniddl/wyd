<?php

namespace App\Livewire\Ui;

use App\Livewire\Auth\Login;
use App\Livewire\Traits\InteractsWithModal;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class StatusBar extends Component
{
    use InteractsWithModal;

    public string $title = "Home";

    protected $listeners = [
        'authenticated' => '$refresh'
    ];

    public function render()
    {
        return view('livewire.ui.status-bar');
    }

    public function logout()
    {
        Auth::logout();
        $this->dispatch('unauthenticated');
    }
}
