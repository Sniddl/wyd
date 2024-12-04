<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Livewire\Component;

class Invite extends Component
{
    public ?string $link = null;

    public function render()
    {
        return view('livewire.auth.invite');
    }

    public function mount()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $code = $user->inviteCodes()->first()->code;
        $this->link = URL::signedRoute('register', ['invite' => $code]);
    }
}
