<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('web.edit') }} {{ __('web.user') }}
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
                    <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data"
                        class="max-w-sm mx-auto">
                        @method('put')
                        @csrf
                        <div class="mb-5">
                            <span for="user_name"
                                class="block mb-2 text-m font-medium text-gray-900">{{ __('web.user') }} :
                                {{ $user->name }}</span>
                        </div>
                        <div class="mb-5">
                            <label class="inline-flex items-center me-5 cursor-pointer">
                                <span class="me-3 block mb-2 text-m font-medium text-gray-900">{{ __('web.status') }} :
                                </span>
                                <input type="checkbox" id="status" name="status" value="active" class="sr-only peer" @if ($user->status == 'active') checked @endif>
                                <div
                                    class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600">
                                </div>
                            </label>
                        </div>
                        <div class="mb-5">
                            <label for="roles_id"
                                class="block mb-2 text-sm font-medium text-gray-900">{{ __('web.roles') }}</label>
                            <select multiple="multiple" id="roles_id" name="roles_id[]"
                                class="js-example-basic-multiple" style="width: 100%">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit"
                            class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">{{ __('web.edit') }}
                            {{ __('web.user') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
