<div>
    <div class="min-h-screen flex flex-col items-center justify-center bg-gray-100">
        <div class="flex flex-col bg-white shadow-md px-4 sm:px-6 md:px-8 lg:px-10 py-8 rounded-3xl w-50 max-w-md">
            <div class="font-medium self-center text-xl sm:text-3xl text-gray-800">
                Create a new customer
            </div>

            <div class="mt-10">
                <form wire:submit.prevent="createCustomer">
                    <div class="flex flex-col mb-5 max-h-10">
                        <div class="relative">
                            <div class="inline-flex items-center justify-center absolute left-0 top-0 h-full w-10 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                                </svg>
                            </div>

                            <input id="name" type="text" wire:model="name" class="text-sm placeholder-gray-500 pl-10 pr-4 rounded-2xl border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" placeholder="Enter name"/>
                        </div>
                        <span class="error text-xs text-red-500">
                            @error('name') {{ $message }} @enderror
                        </span>
                    </div>

                    <div class="flex flex-col mb-5 max-h-10">
                        <div class="relative">
                            <div class="inline-flex items-center justify-center absolute left-0 top-0 h-full w-10 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                </svg>
                            </div>

                            <input id="email" type="email" wire:model="email" class="text-sm placeholder-gray-500 pl-10 pr-4 rounded-2xl border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" placeholder="Enter email"/>
                        </div>
                        <span class="error text-xs text-red-500">
                            @error('email') {{ $message }} @enderror
                        </span>
                    </div>

                    <div class="flex w-full">
                        <button type="submit" class="flex mt-2 items-center justify-center focus:outline-none text-white text-sm sm:text-base bg-blue-500 hover:bg-blue-600 rounded-2xl py-2 w-full transition duration-150 ease-in">
                            <span class="mr-2 uppercase">Create</span>
                            <span>
                                <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" >
                                    <path d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>