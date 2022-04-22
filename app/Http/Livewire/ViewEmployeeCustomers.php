<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class ViewEmployeeCustomers extends Component
{
    public $employee;

    public function mount($employee)
    {
        $this->employee = $employee;
    }

    public function render()
    {
        return view('livewire.view-employee-customers', ['customers' => $this->getAllRelatedCustomers()])
            ->extends('layouts.app')
            ->section('body');
    }

    public function getAllRelatedCustomers()
    {
        return User::where('isAdmin', 0)->where('id', $this->employee)->first()->customers()->get();
    }
}
