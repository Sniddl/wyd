<?php

namespace App\Livewire\Page;

use App\Livewire\Layouts\Page;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class Notifications extends Page
{
    public function render()
    {
        return view('livewire.page.notifications');
    }

    public function getNotifications()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $user->notificationCount = 0;
        return $user->notifications()->latest()->with(['post', 'creator'])->paginate();
    }
}
