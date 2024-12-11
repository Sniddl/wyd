<?php

namespace App\Livewire\Page;

use App\Livewire\Concerns\InteractsWithGuild;
use App\Livewire\Concerns\InteractsWithGuilds;
use App\Livewire\Layouts\Page;
use App\Models\Guild;

class Explore extends Page
{
    use InteractsWithGuilds;

    public function render()
    {
        return view('livewire.page.explore');
    }



    public function getBack()
    {
        return route('home');
    }
}
