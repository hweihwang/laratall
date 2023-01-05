<?php

namespace App\Http\Livewire\Auth\Passwords;

use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Support\Facades\Password;
use Livewire\Component;

class Email extends Component
{
    public string $email;

    public string|null|bool $emailSentMessage = false;

    public function sendResetPasswordLink(): void
    {
        $this->validate([
            'email' => ['required', 'email'],
        ]);

        $response = $this->broker()->sendResetLink(['email' => $this->email]);

        if ($response == Password::RESET_LINK_SENT) {
            $this->emailSentMessage = trans($response);

            return;
        }

        $this->addError('email', trans($response));
    }

    public function broker(): PasswordBroker
    {
        return Password::broker();
    }

    public function render()
    {
        return view('livewire.auth.passwords.email')->extends('layouts.auth');
    }
}
