<?php

namespace App\Livewire\Page;

use App\Livewire\Concerns\InteractsWithFeed;
use App\Livewire\Layouts\Page;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class Notifications extends Page
{
    use InteractsWithFeed;

    public function render()
    {
        return view('livewire.page.notifications');
    }

    public function getNotifications()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $user->notificationCount = 0;
        return $user->notifications()
            ->selectRaw('post_id, creator_id,JSON_ARRAYAGG(message) as messages, MAX(type) as type, MAX(created_at) as created_at')
            ->latest()
            ->with(['post.guild', 'creator'])
            ->groupBy('post_id', 'creator_id')
            ->paginate();
    }
}
