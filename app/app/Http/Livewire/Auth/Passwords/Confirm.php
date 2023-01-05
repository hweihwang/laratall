<?php

namespace App\Http\Livewire\Auth\Passwords;

use Illuminate\Http\RedirectResponse;
use Livewire\Component;

class Confirm extends Component
{
    public string $password = '';

    public function confirm(): RedirectResponse
    {
        $this->validate([
            'password' => 'required|current_password',
        ]);

        session()->put('auth.password_confirmed_at', time());

        return redirect()->intended(route('home'));
    }

    public function render()
    {
        return view('livewire.auth.passwords.confirm')->extends('layouts.auth');
    }
}
