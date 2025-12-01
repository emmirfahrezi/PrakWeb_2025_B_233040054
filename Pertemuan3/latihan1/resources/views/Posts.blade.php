
<x-layout>
  <x-slot:title>
    Posts
  </x-slot:title>
  <h1>Daftar Posts</h1>
  
  @foreach ($post as $posts)
    <article>
      <h2><a href="/posts/{{ $posts->slug }}">{{ $posts->id }}</a></h2>
      <p>{{ $posts->excerpt }}</p>
    </article>
    @endforeach
</x-layout>