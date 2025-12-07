<x-layout>
  <x-slot:title>
    {{ $post->title }}
  </x-slot:title>

  <article class="max-w-4xl mx-auto py-8 space-y-4">
    <header class="space-y-2">
      <h1 class="text-4xl font-bold text-gray-900">{{ $post->title }}</h1>
      <div class="text-sm text-gray-600 space-x-3">
        <span>By {{ $post->author->name ?? 'Unknown' }}</span>
        <span>•</span>
        <span>Category: {{ $post->category->name ?? 'Uncategorized' }}</span>
        <span>•</span>
        <span>{{ $post->created_at->format('d M Y') }}</span>
      </div>
    </header>

    @if($post->image)
      <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full rounded-lg" />
    @endif

    <p class="text-lg text-gray-700">{{ $post->excerpt }}</p>

    <div class="prose max-w-none text-gray-800">
      {!! nl2br(e($post->body)) !!}
    </div>

    <footer class="pt-6">
      <a href="{{ route('posts.index') }}" class="text-blue-600 hover:underline">← Back to Posts</a>
    </footer>
  </article>
</x-layout>
