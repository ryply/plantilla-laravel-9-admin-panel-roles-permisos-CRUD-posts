<div x-cloak :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class="fixed inset-0 z-20 transition-opacity bg-black opacity-50 lg:hidden"></div>

<div x-cloak :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto transition duration-300 transform bg-gray-900 lg:translate-x-0 lg:static lg:inset-0">
    <div class="flex items-start mt-8 ml-8">
        <div class="flex items-start">
            <a href="{{ route('dashboard') }}">
                <span class="mx-2 text-2xl font-semibold text-white">Dashboard</span>
            </a>
        </div>
    </div>

    <nav class="mt-10">
        <x-sidebar-link :href="route('admin.index')" :active="request()->routeIs('admin.index')">
            {{ __('Admin') }}
        </x-sidebar-link>

        <hr class="my-4">

        <x-sidebar-link :href="route('admin.roles.index')" :active="request()->routeIs('admin.roles.*')">
            {{ __('Roles') }}
        </x-sidebar-link>

        <x-sidebar-link :href="route('admin.permissions.index')" :active="request()->routeIs('admin.permissions.*')">
            {{ __('Permissions') }}
        </x-sidebar-link>

        <hr class="my-4">

        <x-sidebar-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')">
            {{ __('Users') }}
        </x-sidebar-link>

        <hr class="my-4">
    </nav>
</div>
