<?php

namespace App\Livewire\Page\Profile;

use App\Livewire\Layouts\Profile;
use App\Models\User;
use Livewire\Attributes\Url;

class Posts extends Profile
{

    public function render()
    {
        return view('livewire.page.profile.posts');
    }

    public function getPosts()
    {
        return $this->user->posts()->latest()->whereNull('post_id')->paginate();
    }
}
