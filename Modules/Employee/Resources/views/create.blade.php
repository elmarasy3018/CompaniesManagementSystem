<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('web.create') }} {{ __('web.employee') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('employees.store') }}" method="post" class="max-w-sm mx-auto">
                        @csrf
                        <div class="mb-5">
                            <label for="first_name"
                                class="block mb-2 text-sm font-medium text-gray-900">{{ __('web.first') }}</label>
                            @error('first_name')
                                <div class="p-2 m-2 text-xs text-red-800 rounded-lg bg-red-50" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            <input type="text" name="first_name" id="first_name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>
                        <div class="mb-5">
                            <label for="last_name"
                                class="block mb-2 text-sm font-medium text-gray-900">{{ __('web.last') }}</label>
                            @error('last_name')
                                <div class="p-2 m-2 text-xs text-red-800 rounded-lg bg-red-50" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            <input type="text" name="last_name" id="last_name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>
                        <div class="mb-5">
                            <label for="company_id"
                                class="block mb-2 text-sm font-medium text-gray-900">{{ __('web.company') }}</label>
                            @error('company_id')
                                <div class="p-2 m-2 text-xs text-red-800 rounded-lg bg-red-50" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            <select name="company_id" id="company_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="" disabled selected></option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-5">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900">{{ __('web.email') }}</label>
                            @error('email')
                                <div class="p-2 m-2 text-xs text-red-800 rounded-lg bg-red-50" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            <input type="text" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>
                        <div class="mb-5">
                            <label for="phone"
                                class="block mb-2 text-sm font-medium text-gray-900">{{ __('web.phone') }}</label>
                            @error('phone')
                                <div class="p-2 m-2 text-xs text-red-800 rounded-lg bg-red-50" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            <input type="text" name="phone" id="phone"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>
                        <button type="submit"
                            class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">{{ __('web.create') }}
                            {{ __('web.employee') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
