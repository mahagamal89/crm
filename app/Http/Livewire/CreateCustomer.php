<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class CreateCustomer extends Component
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
     * Render the view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.create-customer')
            ->extends('layouts.app')
            ->section('body');
    }

    /**
     * Create a new Customer.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createCustomer()
    {
        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|email|unique:users',
        ]);

        $customer = Customer::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
        ]);

        if (!(auth()->user()->isAdmin)) {
            $customer->user()->associate(auth()->user());
            $customer->save();
        }

        return redirect()->route('admin.customers.index');

    }
}
