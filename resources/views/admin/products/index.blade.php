<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold">Products</h2>

            <a href="{{ route('admin.products.create') }}"
                 class="rounded-lg border border-indigo-600 px-4 py-2 text-indigo-600 hover:bg-indigo-50">
               + Add Product
            </a>

        </div>
    </x-slot>

    <div class="py-6 max-w-screen-xl mx-auto sm:px-6 lg:px-8">

        {{-- Search --}}
        <form method="GET" class="mb-4">
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search products..."
                class="w-80 rounded-lg border-gray-300"
            >
        </form>

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

        {{-- Table --}}
        <div class="bg-white shadow rounded-xl overflow-hidden">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-10 py-4 text-left">Title</th>
                        <th>Price</th>
                        <th>Available</th>
                        <th class="text-right px-6">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @foreach($products as $product)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $product->title }}</td>
                            <td>₹{{ number_format($product->price, 2) }}</td>
                            <td>{{ optional($product->available_at)->format('d M Y') }}</td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <a href="{{ route('admin.products.edit', $product) }}"
                                   class="text-indigo-600">Edit</a>

                                <form method="POST"
                                      action="{{ route('admin.products.destroy', $product) }}"
                                      class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600"
                                            onclick="return confirm('Delete product?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="p-4">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
