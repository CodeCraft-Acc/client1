<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - BBSPJIA</title>
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
        .sidebar {
            width: 280px;
            transition: all 0.3s ease;
        }
        .main-content {
            margin-left: 280px;
            transition: all 0.3s ease;
        }
        @media (max-width: 768px) {
            .sidebar {
                margin-left: -280px;
            }
            .sidebar.active {
                margin-left: 0;
            }
            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50">
    <!-- Sidebar -->
    <aside class="sidebar fixed top-0 left-0 h-full bg-white shadow-lg z-20">
        <div class="p-6">
            <div class="flex items-center justify-center mb-8">
                <h1 class="text-2xl font-bold text-green-600">BBSPJIA</h1>
            </div>
            
            <nav class="space-y-2">
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 px-4 py-3 text-gray-600 hover:bg-gray-100 rounded-lg transition duration-200">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('documents.index') }}" class="flex items-center space-x-3 px-4 py-3 text-gray-600 hover:bg-gray-100 rounded-lg transition duration-200">
                    <i class="fas fa-file-alt"></i>
                    <span>Dokumen</span>
                </a>
                <a href="{{ route('certifications.index') }}" class="flex items-center space-x-3 px-4 py-3 text-gray-600 hover:bg-gray-100 rounded-lg transition duration-200">
                    <i class="fas fa-certificate"></i>
                    <span>Sertifikasi</span>
                </a>
                <a href="{{ route('schedules.index') }}" class="flex items-center space-x-3 px-4 py-3 text-gray-600 hover:bg-gray-100 rounded-lg transition duration-200">
                    <i class="fas fa-calendar"></i>
                    <span>Jadwal</span>
                </a>
                <a href="{{ route('profile') }}" class="flex items-center space-x-3 px-4 py-3 text-gray-700 bg-gray-100 rounded-lg">
                    <i class="fas fa-user"></i>
                    <span>Profil</span>
                </a>
            </nav>
        </div>
        
        <div class="absolute bottom-0 left-0 right-0 p-6">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center space-x-3 px-4 py-3 text-red-600 hover:bg-red-50 rounded-lg transition duration-200">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="main-content min-h-screen bg-gray-50">
        <!-- Top Navigation -->
        <nav class="bg-white shadow-sm">
            <div class="px-6 py-4">
                <div class="flex items-center justify-between">
                    <button id="menu-toggle" class="md:hidden text-gray-600">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-700">Selamat datang, {{ Auth::user()->name }}</span>
                        <div class="h-8 w-8 rounded-full bg-green-100 flex items-center justify-center">
                            <span class="text-green-600 font-medium">{{ substr(Auth::user()->name, 0, 1) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Profile Content -->
        <div class="p-6">
            <!-- Header Section -->
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Profil</h1>
                <p class="text-gray-600">Informasi profil dan pengaturan akun</p>
            </div>

            <!-- Profile Information -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Admin 1 -->
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <div class="flex items-center space-x-4 mb-4">
                        <div class="h-16 w-16 rounded-full bg-green-100 flex items-center justify-center">
                            <span class="text-green-600 text-2xl font-medium">A</span>
                        </div>
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800">Anjani</h2>
                            <p class="text-gray-600">Admin 1</p>
                        </div>
                    </div>
                    <div class="space-y-3">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-id-card text-gray-400"></i>
                            <span class="text-gray-600">NIP: 198501012010012001</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-envelope text-gray-400"></i>
                            <span class="text-gray-600">anjani@bbspjia.go.id</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-phone text-gray-400"></i>
                            <span class="text-gray-600">+62 812-3456-7890</span>
                        </div>
                    </div>
                </div>

                <!-- Admin 2 -->
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <div class="flex items-center space-x-4 mb-4">
                        <div class="h-16 w-16 rounded-full bg-green-100 flex items-center justify-center">
                            <span class="text-green-600 text-2xl font-medium">M</span>
                        </div>
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800">Marsya</h2>
                            <p class="text-gray-600">Admin 2</p>
                        </div>
                    </div>
                    <div class="space-y-3">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-id-card text-gray-400"></i>
                            <span class="text-gray-600">NIP: 199001012010012002</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-envelope text-gray-400"></i>
                            <span class="text-gray-600">marsya@bbspjia.go.id</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-phone text-gray-400"></i>
                            <span class="text-gray-600">+62 812-3456-7891</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Account Settings -->
            <div class="mt-6 bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Pengaturan Akun</h2>
                <form method="POST" action="{{ route('profile.update') }}" class="space-y-4">
                    @csrf
                    @method('PUT')
                    
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" value="{{ Auth::user()->email }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                    </div>

                    <div>
                        <label for="current_password" class="block text-sm font-medium text-gray-700">Password Saat Ini</label>
                        <input type="password" name="current_password" id="current_password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password Baru</label>
                        <input type="password" name="password" id="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password Baru</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition duration-200">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Mobile menu toggle
        document.getElementById('menu-toggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('active');
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(e) {
            const sidebar = document.querySelector('.sidebar');
            const menuToggle = document.getElementById('menu-toggle');
            
            if (window.innerWidth <= 768) {
                if (!sidebar.contains(e.target) && !menuToggle.contains(e.target)) {
                    sidebar.classList.remove('active');
                }
            }
        });
    </script>
</body>
</html> 