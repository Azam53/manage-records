<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                User Management
            </h2>

            <span class="text-sm text-gray-500">
                Total Users: {{ $users->total() }}
            </span>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-screen-xl mx-auto sm:px-6 lg:px-8">

            {{-- Flash Messages --}}
            @if(session('success'))
                <div class="mb-4 rounded-md bg-green-100 p-4 text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-4 rounded-md bg-red-100 p-4 text-red-700">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Table Card --}}
            <div class="bg-white shadow-sm rounded-lg overflow-hidden">

                <table class="min-w-full table-auto">
                    <thead class="bg-gray-50 border-b">
                        <tr>
                            <th class="px-10 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th class="px-10 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                Email
                            </th>
                            <th class="px-10 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                Role
                            </th>
                            <th class="px-10 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                Change Role
                            </th>
                            <th class="px-10 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                Joined
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200 bg-white">
                        @forelse($users as $user)
                            <tr class="hover:bg-gray-50 transition">

                                {{-- Name --}}
                                <td class="px-10 py-5 whitespace-nowrap">
                                    <div class="font-medium text-gray-900">
                                        {{ $user->name }}
                                    </div>
                                </td>

                                {{-- Email --}}
                                <td class="px-10 py-5 whitespace-nowrap text-gray-700">
                                    {{ $user->email }}
                                </td>

                                {{-- Role --}}
                                <td class="px-10 py-5 whitespace-nowrap">
                                    <span
                                        class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold
                                        {{ $user->role === 'admin'
                                            ? 'bg-indigo-100 text-indigo-700'
                                            : 'bg-gray-100 text-gray-700' }}">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </td>

                                {{-- Change Role --}}
                                <td class="px-10 py-5 whitespace-nowrap">
                                    @if(auth()->id() !== $user->id)
                                        <form method="POST"
                                              action="{{ route('admin.users.role.update', $user) }}">
                                            @csrf
                                            <select
                                                name="role"
                                                onchange="this.form.submit()"
                                                class="w-36 rounded-md border-gray-300 shadow-sm
                                                       focus:border-indigo-500 focus:ring-indigo-500 text-sm"
                                            >
                                                <option value="user" @selected($user->role === 'user')>
                                                    User
                                                </option>
                                                <option value="admin" @selected($user->role === 'admin')>
                                                    Admin
                                                </option>
                                            </select>
                                        </form>
                                    @else
                                        <span class="text-sm text-gray-400 font-medium">
                                            You
                                        </span>
                                    @endif
                                </td>

                                {{-- Joined --}}
                                <td class="px-10 py-5 whitespace-nowrap text-gray-600">
                                    {{ $user->created_at->format('d M Y') }}
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-10 py-10 text-center text-gray-500">
                                    No users found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{-- Pagination --}}
                <div class="px-6 py-4 border-t bg-gray-50">
                    {{ $users->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
