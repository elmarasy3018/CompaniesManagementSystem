<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Company') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('companies.update', $company->id) }}" method="post"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <input type="text" name="name" id="name" value="{{ $company->name }}">
                        <input type="email" name="email" id="email" value="{{ $company->email }}">
                        <input type="text" name="website" id="website" value="{{ $company->website }}">
                        <input type="file" name="image" id="image">
                        <button type="submit">Update Company</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
