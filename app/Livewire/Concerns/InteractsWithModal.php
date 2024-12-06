<?php

namespace App\Livewire\Concerns;

use App\Livewire\Ui\Modal;
use Livewire\Attributes\On;

trait InteractsWithModal
{
    public ?string $modalComponent = null;

    public function bootInteractsWithModal()
    {
        $this->listeners['modal:close'] = '$refresh';

        if (session()->has('modal')) {
            $this->modalComponent = session()->get('modal');
        }
    }

    #[On('modal:open')]
    public function openModal($modal)
    {
        $this->modalComponent = $modal;
    }

    #[On('modal:close')]
    public function closeModal()
    {
        $this->modalComponent = null;
    }
}
