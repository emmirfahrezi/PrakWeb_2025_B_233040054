<x-dashboard-layout>
    <x-slot:title>
        Categories
    </x-slot:title>

    <div class="max-w-5xl mx-auto">
        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-fg-success-strong rounded-base bg-success-soft" role="alert">
                <span class="font-medium">Success!</span> {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="p-4 mb-4 text-sm text-fg-danger-strong rounded-base bg-danger-soft" role="alert">
                <span class="font-medium">Error!</span> {{ session('error') }}
            </div>
        @endif

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Categories</h1>
            @auth
                <a href="{{ route('categories.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                    Create Category
                </a>
            @endauth
        </div>

        @if($categories->count())
            <div class="overflow-x-auto bg-white shadow-sm rounded-lg">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-100 text-left text-gray-700">
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Posts</th>
                            <th class="px-4 py-3">Created</th>
                            <th class="px-4 py-3 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-3 font-medium text-gray-900">{{ $category->name }}</td>
                                <td class="px-4 py-3 text-gray-700">{{ $category->posts_count }}</td>
                                <td class="px-4 py-3 text-sm text-gray-500">{{ $category->created_at->format('d M Y') }}</td>
                                <td class="px-4 py-3 text-center space-x-3">
                                    <a href="{{ route('categories.show', $category) }}" class="text-blue-600 hover:underline">View</a>
                                    @auth
                                        <a href="{{ route('categories.edit', $category) }}" class="text-yellow-600 hover:underline">Edit</a>
                                        <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline"
                                              onsubmit="return confirm('Delete this category? This will also remove related posts.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                        </form>
                                    @endauth
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $categories->links() }}
            </div>
        @else
            <div class="text-center py-8 text-gray-600">
                <p>No categories found.</p>
                @auth
                    <p class="mt-2">Create one now by clicking "Create Category".</p>
                @endauth
            </div>
        @endif
    </div>
</x-dashboard-layout>
