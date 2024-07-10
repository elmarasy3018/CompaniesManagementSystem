<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('web.companies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('companies.create') }}">
                        <button type="button"
                            class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                            Create Company
                        </button>
                    </a>
                    @if (count($companies) > 0)
                        <div class="m-3 relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="text-base px-6 py-3">
                                            Company Name
                                        </th>
                                        <th scope="col" class="text-base px-6 py-3">
                                            Company Email
                                        </th>
                                        <th scope="col" class="text-base px-6 py-3">
                                            Company Website
                                        </th>
                                        <th scope="col" class="text-base px-6 py-3">
                                            Company Logo
                                        </th>
                                        <th scope="col" class="text-base px-6 py-3">
                                            Edit
                                        </th>
                                        <th scope="col" class="text-base px-6 py-3">
                                            Delete
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($companies as $company)
                                        <tr
                                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $company->name }}
                                            </th>
                                            <td class="px-6 py-4">{{ $company->email }}</td>
                                            <td class="px-6 py-4">{{ $company->website }}</td>
                                            <td class="px-6 py-4"><img
                                                    src="{{ asset('storage/' . $company->getFirstMedia('Logo')->id . '/' . $company->getFirstMedia('Logo')->file_name) }}"
                                                    alt="{{ $company->name }}" class="h-14 w-14 m-2"></td>
                                            <td class="px-6 py-4"><a href="{{ route('companies.edit', $company->id) }}">
                                                    <button type="button"
                                                        class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
                                                        Edit
                                                    </button>
                                                </a></td>
                                            <td class="px-6 py-4">
                                                <form action="{{ route('companies.destroy', $company->id) }}"
                                                    method="post" onsubmit="return confirm('Are You Sure ?');">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"
                                                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $companies->links() }}
                    @else
                        <p>No companies found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
