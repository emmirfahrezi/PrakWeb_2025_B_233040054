
<x-layout>
  <x-slot:title>
    Posts
  </x-slot:title>
  <h1>Daftar Posts</h1>
  
  @foreach ($posts as $post)
    <article>
      <h2><a href="/posts/{{ $post->slug }}">{{ $post->id }}</a></h2>
      <p>{{ $post->excerpt }}</p>
    </article>
  @endforeach
</x-layout>