<div>
    @include('components.nav')
    <div class="px-16 py-4">
        <div>
            <h1 class="text-4xl bold px-7">
                Employees
            </h1>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-5">
            <div class="block p-6 rounded-lg bg-white max-w-3xl">
                <div class="grid grid-cols-2 gap-4">
                    <div class="form-group mb-6">
                        <a href="{{ route('register.index') }}" >
                            <button wire:click="" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Create a new employee
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            @if (count($employees) > 0)
                <div class="flex flex-col">
                    <div class="py-2 inline-block min-w-full px-5">
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
                                            Assigned Customers
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $employee)
                                        <tr class="{{ $loop->even ? 'bg-white' : 'bg-gray-100' }} border-b">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-center">
                                                {{ $employee->name }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">
                                                {{ $employee->email }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">
                                                <a href="{{ route('admin.employee.customers', $employee->id) }}">
                                                    <button class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                        View
                                                    </button>
                                                </a>
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
