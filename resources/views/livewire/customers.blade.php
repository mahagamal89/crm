<div>
    @include('components.nav')
    <div class="px-16 py-4">
        <div>
            <h1 class="text-4xl bold px-7">
                Customers
            </h1>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-5">
            <div class="block p-6 rounded-lg bg-white max-w-3xl">
                <div class="grid grid-cols-2 gap-4">
                    <div class="form-group mb-6">
                        <a href="{{ route('admin.customers.create') }}" >
                            <button wire:click="" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Create a new Customer
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            @if (count($assignedCustomers) > 0)
                <div class="flex flex-col">
                    <div class="py-2 inline-block min-w-full px-5">
                        <div class="mb-3">
                            Assigned Customers
                        </div>
                        <div class="overflow-hidden w-full">
                            <table class="min-w-full border">
                                <thead class="bg-gray-400 border">
                                    <tr>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                            Name
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                            Email
                                        </th>
                                        @if (auth()->user()->isAdmin)
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                                Assigned to
                                            </th>
                                        @endif
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                            Current Action
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                            Current action result
                                        </th>
                                        @if (!auth()->user()->isAdmin)
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                                Change or add new action
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                                Change or add new action result
                                            </th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($assignedCustomers as $assignedCustomer)
                                        <tr class="{{ $loop->even ? 'bg-white' : 'bg-gray-100' }} border-b">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-center">
                                                {{ $assignedCustomer->name }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">
                                                {{ $assignedCustomer->email }}
                                            </td>
                                            @if (auth()->user()->isAdmin)
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">
                                                    {{ $assignedCustomer->user->name }}
                                                </td>
                                            @endif
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">
                                                {{ $assignedCustomer->action ?: 'No Action'}}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">
                                                {{ $assignedCustomer->note ?: 'No result for this action'}}
                                            </td>
                                            @if (!auth()->user()->isAdmin)
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">
                                                    <select wire:model="selectedAction.{{ $assignedCustomer->id  }}">
                                                        <option selected value="">
                                                            Select an action
                                                        </option>
                                                        <option selected value="call">
                                                            Call
                                                        </option>
                                                        <option selected value="visit">
                                                            Visit
                                                        </option>
                                                        <option selected value="followUp">
                                                            Follow Up
                                                        </option>
                                                    </select>
                                                    <button wire:click="addAction('{{ $assignedCustomer->id }}')" class="ml-5 inline-flex justify-center px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                        Add
                                                    </button>
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">
                                                    <input wire:model="note.{{ $assignedCustomer->id }}" type="text" class="border">
                                                    <button wire:click="addNote('{{ $assignedCustomer->id }}')" class="ml-5 inline-flex justify-center  px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                        Add
                                                    </button>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif

            @if (count($nonAssignedCustomers) > 0 && auth()->user()->isAdmin)
                <div class="flex flex-col">
                    <div class="py-2 inline-block min-w-full px-5">
                        <div class="mb-3">
                            Non-Assigned Customers
                        </div>
                        <div class="overflow-hidden w-8/12">
                            <table class="min-w-full border">
                                <thead class="bg-gray-400 border">
                                    <tr>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                            Name
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                            Email
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                            Assign to employee
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($nonAssignedCustomers as $nonAssignedCustomer)
                                        <tr class="{{ $loop->even ? 'bg-white' : 'bg-gray-100' }} border-b">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-center" wire:key="{{ $nonAssignedCustomer->id }}">
                                                {{ $nonAssignedCustomer->name }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">
                                                {{ $nonAssignedCustomer->email }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">
                                                <select wire:model="selectedEmployee.{{ $nonAssignedCustomer->id }}">
                                                    <option selected value="">
                                                        Select an employee
                                                    </option>
                                                    @foreach ($employees as $employee)
                                                        <option value="{{ $employee->id }}">
                                                            {{ $employee->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <button wire:click="assign('{{ $nonAssignedCustomer->id }}')" class="ml-5 inline-flex justify-center py-1 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                    Assign
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
