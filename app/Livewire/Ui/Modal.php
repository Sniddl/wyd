<?php

namespace App\Livewire\Ui;

use Livewire\Attributes\On;
use Livewire\Component;

class Modal extends Component
{

    public ?string $modalComponent = null;

    protected $listeners = [
        'close' => '$refresh'
    ];

    public function render()
    {
        if (session()->has('modal')) {
            $this->modalComponent = session()->get('modal');
        }
        return view('livewire.ui.modal');
    }

    #[On('open')]
    public function pageModal($modal)
    {
        $this->modalComponent = $modal;
    }

    #[On('close')]
    public function closeModal()
    {
        $this->modalComponent = null;
    }
}
