<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Str;

class UserObserver
{
    public function created(User $user)
    {
        $user->inviteCodes()->create([
            'code' => Str::upper('WYD-' . Str::random(4) . '-' . Str::random(5))
        ]);
    }
}
