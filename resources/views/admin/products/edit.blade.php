<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Product
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-2xl p-8">

                {{-- Validation Errors --}}
                @if ($errors->any())
                    <div class="mb-6 rounded-lg bg-red-50 px-6 py-4 text-red-700">
                        <ul class="list-disc list-inside space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST"
                      action="{{ route('admin.products.update', $product) }}"
                      class="space-y-6">
                    @csrf
                    @method('PUT')

                    {{-- Title --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Title
                        </label>
                        <input
                            type="text"
                            name="title"
                            value="{{ old('title', $product->title) }}"
                            required
                            class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                        >
                    </div>

                    {{-- Description --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Description
                        </label>
                        <textarea
                            name="description"
                            rows="5"
                            required
                            class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                        >{{ old('description', $product->description) }}</textarea>
                    </div>

                    {{-- Price --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Price
                        </label>
                        <input
                            type="number"
                            name="price"
                            step="0.01"
                            min="0"
                            value="{{ old('price', $product->price) }}"
                            required
                            class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                        >
                    </div>

                    {{-- Available Date --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Date Available
                        </label>
                        <input
                            type="date"
                            name="available_at"
                            value="{{ old('available_at', optional($product->available_at)->format('Y-m-d')) }}"
                            class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                        >
                    </div>

                    {{-- Actions --}}
                    <div class="flex items-center justify-end gap-4 pt-4">
                        <a href="{{ route('admin.products.index') }}"
                           class="text-gray-600 hover:text-gray-800">
                            Cancel
                        </a>

                        <button
                            type="submit"
                            class="rounded-lg border border-indigo-600 px-4 py-2 text-indigo-600 hover:bg-indigo-50">
                            Update Product
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
