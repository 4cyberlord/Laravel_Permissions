<x-admin-layout>
    <form method="POST" action={{ route('admin.permissions.store') }}
        class="space-y-8 divide-y divide-gray-200 py-20 w-full px-8">
        @csrf
        <div class="space-y-8 divide-y divide-gray-200">
            <div class="pt-8">
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Create a Permission</h3>
                </div>
                <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-6 sm:grid-cols-6">
                    <div class="sm:col-span-4 justify-center">
                        <label for="name" class="block text-sm font-medium text-gray-700"> Permission Name </label>
                        <div class="mt-1">
                            <input id="name" name="name" type="text"
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
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
            </div>
        </div>
    </form>
</x-admin-layout>