<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    /**
     * @var string
     */
    public $email = '';

    /**
     * @var string
     */
    public $password = '';

    /**
     * Render the view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.login');
    }

    /**
     * Login the user.
     *
     * @return void
     */
    public function login()
    {
        $credentials = $this->validate([
            'email' => 'required|string|max:255|email',
            'password' => 'required|string|max:255',
        ]);

        if (Auth::attempt($credentials)) {
            return auth()->user()?->isAdmin ? redirect()->route('admin') : redirect()->route('admin.customers.index');
        } else {
            session()->flash('loginErrorMessage', 'Invalid email or password. Please try again.');

            return redirect()->back();
        }

    }
}