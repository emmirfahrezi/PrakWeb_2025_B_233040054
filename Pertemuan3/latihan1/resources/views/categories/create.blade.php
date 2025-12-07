<x-dashboard-layout>
    <x-slot:title>
        Create Category
    </x-slot:title>

    <div class="max-w-xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Create Category</h1>

        @if ($errors->any())
            <div class="p-4 mb-4 text-sm text-fg-danger-strong rounded-base bg-danger-soft" role="alert">
                <span class="font-medium">Please fix:</span>
                <ul class="list-disc pl-5 mt-2 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('categories.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required
                       class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
            </div>

            <div class="flex justify-between items-center">
                <a href="{{ route('categories.index') }}" class="text-gray-700 hover:text-gray-900">← Cancel</a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
                    Save Category
                </button>
            </div>
        </form>
    </div>
</x-dashboard-layout>
