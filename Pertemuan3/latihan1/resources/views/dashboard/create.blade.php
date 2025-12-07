<x-dashboard-layout>
    <x-slot:title>
        Create Post - Dashboard
    </x-slot:title>

    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Create New Post</h1>

        @if ($errors->any())
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('dashboard.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" required
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
            </div>

            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                <select name="category_id" id="category_id" required
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                    <option value="">-- Select Category --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="excerpt" class="block text-sm font-medium text-gray-700 mb-1">Excerpt</label>
                <textarea name="excerpt" id="excerpt" rows="3" required
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">{{ old('excerpt') }}</textarea>
            </div>

            <div>
                <label for="body" class="block text-sm font-medium text-gray-700 mb-1">Body</label>
                <textarea name="body" id="body" rows="8" required
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">{{ old('body') }}</textarea>
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Image (Optional)</label>
                <input type="file" name="image" id="image" accept="image/*"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                <p class="text-xs text-gray-500 mt-1">Max 2MB (jpeg, png, jpg, gif)</p>
            </div>

            <div class="flex justify-between">
                <a href="{{ route('dashboard.index') }}" class="px-4 py-2 text-gray-700 hover:text-gray-900">
                    ← Cancel
                </a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
                    Create Post
                </button>
            </div>
        </form>
    </div>
</x-dashboard-layout>
