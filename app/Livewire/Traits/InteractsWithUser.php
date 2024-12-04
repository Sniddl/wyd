<?php

namespace App\Livewire\Traits;

use Illuminate\Support\Facades\Auth;

trait InteractsWithUser
{

    public function bootInteractsWithUser()
    {
        $this->listeners['authenticated'] = '$refresh';
        $this->listeners['unauthenticated'] = '$refresh';
    }

    public function logout()
    {
        Auth::logout();
        $this->dispatch('unauthenticated');
    }
}
