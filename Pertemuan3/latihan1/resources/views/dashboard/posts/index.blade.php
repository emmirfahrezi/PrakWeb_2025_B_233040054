<x-dashboard-layout>
    <x-slot:title>
        My Posts - Dashboard
    </x-slot:title>

    <div class="max-w-6xl mx-auto">
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

        @if ($errors->any())
            <div class="p-4 mb-4 text-sm text-fg-danger-strong rounded-base bg-danger-soft" role="alert">
                <span class="font-medium">Please fix:</span>
                <ul class="list-disc pl-4 mt-2 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">My Posts</h1>
            <a href="{{ route('dashboard.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                Create Post
            </a>
        </div>

        <!-- Search Form -->
        <form action="{{ route('dashboard.index') }}" method="GET" class="mb-6">
            <div class="flex gap-2">
                <input type="text" name="search" placeholder="Search posts..." value="{{ request('search') }}" 
                    class="flex-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                <button type="submit" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg">
                    Search
                </button>
            </div>
        </form>



        <!-- Posts Table -->
        @if($posts->count())
            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 text-left text-gray-700">Image</th>
                            <th class="px-4 py-2 text-left text-gray-700">Title</th>
                            <th class="px-4 py-2 text-left text-gray-700">Category</th>
                            <th class="px-4 py-2 text-left text-gray-700">Created</th>
                            <th class="px-4 py-2 text-center text-gray-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-2">
                                    @if($post->image)
                                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-16 h-16 object-cover rounded">
                                    @else
                                        <div class="w-16 h-16 bg-gray-200 rounded flex items-center justify-center text-gray-400 text-xs">No Image</div>
                                    @endif
                                </td>
                                <td class="px-4 py-2">{{ $post->title }}</td>
                                <td class="px-4 py-2">{{ $post->category->name ?? 'N/A' }}</td>
                                <td class="px-4 py-2 text-sm text-gray-600">{{ $post->created_at->format('d M Y') }}</td>
                                <td class="px-4 py-2 text-center">
                                    <a href="{{ route('posts.show', $post->slug) }}" class="text-blue-600 hover:underline mr-3">View</a>
                                    <a href="{{ route('dashboard.edit', $post->id) }}" class="text-yellow-600 hover:underline mr-3">Edit</a>
                                    <form action="{{ route('dashboard.destroy', $post->id) }}" method="POST" class="inline"
                                        onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $posts->links() }}
            </div>
        @else
            <div class="text-center py-8 text-gray-600">
                <p>No posts found. <a href="{{ route('dashboard.create') }}" class="text-blue-600 hover:underline">Create your first post</a></p>
            </div>
        @endif
    </div>
</x-dashboard-layout>
