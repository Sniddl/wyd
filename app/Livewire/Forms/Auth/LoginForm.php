<?php

namespace App\Livewire\Forms\Auth;

use Livewire\Attributes\Validate;
use Livewire\Form;

class LoginForm extends Form
{
    public string $identifier = '';
    public string $password = '';
    public bool $remember = false;

    protected function rules()
    {
        return [
            'identifier' => ['required', 'string'],
            'password' => ['required', 'string']
        ];
    }
}
