<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class ChannelCreate extends Form
{
    public array $channels;

    protected function rules()
    {
        return [
            'channels' => ['array'],
            'channels.*.name' => ['required', 'string', 'min:1'],
            'channels.*.order' => ['required', 'numeric', 'min:0'],
            'channels.*.threads' => ['array'],
            'channels.*.threads.*.name' => ['required', 'string', 'min:1'],
            'channels.*.threads.*.order' => ['required', 'numeric', 'min:0'],
        ];
    }
}
