<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('companies.create') }}">Create Company</a>
                    @if (count($companies) > 0)
                        <table>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Website</th>
                                <th>Logo</th>
                            </tr>
                            @foreach ($companies as $company)
                                <tr>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->email }}</td>
                                    <td>{{ $company->website }}</td>
                                    <td><img style="width: 3rem; height: 3rem;"
                                            src="{{ asset('storage/' . $company->getFirstMedia()->model_id . '/' . $company->getFirstMedia()->file_name) }}"
                                            alt="{{ $company->name }}">
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {{ $companies->links() }}
                    @else
                        <p>No companies found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
