<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Admin extends Component
{
    /**
     * Render the View.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.admin', ['employees' => $this->getAllEmployees()])
            ->extends('layouts.app')
            ->section('body');
    }

    /**
     * Get all the employees.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllEmployees()
    {
        return User::where('isAdmin', 0)->get();
    }
}
