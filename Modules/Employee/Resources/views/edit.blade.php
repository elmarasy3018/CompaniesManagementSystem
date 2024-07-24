<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('web.edit') }} {{ __('web.employee') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($errors->any())
                        <div class="mb-5">
                            <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                                Something went wrong...
                            </div>
                            <ul class="border border-t-0 border-red-400 text-red-700 rounded-b bg-red-100 px-4 py-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('employees.update', $employee->id) }}" method="post"
                        enctype="multipart/form-data" class="max-w-sm mx-auto">
                        @method('put')
                        @csrf
                        <div class="mb-5">
                            <label for="first_name"
                                class="block mb-2 text-sm font-medium text-gray-900">{{ __('web.first') }}</label>
                            <input type="text" name="first_name" id="first_name" value="{{ $employee->first_name }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>
                        <div class="mb-5">
                            <label for="last_name"
                                class="block mb-2 text-sm font-medium text-gray-900">{{ __('web.last') }}</label>
                            <input type="text" name="last_name" id="last_name" value="{{ $employee->last_name }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>
                        <div class="mb-5">
                            <label for="companies_id"
                                class="block mb-2 text-sm font-medium text-gray-900">{{ __('web.company') }}</label>
                            <select id="companies_id" name="companies_id[]" multiple="multiple"
                                class="js-example-basic-multiple" style="width: 100%">
                                <option value="" disabled>Select one or more companies</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}"
                                        @if (in_array($company->name, $employee->companies->pluck('name')->toArray())) selected @endif>
                                        {{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-5">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900">{{ __('web.email') }}</label>
                            <input type="text" name="email" id="email" value="{{ $employee->email }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>
                        <div class="mb-5">
                            <label for="phone"
                                class="block mb-2 text-sm font-medium text-gray-900">{{ __('web.phone') }}</label>
                            <input type="text" name="phone" id="phone" value="{{ $employee->phone }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>
                        <div class="mb-5">
                            <label for="image"
                                class="block mb-2 text-sm font-medium text-gray-900">{{ __('web.logo') }}</label>
                            <img src="{{ asset('storage/' . $employee->getFirstMedia('employee')->id . '/' . $employee->getFirstMedia('employee')->file_name) }}"
                                alt="{{ $employee->first_name }}" class="h-16 w-16 m-2">
                            <input type="file" name="image" id="image"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>
                        <button type="submit"
                            class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">{{ __('web.edit') }}
                            {{ __('web.employee') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
