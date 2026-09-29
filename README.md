# Katalog UMKM Siswa SMK (Laravel)

Aplikasi website katalog produk UMKM siswa SMK menggunakan **Laravel 10**.

Tugas Praktik Demonstrasi — Sertifikasi Junior Web Developer (JWD).

## Persyaratan

- PHP **8.1** atau lebih tinggi (Laravel 10)
- Composer
- MySQL / MariaDB
- Laragon / XAMPP

> **Catatan:** Jika Laragon masih PHP 8.1.10, Laravel 10 sudah kompatibel.
> Error sebelumnya (`require PHP >= 8.2`) berasal dari proyek Laravel **lain** (`laravel_flutter_rafi`), bukan proyek ini.

## Cara Install di Laragon

### 1. Extract folder
Extract ZIP ke:
```
C:\laragon\www\JWD_Katalog_UMKM_Laravel
```

### 2. Install dependency
Buka terminal di folder proyek:
```bash
cd C:\laragon\www\JWD_Katalog_UMKM_Laravel
composer install
```

Jika ada error security advisory:
```bash
composer config audit.block-insecure false
composer install
```

### 3. Setup environment
```bash
copy .env.example .env
php artisan key:generate
```

Edit file `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_katalog_umkm
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Buat database & migrate
1. Buka phpMyAdmin → buat database `db_katalog_umkm`
2. Jalankan:
```bash
php artisan migrate --seed
```

### 5. Jalankan
```
http://localhost/JWD_Katalog_UMKM_Laravel/public
```

Atau:
```bash
php artisan serve
```
Lalu buka: `http://127.0.0.1:8000`

## Fitur

- Beranda (hero, statistik, preview produk)
- Katalog (kartu + filter kategori + pencarian)
- Detail produk
- Admin CRUD (Tambah, Lihat, Ubah, Hapus)
- Validasi form (Laravel Validation)
- UI responsif (Bootstrap 5)
- Struktur MVC Laravel rapi

## Library Pre-Existing

Bootstrap 5.3.3 (CDN) — grid, navbar, cards, forms, validation, buttons, badges, alerts, tables.
