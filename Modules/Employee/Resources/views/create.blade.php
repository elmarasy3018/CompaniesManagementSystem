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
                    <form action="{{ route('employees.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-2 grid-flow-row gap-6">
                            <div>
                                <label for="ar_first_name"
                                    class="block mb-2 text-sm font-medium text-gray-900">{{ __('web.first') }}
                                    (Ar)</label>
                                @error('ar_first_name')
                                    <div class="p-2 m-2 text-xs text-red-800 rounded-lg bg-red-50" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <input type="text" name="ar_first_name" id="ar_first_name"
                                    value="{{ old('ar_first_name') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                            </div>
                            <div>
                                <label for="ar_last_name"
                                    class="block mb-2 text-sm font-medium text-gray-900">{{ __('web.last') }}
                                    (Ar)</label>
                                @error('ar_last_name')
                                    <div class="p-2 m-2 text-xs text-red-800 rounded-lg bg-red-50" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <input type="text" name="ar_last_name" id="ar_last_name"
                                    value="{{ old('ar_last_name') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                            </div>
                            <div>
                                <label for="en_first_name"
                                    class="block mb-2 text-sm font-medium text-gray-900">{{ __('web.first') }}
                                    (En)</label>
                                @error('en_first_name')
                                    <div class="p-2 m-2 text-xs text-red-800 rounded-lg bg-red-50" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <input type="text" name="en_first_name" id="en_first_name"
                                    value="{{ old('en_first_name') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                            </div>
                            <div>
                                <label for="en_last_name"
                                    class="block mb-2 text-sm font-medium text-gray-900">{{ __('web.last') }}
                                    (En)</label>
                                @error('en_last_name')
                                    <div class="p-2 m-2 text-xs text-red-800 rounded-lg bg-red-50" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <input type="text" name="en_last_name" id="en_last_name"
                                    value="{{ old('en_last_name') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                            </div>
                            <div>
                                <label for="email"
                                    class="block mb-2 text-sm font-medium text-gray-900">{{ __('web.email') }}</label>
                                @error('email')
                                    <div class="p-2 m-2 text-xs text-red-800 rounded-lg bg-red-50" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <input type="text" name="email" id="email" value="{{ old('email') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                            </div>
                            <div>
                                <label for="phone"
                                    class="block mb-2 text-sm font-medium text-gray-900">{{ __('web.phone') }}</label>
                                @error('phone')
                                    <div class="p-2 m-2 text-xs text-red-800 rounded-lg bg-red-50" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                            </div>
                            <div>
                                <label for="companies_id"
                                    class="block mb-2 text-sm font-medium text-gray-900">{{ __('web.company') }}</label>
                                @error('companies_id')
                                    <div class="p-2 m-2 text-xs text-red-800 rounded-lg bg-red-50" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <select multiple id="companies_id" name="companies_id[]"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="" disabled>Select one or more companies</option>
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="image"
                                    class="block mb-2 text-sm font-medium text-gray-900">{{ __('web.logo') }}</label>
                                @error('image')
                                    <div class="p-2 m-2 text-xs text-red-800 rounded-lg bg-red-50" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <input type="file" name="image" id="image"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                            </div>
                        </div>
                        <button type="submit"
                            class="mt-4 text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">{{ __('web.create') }}
                            {{ __('web.employee') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
