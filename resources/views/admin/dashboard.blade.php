<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Admin Dashboard
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-lg shadow">
                    <p class="text-gray-500">Total Users</p>
                    <p class="text-2xl font-bold">{{ \App\Models\User::count() }}</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow">
                    <p class="text-gray-500">Admins</p>
                    <p class="text-2xl font-bold">
                        {{ \App\Models\User::where('role','admin')->count() }}
                    </p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <p class="text-gray-500">Products</p>
                    <p class="text-2xl font-bold">
                        {{ \App\Models\Product::count() }}
                    </p>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>

