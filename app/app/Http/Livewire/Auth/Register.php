<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public string $name = '';

    public string $email = '';

    public string $password = '';

    public string $passwordConfirmation = '';

    public function register(): RedirectResponse
    {
        $this->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8', 'same:passwordConfirmation'],
        ]);

        $user = User::query()->create([
            'email' => $this->email,
            'name' => $this->name,
            'password' => Hash::make($this->password),
        ]);

        /** @var User $user */
        event(new Registered($user));

        Auth::login($user, true);

        return redirect()->intended(route('home'));
    }

    public function render()
    {
        return view('livewire.auth.register')->extends('layouts.auth');
    }
}
