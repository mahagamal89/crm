<div>
    <div>
        <h1 class="text-4xl bold px-7">
            Customers
        </h1>
    </div>
    @if (count($customers) > 0)
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                                <tr class="{{ $loop->even ? 'bg-white' : 'bg-gray-100' }} border-b">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-center">
                                        {{ $customer->name }}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">
                                        {{ $customer->email }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        <div class="ml-5 text-lg">
            There is no customer related to this employee.
        </div>
    @endif

</div>
