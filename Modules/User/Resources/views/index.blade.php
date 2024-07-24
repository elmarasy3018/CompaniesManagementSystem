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
                                            {{ __('web.status') }}
                                        </th>
                                        <th scope="col" class="text-base px-6 py-3">
                                            {{ __('web.roles') }} {{ __('web.users') }}
                                        </th>
                                        <th scope="col" class="text-base px-6 py-3">
                                            {{ __('web.permissions') }} {{ __('web.users') }}
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
                                                {{ $user->name }}
                                            </th>
                                            <td
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <span
                                                    class="px-4 py-2 text-sm font-medium text-gray-900 border border-gray-100 rounded-full hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-500 dark:text-white dark:hover:text-white dark:focus:ring-blue-500 dark:focus:text-white @if ($user->status == 'active') bg-green-500 hover:bg-green-600
                                                    @else bg-red-500 hover:bg-red-600 @endif">
                                                    {{ $user->status }}
                                                </span>
                                            </td>
                                            <td
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <div class="flex flex-wrap rounded-md shadow-sm w-full max-w-44"
                                                    role="group">
                                                    @foreach ($userRoles = $user->getRoleNames() as $userRole)
                                                        <span
                                                            class="m-1 px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-100 rounded-full hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-500 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                                                            {{ $userRole }}
                                                        </span>
                                                    @endforeach
                                                </div>
                                            </td>
                                            <td
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <div class="flex flex-wrap rounded-md shadow-sm w-full max-w-96"
                                                    role="group">
                                                    @foreach ($userPermissions = $user->getAllPermissions() as $userPermission)
                                                        <span
                                                            class="m-1 px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-100 rounded-full hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-500 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                                                            {{ $userPermission->name }}
                                                        </span>
                                                    @endforeach
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <a href="{{ route('users.edit', $user->id) }}">
                                                    <button type="button"
                                                        class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
                                                        {{ __('web.edit') }}
                                                    </button>
                                                </a>
                                            </td>
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
