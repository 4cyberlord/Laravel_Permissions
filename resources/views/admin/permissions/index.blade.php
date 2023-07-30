<x-admin-layout>
    <div class="flex flex-col py-20 w-full px-8">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="flex justify-end mb-4">
                    <a href='{{ route('admin.permissions.create') }}'
                        class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider bg-green-500 text-white rounded-full mt-2 my-2">
                        Create Permission
                    </a>
                </div>
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Permission</th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                            <tr class="bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $permission->name }}
                                </td>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium justify-end space-x-8">
                                    <a href="{{ route('admin.permissions.edit', $permission->id )  }}" class="text-blue-400 hover:text-blue-800">Edit</a>
                                    <a href="#" class="text-red-400 hover:text-red-800">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>