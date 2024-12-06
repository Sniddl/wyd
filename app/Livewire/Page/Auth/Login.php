<?php

namespace App\Livewire\Page\Auth;

use App\Livewire\Forms\Auth\LoginForm;
use App\Livewire\Layouts\Page;
use App\Livewire\Traits\InteractsWithModal;
use App\Models\User;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\On;

class Login extends Page
{
    public LoginForm $form;

    public function render()
    {
        return view('livewire.page.auth.login');
    }

    public function login()
    {
        $this->ensureIsNotRateLimited();

        $user = User::where('email', $this->form->identifier)
            ->orWhere('username', $this->form->identifier)
            ->first();

        if (!Auth::attempt(['email' => $user?->email, 'password' => $this->form->password], $this->form->remember)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'form.identifier' => trans('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());

        $this->dispatch('modal:close');
        $this->dispatch('authenticated');
    }

    /**
     * Ensure the authentication request is not rate limited.
     */
    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'form.identifier' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the authentication rate limiting throttle key.
     */
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->form->identifier) . '|' . request()->ip());
    }
}
