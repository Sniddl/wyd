<?php

namespace App\Livewire\Forms;

use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;
use Livewire\Form;

class RegisterForm extends Form
{
    #[Url()]
    public string $invite = '';
    public string $name = '';
    public string $username = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public string $turnstile = '';

    protected function rules()
    {
        return [
            'invite' => ['required', 'string', 'exists:invite_codes,code'],
            'name' => ['required', 'string'],
            'username' => ['required', 'string', 'unique:users,username', 'alpha_dash:ascii'],
            'email' => ['required', 'string', 'unique:users,email'],
            'password' => ['required', 'string', 'confirmed', Password::defaults()],
            'turnstile' => ['required', Rule::turnstile()],
        ];
    }
}
