
<x-layout>
  <x-slot:title>
    Categories
  </x-slot:title>
  <h1>Daftar Categories</h1>
  
  @foreach ($categories as $category)
    <article>
      <h2><a href="/posts/{{ $category->slug }}">{{ $category->id }}</a></h2>
      <p>{{ $category->name ?? '' }}</p>
    </article>
  @endforeach
</x-layout>