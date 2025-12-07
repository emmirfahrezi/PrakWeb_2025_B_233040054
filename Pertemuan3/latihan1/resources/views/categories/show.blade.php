<x-dashboard-layout>
    <x-slot:title>
        {{ $category->name }}
    </x-slot:title>

    <div class="max-w-3xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">{{ $category->name }}</h1>
            @auth
                <div class="space-x-3">
                    <a href="{{ route('categories.edit', $category) }}" class="text-yellow-600 hover:underline">Edit</a>
                    <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline"
                          onsubmit="return confirm('Delete this category? This will also remove related posts.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                    </form>
                </div>
            @endauth
        </div>

        <div class="bg-white shadow-sm rounded-lg p-6 space-y-3">
            <div class="text-gray-700">
                <span class="font-semibold">Name:</span> {{ $category->name }}
            </div>
            <div class="text-gray-700">
                <span class="font-semibold">Total Posts:</span> {{ $category->posts_count ?? $category->posts()->count() }}
            </div>
            <div class="text-gray-700">
                <span class="font-semibold">Created:</span> {{ $category->created_at->format('d M Y, H:i') }}
            </div>
            <div class="text-gray-700">
                <span class="font-semibold">Last Updated:</span> {{ $category->updated_at->format('d M Y, H:i') }}
            </div>
        </div>

        <div class="mt-8">
            <a href="{{ route('categories.index') }}" class="text-blue-600 hover:text-blue-800">← Back to categories</a>
        </div>
    </div>
</x-dashboard-layout>
