<?php

namespace App\Livewire\Traits;

use App\Livewire\Ui\Modal;

trait InteractsWithModal
{
    public function pageModal($modal)
    {
        $this->dispatch('open', ...compact('modal'))->to(Modal::class);
    }

    public function closeModal()
    {
        $this->dispatch('close')->to(Modal::class);
    }
}
