<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class ShoutForm extends Form
{
    public ?string $bait = null;

    protected function rules()
    {
        return [
            'bait' => ['required', 'string', 'min:2'],
        ];
    }

    protected function getMessages()
    {
        return [
            'bait' => 'Your posts must be at least 10 letters long.'
        ];
    }
}
