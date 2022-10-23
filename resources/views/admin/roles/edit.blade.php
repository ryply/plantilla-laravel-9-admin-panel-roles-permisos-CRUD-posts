<x-admin-layout>

    <a href="{{ route('admin.roles.index') }}" class="focus:outline-none text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-900">
        Back
    </a>
    <div class="relative max-w-4xl mx-auto shadow-md sm:rounded-lg">
        <form action="{{ route('admin.roles.update', $role) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="relative z-0 w-full mt-8 mb-6 group">
                <input type="text" name="name" id="name" class="block py-2.5 px-0 w-full text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ $role->name }}" />
                <label for="name" class="peer-focus:font-medium absolute text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name Role...</label>

                @error('name')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800 mb-2 ml-2">
                Submit
            </button>
        </form>
    </div>

    <div class="max-w-4xl mx-auto mt-8">
        <h4 class="mb-4">List of permissions assigned to the role</h4>
        @foreach ($role->permissions as $rp)
        <span class="p-1 m-1 text-black bg-indigo-400 rounded-md dark:bg-slate-300 dark:text-blue-900">{{ $rp->name }}</span>
        @endforeach
    </div>

    {{-- Permisos --}}
    <div class="relative max-w-4xl mx-auto mt-8 shadow-md sm:rounded-lg">
        <form action="{{ route('admin.roles.permissions', $role) }}" method="POST">
            @csrf
            <div class="relative z-0 w-full mt-8 mb-6 group">
                <h2>Permissions, <small>(assign one o more permissions to Role)</small></h2>
                <select name="permissions[]" multiple="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach ($permissions as $permission)
                        <option value="{{ $permission->id }}" @selected($role->hasPermission($permission->name))>{{ $permission->name }}</option>
                    @endforeach
                </select>

                @error('name')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800 mb-2 ml-2">
                Assign Permissions
            </button>
        </form>
    </div>

</x-admin-layout>
