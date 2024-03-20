# Ebook Viewer App

Aplikasi ini memungkinkan pengguna untuk melihat file PDF dan membaca ebook secara online. 

## Cara Menjalankan Aplikasi

1. Pastikan Anda telah menginstal PHP dan Composer di sistem Anda.

2. Clone repositori ini ke komputer Anda:

    ```bash
    git clone https://github.com/robbirodhiyan/ebookTest.git
    ```

3. Masuk ke direktori aplikasi:

    ```bash
    cd ebookTest
    ```

4. Instal semua dependensi menggunakan Composer:

    ```bash
    composer install
    ```

5. Salin file `.env.example` dan beri nama `.env`:

    ```bash
    cp .env.example .env
    ```

6. Generate kunci aplikasi:

    ```bash
    php artisan key:generate
    ```

7. Atur koneksi database di file `.env`.

8. Jalankan migrasi untuk membuat skema database:

    ```bash
    php artisan migrate
    ```

9. Jalankan server pengembangan:

    ```bash
    php artisan serve
    ```

10. Akses aplikasi di browser Anda melalui URL:

    ```
    http://localhost:8000
    ```

## Penggunaan

1. Tambahkan ebook baru melalui tombol "Tambah Ebook".

2. Lihat daftar ebook yang ada dan klik tombol "Lihat" untuk membuka ebook.

3. Ebook akan dibuka dalam tampilan PDF di jendela browser Anda. Anda tidak diperbolehkan berpindah tab selama ebook sedang terbuka.

