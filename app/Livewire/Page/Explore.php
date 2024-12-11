<?php

namespace App\Livewire\Page;

use App\Livewire\Concerns\InteractsWithFeed;
use App\Livewire\Concerns\InteractsWithGuild;
use App\Livewire\Concerns\InteractsWithGuilds;
use App\Livewire\Layouts\Page;
use App\Models\Guild;
use App\Models\Post;
use App\Models\User;
use Livewire\Attributes\Url;

class Explore extends Page
{
    use InteractsWithGuilds;
    use InteractsWithFeed;

    #[Url()]
    public ?string $search = null;

    public function render()
    {
        return view('livewire.page.explore');
    }



    public function getBack()
    {
        return route('home');
    }

    public function getPosts()
    {
        return Post::search($this->search)->get();
    }

    public function getGuilds()
    {
        return Guild::search($this->search)->get();
    }

    public function getUsers()
    {
        return User::search($this->search)->get();
    }
}
