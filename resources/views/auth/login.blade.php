<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - BBSPJIA</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .gradient-background {
            background: linear-gradient(135deg, #166534 0%, #16a34a 100%);
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50">
    <div class="min-h-screen flex flex-col">
        <!-- Navigation -->
        <nav class="bg-white shadow-lg w-full">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-20">
                    <div class="flex items-center space-x-8">
                        <a href="/" class="flex items-center text-gray-700 hover:text-green-600 transition duration-300">
                            <i class="fas fa-arrow-left text-xl mr-2"></i>
                            <span class="text-sm font-medium">Kembali</span>
                        </a>
                        <div class="text-2xl font-bold text-green-600">BBSPJIA</div>
                    </div>
                    <div class="hidden md:flex items-center space-x-4">
                        <a href="/register" class="text-gray-700 hover:text-green-600 font-medium transition duration-300">Belum punya akun?</a>
                        <a href="/register" class="px-6 py-2.5 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-300 font-medium">Daftar</a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Login Section -->
        <div class="flex-grow flex items-center justify-center px-4 sm:px-6 lg:px-8 py-12">
            <div class="max-w-md w-full">
                <!-- Login Card -->
                <div class="bg-white rounded-2xl shadow-xl p-8 sm:p-10">
                    <div class="text-center mb-8">
                        <h2 class="text-3xl font-bold text-gray-800 mb-2">Selamat Datang Kembali</h2>
                        <p class="text-gray-600">Masuk ke akun Anda</p>
                    </div>

                    @if (session('status'))
                        <div class="mb-4 text-sm font-medium text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mb-4">
                            <div class="text-sm text-red-600">
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf
                        <!-- Email Input -->
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Email</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-envelope text-gray-400"></i>
                                </div>
                                <input type="email" name="email" required 
                                    class="w-full pl-10 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-300"
                                    placeholder="Masukkan email Anda"
                                    value="{{ old('email') }}"
                                    autofocus>
                            </div>
                        </div>

                        <!-- Password Input -->
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Password</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-lock text-gray-400"></i>
                                </div>
                                <input type="password" name="password" required 
                                    class="w-full pl-10 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-300"
                                    placeholder="Masukkan password Anda">
                            </div>
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input type="checkbox" id="remember_me" name="remember" 
                                    class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                                <label for="remember_me" class="ml-2 block text-sm text-gray-700">
                                    Ingat Saya
                                </label>
                            </div>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-sm font-medium text-green-600 hover:text-green-700 transition duration-300">
                                    Lupa Password?
                                </a>
                            @endif
                        </div>

                        <!-- Login Button -->
                        <button type="submit" 
                            class="w-full bg-green-600 text-white py-3 rounded-lg hover:bg-green-700 transition duration-300 font-medium flex items-center justify-center">
                            <i class="fas fa-sign-in-alt mr-2"></i>
                            Masuk
                        </button>
                    </form>

                    <!-- Mobile Register Link -->
                    <div class="mt-6 text-center md:hidden">
                        <p class="text-gray-600">Belum punya akun?</p>
                        <a href="/register" class="text-green-600 font-medium hover:text-green-700 transition duration-300">
                            Daftar sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="gradient-background text-white py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <p class="text-green-50">&copy; 2024 Balai Besar Standardisasi dan Pelayanan Jasa Industri Agro. Hak Cipta Dilindungi.</p>
            </div>
        </footer>
    </div>
</body>
</html>
