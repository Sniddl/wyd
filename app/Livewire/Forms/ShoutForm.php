<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class ShoutForm extends Form
{
    public ?string $content = null;

    protected function rules()
    {
        return [
            'content' => ['required', 'string', 'min:10', 'max:1500'],
        ];
    }

    protected function getMessages()
    {
        return [
            'content' => 'Your post must be between 10 and 1500 characters.'
        ];
    }
}
