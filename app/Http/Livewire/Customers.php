<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Customer;

class Customers extends Component
{
    /**
     * @var string
     */
    public $selectedEmployee;

    /**
     * @var string
     */
    public $selectedAction;

    /**
     * @var string
     */
    public $note;

    /**
     * Render the view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.customers', [
            'assignedCustomers' => $this->getAssignedCustomers(),
            'nonAssignedCustomers' => $this->getNonAssignedCustomers(),
            'employees' => $this->getAllEmployees(),
        ])
            ->extends('layouts.app')
            ->section('body');
    }

    /**
     * Get all the assigned customers.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAssignedCustomers()
    {
        $customers = Customer::whereNotNull('user_id')->get();
        $relatedCustomers = auth()->user()->customers()->get();

        return auth()->user()->isAdmin ? $customers : $relatedCustomers;
    }
    /**
     * Get all the not assigned customers.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getNonAssignedCustomers()
    {
        return Customer::whereNull('user_id')->get();
    }

    /**
     * Get all the available employees.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllEmployees()
    {
        return User::where('isAdmin', 0)->get();
    }

    /**
     * Assign a new customer to the employee.
     *
     * @param  int  $nonAssignedCustomer
     *
     * @return void
     */
    public function assign($nonAssignedCustomer)
    {
        if (!empty($this->selectedEmployee[$nonAssignedCustomer])) {
            $customer = Customer::find($nonAssignedCustomer);
            $employee = User::find($this->selectedEmployee[$nonAssignedCustomer]);
            $customer->user()->associate($employee);

            $customer->save();
        }
    }

    /**
     * Add action to a customer.
     *
     * @param  int  $assignedCustomer
     *
     * @return void
     */
    public function addAction($assignedCustomer)
    {
        if (!empty($this->selectedAction)) {
            Customer::where('id', $assignedCustomer)->update(['action'=> $this->selectedAction[$assignedCustomer]]);
        }
    }

    /**
     * Add action results.
     *
     * @param  int  $assignedCustomer
     *
     * @return void
     */
    public function addNote($assignedCustomer)
    {
        $customer = Customer::find($assignedCustomer);
        if (!empty($customer->action)) {
            Customer::where('id', $assignedCustomer)->update(['note'=> $this->note[$assignedCustomer]]);
        }
    }
}
