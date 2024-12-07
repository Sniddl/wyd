<?php

namespace App\Livewire\Page\Form;

use Livewire\Component;

class GuildCreate extends Component
{

    public int $step = 1;

    public function render()
    {
        return view('livewire.page.form.guild-create');
    }

    public function back()
    {
        $this->step -= 1;
    }

    public function checkName()
    {
        $this->step = 2;
    }
}
