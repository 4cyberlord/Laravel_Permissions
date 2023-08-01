<x-admin-layout>
    <div class="flex flex-col w-full">
        <form method="POST" action={{ route('admin.permissions.update', $permission) }}
            class="space-y-8 divide-y divide-gray-200 py-20 w-full px-8">
            @csrf
            @method('PUT')
            <div class="space-y-8 divide-y divide-gray-200">
                <div class="pt-8">
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Edit Permission</h3>
                    </div>
                    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-6 sm:grid-cols-6">
                        <div class="sm:col-span-4 justify-center">
                            <label for="name" class="block text-sm font-medium text-gray-700"> Permission Name </label>
                            <div class="mt-1">
                                <input id="name" name="name" type="text" value="{{  $permission->name }}"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                            @error('name') <span class="text-red-400 text-sm"> {{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="pt-5">
                <div class="flex justify-end">
                    <button type="button"
                        class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</button>
                    <button type="submit"
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
                </div>
            </div>
        </form>
        <div class="space-y-8 divide-y divide-gray-200 py-2 w-full px-8 mt-6 ">
            <h2 class="ext-lg leading-6 font-medium text-gray-900">Permissions Role </h2>
            <div class="flex space-x-2 mt-4 p-2">
                @if ($permission->roles)
                @foreach ($permission->roles as $permission_role)
                <form class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md" method="POST"
                    action="{{ route('admin.permissions.roles.remove', [$permission->id, $permission_role->id]) }}"
                    onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit">{{ $permission_role->name }}</button>
                </form>
                @endforeach
                @endif
            </div>

        </div>
        <form method="POST" action="{{ route('admin.permissions.roles', $permission->id) }}"
            class="space-y-8 divide-y divide-gray-200 py-2 w-full px-8">
            @csrf
            <div class="sm:col-span-3">
                <label for="role" class="block text-sm font-medium text-gray-700 mb-2 mt-2"> List Roles
                </label>
                <div class="mt-1">
                    <select id="role" name="role"
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-4/6 sm:text-sm border-gray-300 rounded-md">
                        <option value=''> -- Select a Role -- </option>
                        @foreach ($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="pt-5">
                <div class="flex justify-end">
                    {{-- <button type="button"
                        class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</button>
                    --}}
                    <button type="submit"
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Assign</button>
                </div>
            </div>
        </form>
    </div>
</x-admin-layout>
