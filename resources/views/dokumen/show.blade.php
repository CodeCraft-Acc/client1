<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Dokumen - BBSPJIA</title>
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
                <a href="{{ route('documents.index') }}" class="flex items-center space-x-3 px-4 py-3 text-gray-700 bg-gray-100 rounded-lg">
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

        <!-- Document Detail Content -->
        <div class="p-6">
            <!-- Header Section -->
            <div class="mb-6 flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Detail Dokumen</h1>
                    <p class="text-gray-600">Informasi lengkap dokumen</p>
                </div>
                <a href="{{ route('documents.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition duration-200">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                </a>
            </div>

            <!-- Document Detail Card -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Document Info -->
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800 mb-4">Informasi Dokumen</h2>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Nomor Dokumen</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $document->id }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Judul Dokumen</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $document->title }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Deskripsi</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $document->description }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Kategori</label>
                                <p class="mt-1">
                                    <span class="px-2 py-1 text-xs font-medium rounded-full {{ $document->category == 'SPPCA' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                                        {{ $document->category }}
                                    </span>
                                </p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Nama Perusahaan</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $document->laboratory }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Tahun</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $document->year }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Tanggal Upload</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $document->created_at->format('d M Y H:i') }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Ukuran File</label>
                                <p class="mt-1 text-sm text-gray-900">{{ number_format($document->file_size / 1024, 2) }} KB</p>
                            </div>
                        </div>
                    </div>

                    <!-- Document Preview -->
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800 mb-4">Preview Dokumen</h2>
                        <div class="border border-gray-200 rounded-lg p-4 h-96 flex items-center justify-center bg-gray-50">
                            @if($document->file_type == 'pdf')
                                <iframe src="{{ route('documents.download', $document) }}" class="w-full h-full border-0"></iframe>
                            @else
                                <div class="text-center">
                                    <div class="h-20 w-20 mx-auto rounded-lg bg-gray-100 flex items-center justify-center mb-4">
                                        @if($document->file_type == 'doc' || $document->file_type == 'docx')
                                            <i class="fas fa-file-word text-blue-500 text-3xl"></i>
                                        @elseif($document->file_type == 'xls' || $document->file_type == 'xlsx')
                                            <i class="fas fa-file-excel text-green-500 text-3xl"></i>
                                        @else
                                            <i class="fas fa-file text-gray-500 text-3xl"></i>
                                        @endif
                                    </div>
                                    <p class="text-sm text-gray-500">Preview tidak tersedia untuk file ini</p>
                                    <a href="{{ route('documents.download', $document) }}" class="mt-4 inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-200">
                                        <i class="fas fa-download mr-2"></i>Download
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-6 flex justify-end space-x-3">
                    <a href="{{ route('documents.download', $document) }}" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-200">
                        <i class="fas fa-download mr-2"></i>Download
                    </a>
                    <a href="{{ route('documents.edit', $document) }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">
                        <i class="fas fa-edit mr-2"></i>Edit
                    </a>
                    <form action="{{ route('documents.destroy', $document) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition duration-200" onclick="return confirm('Apakah Anda yakin ingin menghapus dokumen ini?')">
                            <i class="fas fa-trash mr-2"></i>Hapus
                        </button>
                    </form>
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