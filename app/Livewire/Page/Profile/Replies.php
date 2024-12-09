<?php

namespace App\Livewire\Page\Profile;

use App\Livewire\Layouts\Profile;
use Livewire\Component;

class Replies extends Profile
{
    public function render()
    {
        return view('livewire.page.profile.replies');
    }

    public function getPosts()
    {
        return $this->user->posts()->latest()->whereNotNull('post_id')->paginate();
    }
}
