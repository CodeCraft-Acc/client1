# Panduan Menjalankan Aplikasi dengan Docker (Apache)

Ini adalah panduan untuk menjalankan aplikasi Laravel menggunakan Docker dengan Apache.

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

- **Aplikasi Web**: http://localhost

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

## Perbedaan Antara Windows dan Linux

- Docker pada Windows menggunakan WSL 2 (Windows Subsystem for Linux) untuk menjalankan container Linux.
- Pada server Linux, Docker berjalan secara native.
- Namun, file Docker yang sama dapat berjalan di kedua sistem, asalkan Docker dan Docker Compose terinstal.

## Persiapan untuk Hosting

Untuk persiapan hosting di server Linux:

1. **Clone Repository dan Build di Server (Cara 1)**:
   - Clone repository ke server
   - Jalankan `docker-compose up -d --build`

2. **Build Image dan Push ke Registry (Cara 2)**:
   - Build image di komputer lokal: 
     ```
     docker build -t username/apkjanimarsya:latest .
     ```
   - Push ke Docker Registry:
     ```
     docker push username/apkjanimarsya:latest
     ```
   - Di server, pull image dan jalankan:
     ```
     docker pull username/apkjanimarsya:latest
     docker-compose up -d
     ```

## Troubleshooting

- Jika Anda mengalami masalah dengan permission, jalankan:
  ```
  docker-compose exec app chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
  ```

- Untuk melihat log Apache:
  ```
  docker-compose exec app cat /var/log/apache2/error.log
  ``` 
