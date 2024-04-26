<x-app title="Create Client">
    <div class="p-4 sm:ml-64">

        <div class="border-2 border-gray-200 dashed rounded-lg dark:border-gray-700 mt-14">

            @if(session("update_success"))
                <div
                    class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                    role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                         fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">Success alert!</span> {{ session('update_success') }}
                    </div>
                </div>
            @endif
            @if(session("update_fail"))
                <div
                    class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                         fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">alert!</span> {{ session('update_fail') }}
                    </div>
                </div>
            @endif
            <form class="mx-auto p-2" method="POST" action="{{ route('clients.update',$client->id) }}">
                @csrf
                @method("PATCH")
                {{-- START FIRST_NAME --}}
                <div class="mb-5 p-2">
                    <div class="mb-5 p-2">
                        <label for="name"
                               class="block mb-2 text-sm font-medium {{ $errors->has('name') ? 'text-red-700 dark:text-red-500' : 'text-gray-900 dark:text-white' }}">
                            Name
                        </label>
                        <input type="text" id="name"
                               class="{{ $errors->has('name') ? 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700' : 'shadow-sm bg-gray-50 border border-gray-300 text-gray-900' }} text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                               name="name" value="{{ old('name', $client->name ) }}" />
                        @error('name')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                class="font-medium">Oops!</span> {{ $message }}</p>
                        @enderror
                    </div>

                </div>
                {{-- START COMPANY NAME --}}
                <div class="mb-5 p-2">
                    <div class="mb-5 p-2">
                        <label for="company_name"
                               class="block mb-2 text-sm font-medium {{ $errors->has('company_name') ? 'text-red-700 dark:text-red-500' : 'text-gray-900 dark:text-white' }}">
                            Company name
                        </label>
                        <input type="text" id="company_name"
                               class="{{ $errors->has('company_name') ? 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700' : 'shadow-sm bg-gray-50 border border-gray-300 text-gray-900' }} text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                               name="company_name" value="{{ old('company_name', $client->company_name ) }}" />
                        @error('company_name')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                class="font-medium">Oops!</span> {{ $message }}</p>
                        @enderror
                    </div>

                </div>
                {{-- END COMPANY NAME --}}
                {{-- START EMAIL --}}
                <div class="mb-5 p-2">
                    <div class="mb-5 p-2">
                        <label for="first_name"
                               class="block mb-2 text-sm font-medium {{ $errors->has('email') ? 'text-red-700 dark:text-red-500' : 'text-gray-900 dark:text-white' }}">
                            Email
                        </label>
                        <input type="email" id="email"
                               class="{{ $errors->has('email') ? 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700' : 'shadow-sm bg-gray-50 border border-gray-300 text-gray-900' }} text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                               name="email" value="{{ old('email', $client->email) }}" />
                        @error('email')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                class="font-medium">Oops!</span> {{ $message }}</p>
                        @enderror
                    </div>
                </div>
                {{-- END EMAIL --}}
                {{-- START ADDRESS --}}
                <div class="mb-5 p-2">
                    <div class="mb-5 p-2">
                        <label for="address"
                               class="block mb-2 text-sm font-medium {{ $errors->has('address') ? 'text-red-700 dark:text-red-500' : 'text-gray-900 dark:text-white' }}">
                            Address
                        </label>
                        <input type="text" id="address"
                               class="{{ $errors->has('address') ? 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700' : 'shadow-sm bg-gray-50 border border-gray-300 text-gray-900' }} text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                               name="address" value="{{ old('address', $client->address) }}" />
                        @error('address')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                class="font-medium">Oops!</span> {{ $message }}</p>
                        @enderror
                    </div>

                </div>
                {{--  END ADDRESS  --}}
                {{-- START PHONE NUMBER --}}
                <div class="mb-5 p-2">
                    <div class="mb-5 p-2">
                        <label for="phone_number"
                               class="block mb-2 text-sm font-medium {{ $errors->has('phone_number') ? 'text-red-700 dark:text-red-500' : 'text-gray-900 dark:text-white' }}">
                            Phonenumber
                        </label>
                        <input type="text" id="phone_number"
                               class="{{ $errors->has('phone_number') ? 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700' : 'shadow-sm bg-gray-50 border border-gray-300 text-gray-900' }} text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                               name="phone_number" value="{{ old('phone_number', $client->phone_number) }}" />
                        @error('phone_number')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                class="font-medium">Oops!</span> {{ $message }}</p>
                        @enderror
                    </div>
                </div>
                {{-- END PHONE NUMBER --}}
                {{-- START ZIP --}}
                <div class="mb-5 p-2">
                    <div class="mb-5 p-2">
                        <label for="zip"
                               class="block mb-2 text-sm font-medium {{ $errors->has('zip') ? 'text-red-700 dark:text-red-500' : 'text-gray-900 dark:text-white' }}">
                            Zipcode
                        </label>
                        <input type="number" id="zip"
                               class="{{ $errors->has('zip') ? 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700' : 'shadow-sm bg-gray-50 border border-gray-300 text-gray-900' }} text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                               name="zip" value="{{ old('zip', $client->zip) }}" />
                        @error('zip')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                class="font-medium">Oops!</span> {{ $message }}</p>
                        @enderror
                    </div>
                </div>
                {{-- END ZIP --}}
                {{-- START VAT --}}
                <div class="mb-5 p-2">
                    <div class="mb-5 p-2">
                        <label for="vat"
                               class="block mb-2 text-sm font-medium {{ $errors->has('vat') ? 'text-red-700 dark:text-red-500' : 'text-gray-900 dark:text-white' }}">
                            VAT
                        </label>
                        <input type="number" id="phone_number"
                               class="{{ $errors->has('vat') ? 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700' : 'shadow-sm bg-gray-50 border border-gray-300 text-gray-900' }} text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                               name="vat" value="{{ old('phone_number', $client->vat) }}" />
                        @error('vat')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                class="font-medium">Oops!</span> {{ $message }}</p>
                        @enderror
                    </div>
                </div>
                {{-- END VAT --}}
                <div class="mb-5 p-2">
                    <button type="submit"
                            class="mt-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Update User
                    </button>
                </div>

            </form>

        </div>
    </div>
</x-app>
