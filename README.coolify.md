# Panduan Deployment Laravel dengan Coolify

Berikut adalah panduan untuk menjalankan aplikasi Laravel ini dengan Coolify.

## Langkah-langkah Setup di Coolify

1. **Login ke Dashboard Coolify**

2. **Membuat Project Baru**
   - Klik "Projects" dari menu sidebar
   - Klik "+ Add" untuk membuat project baru
   - Isi nama project dan pilih environment

3. **Menambahkan Resource Baru**
   - Di dalam project, klik "Add New Resource"
   - Pada bagian "Docker based", pilih "Dockerfile"

4. **Konfigurasi Deployment**
   - **Repository**: Pilih repository dari Git source Anda
   - **Branch**: Pilih branch yang ingin di-deploy (biasanya `main` atau `master`)
   - **Build Pack**: Pilih "Dockerfile"
   - **Dockerfile Location**: `/Dockerfile`
   - **Port Exposes**: `80`
   - **Domain**: Masukkan domain Anda

5. **Konfigurasi Environment Variables**
   - Pada tab "Environment Variables", klik "Developer View"
   - Tambahkan variabel-variabel berikut:
     ```
     APP_URL=https://domain-anda.com
     DB_HOST=nama-host-database
     DB_PORT=3306
     DB_DATABASE=nama-database
     DB_USERNAME=username-database
     DB_PASSWORD=password-database
     REDIS_HOST=nama-host-redis (opsional)
     REDIS_PASSWORD=password-redis (opsional)
     REDIS_PORT=6379 (opsional)
     ```

6. **Deploy Aplikasi**
   - Klik tombol "Deploy" untuk memulai proses deployment
   - Tunggu hingga proses build dan deployment selesai

## Menambahkan Database (MySQL)

1. Klik "Add New Resource" di project yang sama
2. Pilih "MySQL" di bagian "Databases"
3. Konfigurasi database:
   - Username: buat username
   - Password: buat password yang kuat
   - Database: buat nama database
4. Klik "Start" untuk menjalankan database
5. Catat informasi koneksi untuk digunakan di aplikasi Laravel

## Post Deployment

Setelah aplikasi berhasil di-deploy, jalankan migrasi database:

1. Masuk ke tab "Terminal" pada resource aplikasi Laravel
2. Jalankan perintah berikut:
   ```
   php artisan migrate --force
   ```

## Troubleshooting

### Masalah Permission Storage

Jika terjadi masalah permission pada direktori storage, jalankan perintah berikut di Terminal Coolify:

```
chown -R www-data:www-data /app/storage
chmod -R 775 /app/storage
```

### Melihat Log Apache

Untuk melihat log Apache, gunakan perintah berikut di Terminal Coolify:

```
cat /var/log/apache2/error.log
```

### Melihat Log Laravel

Untuk melihat log Laravel, gunakan perintah berikut di Terminal Coolify:

```
cat /app/storage/logs/laravel.log
``` 
