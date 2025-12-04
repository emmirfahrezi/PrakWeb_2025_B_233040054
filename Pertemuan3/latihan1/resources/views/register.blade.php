<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white shadow-lg rounded-xl p-8">
        <h2 class="text-2xl font-bold text-center mb-6">Register</h2>

        <!-- Success message -->
        @if (session('success'))
            <div class="mb-4 text-green-700 bg-green-100 border border-green-300 p-3 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <!-- Error validation -->
        @if ($errors->any())
            <div class="mb-4 bg-red-100 text-red-700 border border-red-300 p-3 rounded-lg">
                <ul class="list-disc pl-4">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Name -->
            <div>
                <label class="block font-medium mb-1">Nama Lengkap</label>
                <input 
                    type="text" 
                    name="name"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none"
                    placeholder="Masukkan nama anda"
                    required
                >
            </div>

            <!-- Email -->
            <div>
                <label class="block font-medium mb-1">Email</label>
                <input 
                    type="email" 
                    name="email"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none"
                    placeholder="Masukkan email"
                    required
                >
            </div>

            <!-- Password -->
            <div>
                <label class="block font-medium mb-1">Password</label>
                <input 
                    type="password" 
                    name="password"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none"
                    placeholder="Buat password"
                    required
                >
            </div>

            <!-- Password Confirmation -->
            <div>
                <label class="block font-medium mb-1">Konfirmasi Password</label>
                <input 
                    type="password" 
                    name="password_confirmation"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none"
                    placeholder="Konfirmasi password"
                    required
                >
            </div>

            <button 
                type="submit" 
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg transition">
                Register
            </button>
        </form>

        <p class="text-center text-sm text-gray-600 mt-4">
            Sudah punya akun? 
            <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login</a>
        </p>
    </div>

</body>
</html>
