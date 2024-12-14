<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class GuildCreate extends Form
{
    public ?string $name = null;
    public ?string $url = null;
    public ?string $description = null;

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'min:1'],
            'url' => ['required', 'string', 'unique:guilds,identifier', 'alpha_dash:ascii'],
            'description' => ['nullable', 'string', 'max:240'],
        ];
    }

    protected function getMessages()
    {
        return [
            'channels.*.name' => 'The name field is required'
        ];
    }
}
