<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - BBSPJIA</title>
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
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 px-4 py-3 text-gray-700 bg-gray-100 rounded-lg">
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
                <a href="{{ route('profile') }}" class="flex items-center space-x-3 px-4 py-3 text-gray-600 hover:bg-gray-100 rounded-lg transition duration-200">
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

        <!-- Dashboard Content -->
        <div class="p-6">
            <!-- Header Section -->
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
                <p class="text-gray-600">Selamat datang di sistem informasi BBSPJIA</p>
            </div>

            <!-- Quick Stats -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <!-- Total Documents -->
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <p class="text-sm text-gray-500">Total Dokumen</p>
                            <h3 class="text-2xl font-bold text-gray-800">{{ \App\Models\Document::count() }}</h3>
                        </div>
                        <div class="h-12 w-12 rounded-full bg-blue-100 flex items-center justify-center">
                            <i class="fas fa-file-alt text-blue-500 text-xl"></i>
                        </div>
                    </div>
                    <div class="flex items-center text-sm text-green-600">
                        <i class="fas fa-arrow-up mr-1"></i>
                        <span>Dokumen SPPCA dan SPPKA</span>
                    </div>
                </div>

                <!-- Active Certifications -->
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <p class="text-sm text-gray-500">Sertifikasi Aktif</p>
                            <h3 class="text-2xl font-bold text-gray-800">{{ \App\Models\Certification::where('status', 'active')->count() }}</h3>
                        </div>
                        <div class="h-12 w-12 rounded-full bg-green-100 flex items-center justify-center">
                            <i class="fas fa-certificate text-green-500 text-xl"></i>
                        </div>
                    </div>
                    <div class="flex items-center text-sm text-green-600">
                        <i class="fas fa-check mr-1"></i>
                        <span>Sertifikasi Madu, Air, Garam, Tepung, Minyak</span>
                    </div>
                </div>

                <!-- Upcoming Schedule -->
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <p class="text-sm text-gray-500">Jadwal Mendatang</p>
                            <h3 class="text-2xl font-bold text-gray-800">{{ \App\Models\Schedule::where('date', '>=', now()->format('Y-m-d'))->count() }}</h3>
                        </div>
                        <div class="h-12 w-12 rounded-full bg-yellow-100 flex items-center justify-center">
                            <i class="fas fa-calendar text-yellow-500 text-xl"></i>
                        </div>
                    </div>
                    <div class="flex items-center text-sm text-yellow-600">
                        <i class="fas fa-clock mr-1"></i>
                        <span>Sertifikasi dan Pengujian</span>
                    </div>
                </div>

                <!-- Pending Processes -->
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <p class="text-sm text-gray-500">Proses Pending</p>
                            <h3 class="text-2xl font-bold text-gray-800">{{ \App\Models\Certification::where('status', 'pending')->count() }}</h3>
                        </div>
                        <div class="h-12 w-12 rounded-full bg-red-100 flex items-center justify-center">
                            <i class="fas fa-hourglass-half text-red-500 text-xl"></i>
                        </div>
                    </div>
                    <div class="flex items-center text-sm text-red-600">
                        <i class="fas fa-exclamation-circle mr-1"></i>
                        <span>Menunggu Persetujuan</span>
                    </div>
                </div>
            </div>

            <!-- Recent Documents -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-semibold text-gray-800">Dokumen Terbaru</h2>
                    <a href="{{ route('documents.index') }}" class="text-sm text-green-600 hover:text-green-700">Lihat Semua</a>
                </div>
                <div class="space-y-4">
                    @forelse(\App\Models\Document::latest()->take(3)->get() as $document)
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                        <div class="flex items-center space-x-4">
                            <div class="h-10 w-10 rounded-lg bg-gray-100 flex items-center justify-center">
                                @if($document->file_type == 'pdf')
                                    <i class="fas fa-file-pdf text-red-500"></i>
                                @elseif($document->file_type == 'doc' || $document->file_type == 'docx')
                                    <i class="fas fa-file-word text-blue-500"></i>
                                @elseif($document->file_type == 'xls' || $document->file_type == 'xlsx')
                                    <i class="fas fa-file-excel text-green-500"></i>
                                @endif
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-800">{{ $document->title }}</h3>
                                <p class="text-xs text-gray-500">{{ $document->created_at->format('d M Y H:i') }}</p>
                            </div>
                        </div>
                        <a href="{{ route('documents.download', $document) }}" class="text-gray-400 hover:text-gray-600">
                            <i class="fas fa-download"></i>
                        </a>
                    </div>
                    @empty
                    <p class="text-sm text-gray-500 text-center">Belum ada dokumen</p>
                    @endforelse
                </div>
            </div>

            <!-- Dokumen Arsip -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-semibold text-gray-800">Dokumen</h2>
                    <a href="{{ route('documents.index') }}" class="text-green-600 hover:text-green-700 text-sm">
                        Lihat Semua <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                        <div class="flex items-center space-x-3">
                            <div class="h-10 w-10 rounded-lg bg-blue-100 flex items-center justify-center">
                                <i class="fas fa-file-alt text-blue-600"></i>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-900">Dokumen Arsip</h3>
                                <p class="text-xs text-gray-500">Nota Dinas</p>
                            </div>
                        </div>
                        <a href="{{ route('documents.index') }}" class="text-blue-600 hover:text-blue-700">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                        <div class="flex items-center space-x-3">
                            <div class="h-10 w-10 rounded-lg bg-green-100 flex items-center justify-center">
                                <i class="fas fa-file-alt text-green-600"></i>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-900">SPPCA</h3>
                                <p class="text-xs text-gray-500">Sertifikasi Produk Penggunaan Tanda SNI</p>
                            </div>
                        </div>
                        <a href="{{ route('documents.index', ['category' => 'SPPCA']) }}" class="text-green-600 hover:text-green-700">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                        <div class="flex items-center space-x-3">
                            <div class="h-10 w-10 rounded-lg bg-yellow-100 flex items-center justify-center">
                                <i class="fas fa-file-alt text-yellow-600"></i>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-900">SPPKA</h3>
                                <p class="text-xs text-gray-500">Sertifikasi Pengujian Laboratorium</p>
                            </div>
                        </div>
                        <a href="{{ route('documents.index', ['category' => 'SPPKA']) }}" class="text-yellow-600 hover:text-yellow-700">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Upcoming Schedules -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 mb-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-semibold text-gray-800">Jadwal Mendatang</h2>
                    <a href="{{ route('schedules.index') }}" class="text-green-600 hover:text-green-700 text-sm font-medium">Lihat Semua</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Waktu</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aktivitas</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lokasi</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse(\App\Models\Schedule::where('date', '>=', now()->format('Y-m-d'))->orderBy('date', 'asc')->orderBy('start_time', 'asc')->take(5)->get() as $schedule)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ \Carbon\Carbon::parse($schedule->date)->format('d M Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ \Carbon\Carbon::parse($schedule->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($schedule->end_time)->format('H:i') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $schedule->title }}</div>
                                    <div class="text-sm text-gray-500">{{ $schedule->type }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $schedule->location }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        {{ $schedule->status == 'completed' ? 'bg-green-100 text-green-800' : 
                                           ($schedule->status == 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-blue-100 text-blue-800') }}">
                                        {{ $schedule->status }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                    Belum ada jadwal mendatang
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Notifications -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-semibold text-gray-800">Notifikasi</h2>
                    <button class="text-green-600 hover:text-green-700 text-sm font-medium">Tandai Semua Dibaca</button>
                </div>
                <div class="space-y-4">
                    <div class="flex items-start p-4 bg-blue-50 rounded-lg">
                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center">
                            <i class="fas fa-info-circle text-blue-500"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-900">Selamat datang di BBSPJIA</p>
                            <p class="text-sm text-gray-500">Sistem informasi untuk pengelolaan dokumen, sertifikasi, dan jadwal.</p>
                            <p class="text-xs text-gray-400 mt-1">Hari ini</p>
                        </div>
                    </div>
                    <div class="flex items-start p-4 bg-green-50 rounded-lg">
                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-green-100 flex items-center justify-center">
                            <i class="fas fa-check-circle text-green-500"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-900">Akun berhasil dibuat</p>
                            <p class="text-sm text-gray-500">Anda telah berhasil mendaftar dan login ke sistem.</p>
                            <p class="text-xs text-gray-400 mt-1">Hari ini</p>
                        </div>
                    </div>
                </div>
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

