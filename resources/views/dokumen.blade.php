<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumen - BBSPJIA</title>
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

        <!-- Document Content -->
        <div class="p-6">
            <!-- Header Section -->
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Dokumen</h1>
                <p class="text-gray-600">Kelola dokumen SPPCA dan SPPKA</p>
            </div>

            <!-- Action Buttons -->
            <div class="mb-6 flex justify-between items-center">
                <div class="flex space-x-4">
                    <a href="{{ route('documents.index', ['category' => 'SPPCA']) }}" class="px-4 py-2 {{ request('category') == 'SPPCA' ? 'bg-blue-600 text-white' : 'bg-blue-100 text-blue-800' }} rounded-lg hover:bg-blue-700 hover:text-white transition duration-200">
                        <i class="fas fa-filter mr-2"></i>SPPCA
                    </a>
                    <a href="{{ route('documents.index', ['category' => 'SPPKA']) }}" class="px-4 py-2 {{ request('category') == 'SPPKA' ? 'bg-green-600 text-white' : 'bg-green-100 text-green-800' }} rounded-lg hover:bg-green-700 hover:text-white transition duration-200">
                        <i class="fas fa-filter mr-2"></i>SPPKA
                    </a>
                    <a href="{{ route('documents.index', ['category' => 'Dokumen Arsip']) }}" class="px-4 py-2 {{ request('category') == 'Dokumen Arsip' ? 'bg-purple-600 text-white' : 'bg-purple-100 text-purple-800' }} rounded-lg hover:bg-purple-700 hover:text-white transition duration-200">
                        <i class="fas fa-archive mr-2"></i>DOKUMEN ARSIP
                    </a>
                </div>
                <a href="{{ route('documents.index', ['action' => 'add']) }}" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-200">
                    <i class="fas fa-plus mr-2"></i>Tambah Dokumen
                </a>
            </div>

            <!-- Upload Form -->
            @if(request('action') == 'add')
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 mb-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Upload Dokumen Baru</h2>
                <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                            <select name="category" id="category" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                                <option value="">Pilih Kategori</option>
                                <option value="SPPCA">SPPCA</option>
                                <option value="SPPKA">SPPKA</option>
                                <option value="Dokumen Arsip">Dokumen Arsip</option>
                            </select>
                            @error('category')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Tahun</label>
                            <input type="number" name="year" min="2000" max="{{ date('Y') + 1 }}" value="{{ date('Y') }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            @error('year')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Judul Dokumen</label>
                        <input type="text" name="title" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                        <textarea name="description" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"></textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Perusahaan/Laboratorium</label>
                        <input type="text" name="laboratory" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        @error('laboratory')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">File</label>
                        <input type="file" name="file" accept=".pdf,.doc,.docx,.xls,.xlsx" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        <p class="text-xs text-gray-500 mt-1">Format yang didukung: PDF, DOC, DOCX, XLS, XLSX (Maks. 10MB)</p>
                        @error('file')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-200">
                            <i class="fas fa-upload mr-2"></i>Upload
                        </button>
                    </div>
                </form>
            </div>
            @endif

            <!-- Documents List -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Dokumen</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tahun</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Upload</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ukuran</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($documents as $document)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 flex items-center justify-center rounded-lg bg-gray-100">
                                            @if($document->file_type == 'pdf')
                                                <i class="fas fa-file-pdf text-red-500"></i>
                                            @elseif($document->file_type == 'doc' || $document->file_type == 'docx')
                                                <i class="fas fa-file-word text-blue-500"></i>
                                            @elseif($document->file_type == 'xls' || $document->file_type == 'xlsx')
                                                <i class="fas fa-file-excel text-green-500"></i>
                                            @else
                                                <i class="fas fa-file text-gray-500"></i>
                                            @endif
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $document->title }}</div>
                                            <div class="text-sm text-gray-500">{{ Str::limit($document->description, 50) }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        {{ $document->category == 'SPPCA' ? 'bg-blue-100 text-blue-800' : 
                                           ($document->category == 'SPPKA' ? 'bg-green-100 text-green-800' : 
                                           'bg-purple-100 text-purple-800') }}">
                                        {{ $document->category }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $document->year }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $document->created_at->format('d M Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ number_format($document->file_size / 1024, 2) }} KB
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('documents.download', $document) }}" class="text-green-600 hover:text-green-900 mr-3">
                                        <i class="fas fa-download"></i>
                                    </a>
                                    <a href="{{ route('documents.show', $document) }}" class="text-blue-600 hover:text-blue-900 mr-3">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <form action="{{ route('documents.destroy', $document) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Apakah Anda yakin ingin menghapus dokumen ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                    Belum ada dokumen
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Dokumen Arsip -->
            <div class="mt-6 bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center space-x-4">
                        <h2 class="text-lg font-semibold text-gray-800">Dokumen Arsip</h2>
                        <span class="px-2 py-1 text-xs font-medium bg-blue-100 text-blue-800 rounded-full">Nota Dinas</span>
                    </div>
                    <a href="{{ route('documents.index', ['action' => 'add', 'category' => 'Dokumen Arsip']) }}" class="px-3 py-1 text-sm text-green-600 hover:text-green-700 border border-green-300 rounded-md hover:bg-green-50">
                        <i class="fas fa-plus mr-1"></i> Tambah Dokumen Arsip
                    </a>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nomor</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Dokumen/Hal</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Perusahaan</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tahun</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Upload</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse(\App\Models\Document::where('category', 'Dokumen Arsip')->latest()->get() as $document)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $document->id }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $document->title }}</div>
                                    <div class="text-sm text-gray-500">{{ Str::limit($document->description, 50) }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $document->laboratory }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $document->year }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $document->created_at->format('d M Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('documents.download', $document) }}" class="text-green-600 hover:text-green-900 mr-3">
                                        <i class="fas fa-download"></i>
                                    </a>
                                    <a href="{{ route('documents.show', $document) }}" class="text-blue-600 hover:text-blue-900 mr-3">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <form action="{{ route('documents.destroy', $document) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Apakah Anda yakin ingin menghapus dokumen ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                    Belum ada dokumen arsip
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- PDF Modal -->
    <div id="pdfModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center">
        <div class="bg-white rounded-lg w-11/12 max-w-4xl h-5/6 flex flex-col">
            <div class="p-4 border-b flex justify-between items-center">
                <h3 class="text-lg font-semibold">Hasil Label Scan - Dokumen #2508</h3>
                <button onclick="closePdfModal()" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="flex-1 p-4 overflow-auto">
                <iframe id="pdfViewer" src="" class="w-full h-full border-0"></iframe>
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

        // PDF Modal Functions
        function openPdfModal() {
            document.getElementById('pdfModal').classList.remove('hidden');
            document.getElementById('pdfViewer').src = '/storage/sample.pdf'; // Replace with actual PDF path
        }

        function closePdfModal() {
            document.getElementById('pdfModal').classList.add('hidden');
            document.getElementById('pdfViewer').src = '';
        }
    </script>
</body>
</html> 