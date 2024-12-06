<?php

namespace App\Livewire\Concerns;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

trait InteractsWithInvite
{
    public ?string $inviteLink = null;

    public function mountInteractsWithInvite()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        if ($user) {
            $code = $user->inviteCodes()->first()->code;
            $this->inviteLink = URL::signedRoute('register', ['invite' => $code]);
        }
    }
}
