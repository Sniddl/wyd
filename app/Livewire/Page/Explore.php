<?php

namespace App\Livewire\Page;

use App\Livewire\Layouts\Page;
use App\Models\Guild;

class Explore extends Page
{

    public function render()
    {
        return view('livewire.page.explore');
    }

    public function getNewestGuilds()
    {
        return Guild::latest()->take(3)->get();
    }
}
