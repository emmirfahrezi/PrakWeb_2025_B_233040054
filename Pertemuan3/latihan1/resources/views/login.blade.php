<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white shadow-lg rounded-xl p-8">
        <h2 class="text-2xl font-bold text-center mb-6">Login</h2>

        <!-- Error message -->
        @if (session('error'))
            <div class="mb-4 text-red-600 bg-red-100 border border-red-300 p-3 rounded-lg">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Email -->
            <div>
                <label class="block font-medium mb-1">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none"
                    placeholder="Enter your email"
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
                    placeholder="Enter your password"
                    required
                >
            </div>

            <!-- Submit -->
            <button 
                type="submit" 
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg transition">
                Login
            </button>
        </form>

        <p class="text-center text-sm text-gray-600 mt-4">
            Belum punya akun? 
            <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Register</a>
        </p>
    </div>

</body>
</html>
