<?php

namespace App\Livewire\Page\Auth;

use App\Livewire\Layouts\Page;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Livewire\Component;

class Invite extends Page
{
    public ?string $link = null;

    public function render()
    {
        return view('livewire.page.auth.invite');
    }

    public function mount()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $code = $user->inviteCodes()->first()->code;
        $this->link = URL::signedRoute('register', ['invite' => $code]);
    }
}
