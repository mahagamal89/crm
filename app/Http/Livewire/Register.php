<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{

    /**
     * @var string
     */
    public $name = '';

    /**
     * @var string
     */
    public $email = '';

    /**
     * @var string
     */
    public $password = '';

    /**
     * @var string
     */
    public $passwordConfirmation = '';

    /**
     * Render the view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.register');
    }

    /**
     * Register a new user.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register()
    {
        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|email|unique:users',
            'password' => 'required|string|max:255',
            'passwordConfirmation' => 'required|same:password',
        ]);

        unset($validatedData['passwordConfirmation']);

        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        return auth()->user()?->isAdmin ? redirect()->route('admin') : redirect()->route('admin.customers.index');
    }
}