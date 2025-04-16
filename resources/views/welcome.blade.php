<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BBSPJIA - Balai Besar Standardisasi dan Pelayanan Jasa Industri Agro</title>
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
        .service-card {
            transition: all 0.3s ease;
        }
        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .gradient-background {
            background: linear-gradient(135deg, #166534 0%, #16a34a 100%);
        }
    </style>
</head>
<body class="font-sans antialiased">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center">
                    <div class="text-2xl font-bold text-green-600">BBSPJIA</div>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#home" class="text-gray-700 hover:text-green-600 font-medium transition duration-300">Beranda</a>
                    <a href="#about" class="text-gray-700 hover:text-green-600 font-medium transition duration-300">Tentang Kami</a>
                    <a href="#services" class="text-gray-700 hover:text-green-600 font-medium transition duration-300">Layanan</a>
                    <a href="#contact" class="text-gray-700 hover:text-green-600 font-medium transition duration-300">Kontak</a>
                    <div class="flex space-x-4 ml-8">
                        <a href="/login" class="px-6 py-2.5 text-green-600 border-2 border-green-600 rounded-lg hover:bg-green-50 transition duration-300 font-medium">Masuk</a>
                        <a href="/register" class="px-6 py-2.5 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-300 font-medium">Daftar</a>
                    </div>
                </div>
                <div class="md:hidden">
                    <button class="mobile-menu-button p-2 rounded-md hover:bg-green-50 focus:outline-none">
                        <i class="fas fa-bars text-gray-600 text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Mobile menu -->
        <div class="mobile-menu hidden md:hidden">
            <div class="px-4 py-4 space-y-3">
                <a href="#home" class="block py-2.5 text-gray-700 hover:text-green-600 font-medium">Beranda</a>
                <a href="#about" class="block py-2.5 text-gray-700 hover:text-green-600 font-medium">Tentang Kami</a>
                <a href="#services" class="block py-2.5 text-gray-700 hover:text-green-600 font-medium">Layanan</a>
                <a href="#contact" class="block py-2.5 text-gray-700 hover:text-green-600 font-medium">Kontak</a>
                <div class="pt-4 space-y-3">
                    <a href="/login" class="block w-full text-center px-6 py-2.5 text-green-600 border-2 border-green-600 rounded-lg hover:bg-green-50 transition duration-300 font-medium">Masuk</a>
                    <a href="/register" class="block w-full text-center px-6 py-2.5 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-300 font-medium">Daftar</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="pt-24 gradient-background">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
            <div class="flex flex-col md:flex-row items-center gap-12">
                <div class="md:w-1/2 text-white">
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight">Balai Besar Standardisasi dan Pelayanan Jasa Industri Agro</h1>
                    <p class="text-xl mb-8 text-green-50">Jaminan Pangan Baik Indonesia</p>
                    <a href="#contact" class="inline-block bg-white text-green-600 px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition duration-300 shadow-lg hover:shadow-xl">Hubungi Kami</a>
                </div>
                <div class="md:w-1/2">
                    <img src="https://bbia.go.id/wp-content/uploads/2022/09/Akreditasi-Layanan.png" alt="Agriculture" class="rounded-2xl shadow-2xl w-full">
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-center mb-16 text-gray-800">Tentang Kami</h2>
            <div class="grid md:grid-cols-3 gap-10">
                <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                    <div class="bg-green-50 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-seedling text-3xl text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4 text-gray-800">Visi</h3>
                    <p class="text-gray-600 leading-relaxed">"Menjadi unit pelaksana teknis yang akuntabel, adaptif, kolaboratif dan berorientasi pelayanan dalam mewujudkan industri agro yang mandiri dan berdaya saing"</p>
                </div>
                <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                    <div class="bg-green-50 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-leaf text-3xl text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4 text-gray-800">Misi</h3>
                    <p class="text-gray-600 leading-relaxed">"Peningkatan kemandirian, daya saing dan kolaborasi industri melalui optimalisasi pemanfaatan teknologi, standardisasi dan jasa industri agro"</p>
                </div>
                <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                    <div class="bg-green-50 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-award text-3xl text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4 text-gray-800">Moto Layanan</h3>
                    <p class="text-gray-600 leading-relaxed">"Kepuasan pelanggan adalah prioritas kami"</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-center mb-16 text-gray-800">Layanan Kami</h2>
            <div class="grid md:grid-cols-3 lg:grid-cols-4 gap-8">
                <!-- Service cards with consistent descriptions -->
                <div class="service-card bg-white p-6 rounded-xl shadow-lg text-center">
                    <div class="bg-green-50 rounded-full p-4 w-16 h-16 mx-auto mb-6 flex items-center justify-center">
                        <i class="fas fa-certificate text-2xl text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-gray-800">PENGUJIAN</h3>
                    <p class="text-gray-600">Layanan pengujian komprehensif untuk memastikan kualitas produk agro</p>
                </div>
                <div class="service-card bg-white p-6 rounded-xl shadow-lg text-center">
                    <div class="bg-green-50 rounded-full p-4 w-16 h-16 mx-auto mb-6 flex items-center justify-center">
                        <i class="fas fa-microscope text-2xl text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-gray-800">KALIBRASI</h3>
                    <p class="text-gray-600">Kalibrasi peralatan untuk menjamin akurasi pengukuran</p>
                </div>
                <div class="service-card bg-white p-6 rounded-xl shadow-lg text-center">
                    <div class="bg-green-50 rounded-full p-4 w-16 h-16 mx-auto mb-6 flex items-center justify-center">
                        <i class="fas fa-check-circle text-2xl text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-gray-800">SERTIFIKASI</h3>
                    <p class="text-gray-600">Sertifikasi produk dan sistem manajemen sesuai standar</p>
                </div>
                <div class="service-card bg-white p-6 rounded-xl shadow-lg text-center">
                    <div class="bg-green-50 rounded-full p-4 w-16 h-16 mx-auto mb-6 flex items-center justify-center">
                        <i class="fas fa-hands-helping text-2xl text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-gray-800">BIMBINGAN TEKNIS</h3>
                    <p class="text-gray-600">Pendampingan dan pelatihan teknis industri agro</p>
                </div>
                <div class="service-card bg-white p-6 rounded-xl shadow-lg text-center">
                    <div class="bg-green-50 rounded-full p-4 w-16 h-16 mx-auto mb-6 flex items-center justify-center">
                        <i class="fas fa-comments text-2xl text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-gray-800">KONSULTANSI</h3>
                    <p class="text-gray-600">Layanan konsultasi pengembangan industri agro</p>
                </div>
                <div class="service-card bg-white p-6 rounded-xl shadow-lg text-center">
                    <div class="bg-green-50 rounded-full p-4 w-16 h-16 mx-auto mb-6 flex items-center justify-center">
                        <i class="fas fa-cogs text-2xl text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-gray-800">OPTIMALISASI TEKNOLOGI</h3>
                    <p class="text-gray-600">Pemanfaatan teknologi untuk efisiensi produksi</p>
                </div>
                <div class="service-card bg-white p-6 rounded-xl shadow-lg text-center">
                    <div class="bg-green-50 rounded-full p-4 w-16 h-16 mx-auto mb-6 flex items-center justify-center">
                        <i class="fas fa-search text-2xl text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-gray-800">INSPEKSI TEKNIS</h3>
                    <p class="text-gray-600">Pemeriksaan dan evaluasi teknis fasilitas produksi</p>
                </div>
                <div class="service-card bg-white p-6 rounded-xl shadow-lg text-center">
                    <div class="bg-green-50 rounded-full p-4 w-16 h-16 mx-auto mb-6 flex items-center justify-center">
                        <i class="fas fa-chart-line text-2xl text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-gray-800">UJI PROFISIENSI</h3>
                    <p class="text-gray-600">Evaluasi kinerja laboratorium pengujian</p>
                </div>
                <div class="service-card bg-white p-6 rounded-xl shadow-lg text-center">
                    <div class="bg-green-50 rounded-full p-4 w-16 h-16 mx-auto mb-6 flex items-center justify-center">
                        <i class="fas fa-vial text-2xl text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-gray-800">SAMPLING & SWAP</h3>
                    <p class="text-gray-600">Pengambilan sampel dan pertukaran spesimen uji</p>
                </div>
                <div class="service-card bg-white p-6 rounded-xl shadow-lg text-center">
                    <div class="bg-green-50 rounded-full p-4 w-16 h-16 mx-auto mb-6 flex items-center justify-center">
                        <i class="fas fa-building text-2xl text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-gray-800">PEMANFAATAN ASET</h3>
                    <p class="text-gray-600">Optimalisasi penggunaan fasilitas dan peralatan</p>
                </div>
                <div class="service-card bg-white p-6 rounded-xl shadow-lg text-center">
                    <div class="bg-green-50 rounded-full p-4 w-16 h-16 mx-auto mb-6 flex items-center justify-center">
                        <i class="fas fa-clock text-2xl text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-gray-800">PENDUGAAN UMUR SIMPAN</h3>
                    <p class="text-gray-600">Analisis dan penentuan masa simpan produk</p>
                </div>
                <div class="service-card bg-white p-6 rounded-xl shadow-lg text-center">
                    <div class="bg-green-50 rounded-full p-4 w-16 h-16 mx-auto mb-6 flex items-center justify-center">
                        <i class="fas fa-check-double text-2xl text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-gray-800">LEMBAGA PEMERIKSA HALAL</h3>
                    <p class="text-gray-600">Pemeriksaan dan sertifikasi kehalalan produk</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-center mb-16 text-gray-800">Hubungi Kami</h2>
            <div class="grid md:grid-cols-2 gap-12">
                <div class="bg-white p-8 rounded-xl shadow-lg">
                    <form class="space-y-6">
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Nama Lengkap</label>
                            <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-300">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Email</label>
                            <input type="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-300">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Pesan</label>
                            <textarea rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-300"></textarea>
                        </div>
                        <button class="w-full bg-green-600 text-white py-3 rounded-lg hover:bg-green-700 transition duration-300 font-medium">Kirim Pesan</button>
                    </form>
                </div>
                <div class="bg-white p-8 rounded-xl shadow-lg">
                    <div class="mb-12">
                        <h3 class="text-2xl font-semibold mb-6 text-gray-800">Informasi Kontak</h3>
                        <div class="space-y-6">
                            <div class="flex items-start">
                                <i class="fas fa-map-marker-alt text-green-600 w-6 mt-1"></i>
                                <span class="text-gray-600 ml-4">Jl. Ir H Juanda No 11 Bogor.16122</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-phone text-green-600 w-6"></i>
                                <span class="text-gray-600 ml-4">(0251) 8324068</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-envelope text-green-600 w-6"></i>
                                <span class="text-gray-600 ml-4">cabi@bbia.go.id</span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-2xl font-semibold mb-6 text-gray-800">Jam Operasional</h3>
                        <div class="text-gray-600 space-y-2">
                            <p class="flex justify-between">
                                <span>Senin - Kamis:</span>
                                <span>07:30 - 16:00</span>
                            </p>
                            <p class="flex justify-between">
                                <span>Jumat:</span>
                                <span>07:30 - 16.30</span>
                            </p>
                            <p class="flex justify-between">
                                <span>Sabtu - Minggu:</span>
                                <span>Tutup</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="gradient-background text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-3 gap-12">
                <div>
                    <h4 class="text-2xl font-semibold mb-6">BBSPJIA</h4>
                    <p class="text-green-50 leading-relaxed">Balai Besar Standardisasi dan Pelayanan Jasa Industri Agro</p>
                </div>
                <div>
                    <h4 class="text-2xl font-semibold mb-6">Tautan Cepat</h4>
                    <ul class="space-y-3">
                        <li><a href="#home" class="text-green-50 hover:text-white transition duration-300">Beranda</a></li>
                        <li><a href="#about" class="text-green-50 hover:text-white transition duration-300">Tentang Kami</a></li>
                        <li><a href="#services" class="text-green-50 hover:text-white transition duration-300">Layanan</a></li>
                        <li><a href="#contact" class="text-green-50 hover:text-white transition duration-300">Kontak</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-2xl font-semibold mb-6">Media Sosial</h4>
                    <div class="flex space-x-6">
                        <a href="https://www.instagram.com/bbia_kemenperin?igsh=MW0ybHdubXc3c2xs" class="text-green-50 hover:text-white transition duration-300 text-2xl">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://youtube.com/@kalibrasibbia8862?si=JPUpEb5RV4T1lspc" class="text-green-50 hover:text-white transition duration-300 text-2xl">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t border-green-600 mt-12 pt-8 text-center">
                <p class="text-green-50">&copy; 2024 Balai Besar Standardisasi dan Pelayanan Jasa Industri Agro. Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button -->
    <button id="scrollToTop" class="fixed bottom-8 right-8 bg-green-600 text-white p-4 rounded-full shadow-lg hidden hover:bg-green-700 transition duration-300">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script>
        // Mobile menu functionality
        const mobileMenuButton = document.querySelector('.mobile-menu-button');
        const mobileMenu = document.querySelector('.mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Scroll to Top functionality
        const scrollToTopButton = document.getElementById('scrollToTop');

        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                scrollToTopButton.classList.remove('hidden');
            } else {
                scrollToTopButton.classList.add('hidden');
            }
        });

        scrollToTopButton.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>