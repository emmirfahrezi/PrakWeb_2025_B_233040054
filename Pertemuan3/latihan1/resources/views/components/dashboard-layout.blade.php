<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $title }}</title>
    @vite('resources/css/app.css')
    {{-- flowbite --}}

    <script src="https://cdn.jsdelivr.net/npm/flowbite@1.6.5/dist/flowbite.min.js"></script>
</head>
<body>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
  <div class="min-h-screen">
    <x-navbar></x-navbar>
    <x-header>{{ $title }}</x-header>

   
  {{ $slot }}
  
</div>
<footer class="bg-gray-900 text-gray-300 py-10">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

      <!-- Brand -->
      <div>
        <h2 class="text-xl font-semibold text-white">Emmir Fahrezi PT</h2>
        <p class="mt-2 text-sm">
          Kamu butuh jasa bikin web, di aku aja cuyyy
        </p>
      </div>

      <!-- Links -->
      <div>
        <h3 class="text-lg font-semibold text-white mb-3">Home</h3>
        <ul class="space-y-2 text-sm">
          <li><a href="blog" class="hover:text-white">Blog</a></li>
          <li><a href="#" class="hover:text-white">About</a></li>
          <li><a href="#" class="hover:text-white">Tentang Kami</a></li>
          <li><a href="#" class="hover:text-white">Kontak</a></li>
        </ul>
      </div>

      <!-- Socials -->
      <div>
        <h3 class="text-lg font-semibold text-white mb-3">Ikuti Kami</h3>
        <div class="flex space-x-5 text-xl">
          <a href="#" class="hover:text-white">🐦</a>
          <a href="#" class="hover:text-white">📘</a>
          <a href="#" class="hover:text-white">📸</a>
          <a href="#" class="hover:text-white">▶️</a>
        </div>
      </div>

    </div>

    <div class="border-t border-gray-700 mt-10 pt-5 text-center text-sm text-gray-400">
      © 2025 Nama Brand. All rights reserved.
    </div>
  </div>
</footer>

</body>
</html>