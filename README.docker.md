# Panduan Menjalankan Aplikasi dengan Docker

Ini adalah panduan untuk menjalankan aplikasi Laravel menggunakan Docker.

## Persyaratan

- Docker
- Docker Compose

## Langkah-langkah Menjalankan Aplikasi

1. **Clone Repository**

   ```
   git clone <repository-url>
   cd <repository-directory>
   ```

2. **Build dan Jalankan Container**

   ```
   docker-compose up -d --build
   ```

   Perintah ini akan membangun image Docker dan menjalankan container berdasarkan konfigurasi dalam `docker-compose.yml`.

3. **Jalankan Migrasi Database**

   ```
   docker-compose exec app php artisan migrate
   ```

   Perintah ini akan menjalankan migrasi database untuk membuat tabel-tabel yang diperlukan.

4. **Generate Key Aplikasi (jika diperlukan)**

   ```
   docker-compose exec app php artisan key:generate
   ```

5. **Cache Konfigurasi (Opsional)**

   ```
   docker-compose exec app php artisan config:cache
   ```

## Akses Aplikasi

Setelah container berjalan, Anda dapat mengakses aplikasi melalui:

- **Aplikasi Web**: http://localhost:8000

## Perintah Berguna

- Melihat log container:
  ```
  docker-compose logs -f
  ```

- Menghentikan container:
  ```
  docker-compose down
  ```

- Menghentikan container dan menghapus volume:
  ```
  docker-compose down -v
  ```

- Eksekusi perintah dalam container:
  ```
  docker-compose exec app <command>
  ```

## Konfigurasi Database

Database MySQL berjalan di container terpisah. Konfigurasi database:

- **Host**: db
- **Port**: 3306
- **Database**: apkjanimarsya
- **Username**: root
- **Password**: password

## Persiapan untuk Hosting

Untuk persiapan hosting, Anda perlu:

1. Build image Docker:
   ```
   docker build -t apkjanimarsya .
   ```

2. Push image ke registry Docker seperti Docker Hub atau registry privat:
   ```
   docker tag apkjanimarsya <username>/apkjanimarsya:latest
   docker push <username>/apkjanimarsya:latest
   ```

3. Di server hosting, pull image dan jalankan container:
   ```
   docker pull <username>/apkjanimarsya:latest
   docker-compose up -d
   ``` 
