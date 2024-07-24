<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('web.users') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (count($users) > 0)
                        <div class="m-3 relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="text-base px-6 py-3">
                                            {{ __('web.name') }}
                                        </th>
                                        <th scope="col" class="text-base px-6 py-3">
                                            {{ __('web.roles') }} {{ __('web.users') }}
                                        </th>
                                        <th scope="col" class="text-base px-6 py-3">
                                            {{ __('web.permissions') }} {{ __('web.users') }}
                                        </th>
                                        <th scope="col" class="text-base px-6 py-3">
                                            {{ __('web.roles') }}
                                        </th>
                                        <th scope="col" class="text-base px-6 py-3">
                                            {{ __('web.edit') }}
                                        </th>
                                        <th scope="col" class="text-base px-6 py-3">
                                            {{ __('web.delete') }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr
                                            class="min-h-80 odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                            <th
                                                scope="row"class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $user->name }}</th>
                                            <td
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                @foreach ($userRoles = $user->getRoleNames() as $userRole)
                                                    <li>{{ $userRole }}</li>
                                                @endforeach
                                            </td>
                                            <td
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                @foreach ($userPermissions = $user->getAllPermissions() as $userPermission)
                                                    <li>{{ $userPermission->name }}</li>
                                                @endforeach
                                            </td>
                                            <form action="{{ route('users.update', $user->id) }}" method="post"
                                                enctype="multipart/form-data" class="max-w-sm mx-auto">
                                                @method('put')
                                                @csrf
                                                <td
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    <select multiple="multiple" id="roles_id" name="roles_id[]"
                                                        class="js-example-basic-multiple">
                                                        @foreach ($roles as $role)
                                                            <option value="{{ $role->name }}">{{ $role->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <button type="submit"
                                                        class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
                                                        {{ __('web.edit') }}
                                                    </button>
                                                </td>
                                            </form>
                                            <td class="px-6 py-4">
                                                <form action="{{ route('users.destroy', $user->id) }}" method="post"
                                                    onsubmit="return confirm('Are You Sure ?');">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"
                                                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                                        {{ __('web.delete') }}
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @error('roles_id')
                                <div class="p-2 m-2 text-xs text-red-800 rounded-lg bg-red-50" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{ $users->links() }}
                    @else
                        <p>No users found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
