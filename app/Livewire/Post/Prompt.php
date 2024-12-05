<?php

namespace App\Livewire\Post;

use App\Livewire\Forms\ShoutForm;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Prompt extends Component
{
    public ShoutForm $form;

    public function render()
    {
        return view('livewire.post.prompt');
    }

    public function shout()
    {
        $this->form->validate();
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $user->posts()->create([
            'bait' => $this->form->bait
        ]);

        $this->form->reset();
        $this->dispatch('shout');
    }
}
