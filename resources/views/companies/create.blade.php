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
                    <form action="{{ route('companies.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="name" id="name">
                        <input type="email" name="email" id="email">
                        <input type="text" name="website" id="website">
                        <input type="file" name="image" id="image">
                        <button type="submit">Create Company</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>