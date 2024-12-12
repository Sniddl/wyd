<?php

namespace App\Livewire\Page;

use App\Livewire\Concerns\InteractsWithFeed;
use App\Livewire\Concerns\InteractsWithGuild;
use App\Livewire\Concerns\InteractsWithGuilds;
use App\Livewire\Layouts\Page;
use App\Models\Guild;
use App\Models\Post;
use App\Models\User;
use Exception;
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
        try {
            return Post::search($this->search)->get();
        } catch (Exception $error) {
            return collect();
        }
    }

    public function getGuilds()
    {
        try {
            return Guild::search($this->search)->get();
        } catch (Exception $error) {
            return collect();
        }
    }

    public function getUsers()
    {
        try {
            return User::search($this->search)->get();
        } catch (Exception $error) {
            return collect();
        }
    }
}
