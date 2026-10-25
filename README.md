# ✨ Aurelia Gold — Website Penjualan Emas

<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="350" alt="Laravel Logo">
</p>

<p align="center">
  <strong>Website penjualan emas modern, elegan, responsif, dan mudah digunakan.</strong>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-11-FF2D20?logo=laravel&logoColor=white" alt="Laravel 11">
  <img src="https://img.shields.io/badge/PHP-8.2%2B-777BB4?logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/MySQL-Database-4479A1?logo=mysql&logoColor=white" alt="MySQL">
  <img src="https://img.shields.io/badge/Bootstrap-5-7952B3?logo=bootstrap&logoColor=white" alt="Bootstrap 5">
</p>

## 📌 Tentang Aurelia Gold

**Aurelia Gold** adalah aplikasi website penjualan emas berbasis Laravel 11 yang dirancang untuk memudahkan pelanggan melihat katalog emas, memilih produk, melakukan pemesanan, dan memantau status transaksi.

Aplikasi ini menyediakan dashboard admin untuk mengelola produk emas, stok, harga, pesanan, pelanggan, serta melihat ringkasan penjualan.

Website menggunakan desain bernuansa hitam dan emas dengan tampilan modern, elegan, dan responsif untuk desktop, tablet, maupun smartphone.

## 🚀 Fitur Utama

### 👤 Fitur Pelanggan
- Landing page dengan tampilan premium.
- Registrasi akun dan login.
- Katalog produk emas.
- Pencarian dan filter kategori produk.
- Detail produk, berat, kadar, harga, dan stok.
- Keranjang belanja.
- Checkout dan pencatatan pesanan.
- Pilihan metode pembayaran transfer bank atau COD.
- Riwayat transaksi dan status pesanan.

### 🛠️ Fitur Admin
- Dashboard admin.
- Statistik jumlah produk, pesanan, dan pelanggan.
- Grafik pendapatan bulanan.
- Tambah, lihat, ubah, dan nonaktifkan produk.
- Pengelolaan harga, berat, kadar, serta stok emas.
- Pengelolaan pesanan pelanggan.
- Pembaruan status pesanan dan pembayaran.

### 🎨 Fitur Antarmuka
- Desain modern dengan tema hitam dan emas.
- Bootstrap 5 untuk layout responsif.
- Animasi hover pada kartu produk dan tombol.
- Ikon Bootstrap Icons.
- Grafik menggunakan Chart.js.
- Tampilan katalog dan detail produk yang elegan.

## 🧰 Teknologi yang Digunakan

| Teknologi | Kegunaan |
|---|---|
| Laravel 11 | Backend aplikasi |
| PHP 8.2+ | Bahasa pemrograman |
| MySQL | Database |
| Blade Template | Tampilan halaman |
| Bootstrap 5 | Framework CSS |
| Bootstrap Icons | Ikon antarmuka |
| Chart.js | Grafik penjualan |
| Eloquent ORM | Pengelolaan data database |

## 📂 Struktur Project

```text
aurelia-gold/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/
│   │   │   │   ├── DashboardController.php
│   │   │   │   ├── ProductController.php
│   │   │   │   └── OrderController.php
│   │   │   ├── AuthController.php
│   │   │   ├── CartController.php
│   │   │   ├── OrderController.php
│   │   │   └── StoreController.php
│   │   └── Middleware/
│   │       └── AdminMiddleware.php
│   └── Models/
│       ├── User.php
│       ├── Product.php
│       ├── Order.php
│       └── OrderItem.php
├── bootstrap/
│   └── app.php
├── database/
│   ├── migrations/
│   └── seeders/
│       └── DatabaseSeeder.php
├── public/
│   └── css/
│       └── aurelia.css
├── resources/
│   └── views/
│       ├── layouts/
│       ├── store/
│       ├── auth/
│       ├── cart/
│       ├── orders/
│       └── admin/
├── routes/
│   └── web.php
├── .env
└── README.md
```

## ⚙️ Instalasi dan Konfigurasi

### 1. Persyaratan Sistem

Pastikan perangkat sudah memiliki:
- PHP 8.2 atau lebih baru yang kompatibel dengan Laravel 11.
- Composer.
- MySQL atau MariaDB.
- Web browser.
- Git (opsional).

### 2. Buat Project Laravel

Jika memulai dari awal, jalankan:

```bash
composer create-project laravel/laravel:^11.0 aurelia-gold
cd aurelia-gold
```

Salin file aplikasi Aurelia Gold ke folder project Laravel tersebut. Gabungkan file yang tersedia dan periksa perubahan sebelum menimpa file bawaan.

### 3. Buat Database

Buat database baru melalui phpMyAdmin atau MySQL:

```sql
CREATE DATABASE aurelia_gold;
```

### 4. Konfigurasi File `.env`

Buka file `.env`, lalu sesuaikan konfigurasi berikut:

```env
APP_NAME="Aurelia Gold"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=aurelia_gold
DB_USERNAME=root
DB_PASSWORD=
```

Sesuaikan `DB_USERNAME` dan `DB_PASSWORD` dengan konfigurasi database lokal.

### 5. Generate Application Key

```bash
php artisan key:generate
```

### 6. Jalankan Migration dan Seeder

```bash
php artisan migrate --seed
```

Perintah tersebut membuat tabel database dan memasukkan data awal produk beserta akun admin demo.

Jika ingin mengulang seluruh database dari awal, gunakan perintah berikut hanya pada lingkungan pengembangan karena seluruh tabel akan dihapus dan dibuat kembali:

```bash
php artisan migrate:fresh --seed
```

### 7. Jalankan Server

```bash
php artisan serve
```

Buka website melalui browser:

http://127.0.0.1:8000

## 🔐 Akun Admin Demo

Seeder menyediakan akun admin berikut untuk pengujian lokal:

| Informasi | Nilai |
|---|---|
| Email | `admin@aureliagold.test` |
| Password | `password` |

**Penting:** akun tersebut hanya untuk pengembangan. Ganti password sebelum aplikasi digunakan di lingkungan publik.

## 🗄️ Struktur Database

### Tabel `users`
Menyimpan akun pelanggan dan admin, termasuk nama, email, password, nomor telepon, alamat, dan hak akses admin.

### Tabel `products`
Menyimpan informasi produk emas, meliputi:
- Nama dan kategori produk.
- Berat dalam gram.
- Kadar emas.
- Harga jual.
- Jumlah stok.
- URL gambar.
- Status aktif produk.

### Tabel `orders`
Menyimpan informasi transaksi, nomor pesanan, pelanggan, alamat pengiriman, total pembayaran, metode pembayaran, dan status pesanan.

### Tabel `order_items`
Menyimpan rincian setiap produk yang dipesan, jumlah pembelian, harga saat transaksi, dan subtotal per produk.

## 🛒 Alur Transaksi

1. Pelanggan membuka katalog produk.
2. Pelanggan memilih produk emas.
3. Produk ditambahkan ke keranjang.
4. Pelanggan login atau mendaftar.
5. Pelanggan mengisi informasi checkout.
6. Sistem memvalidasi stok dan mencatat pesanan.
7. Stok produk diperbarui.
8. Admin memeriksa dan memperbarui status pesanan.
9. Pelanggan dapat memantau status transaksi melalui halaman Pesanan Saya.

## 📈 Dashboard dan Laporan

Dashboard admin menampilkan:
- Total produk.
- Total pesanan.
- Jumlah pelanggan.
- Pendapatan dari pesanan dengan status pembayaran `paid`.
- Grafik pendapatan per bulan.
- Daftar pesanan terbaru.

Grafik pendapatan menggunakan data transaksi yang sudah ditandai sebagai telah dibayar.

## 🔒 Keamanan Aplikasi

Aplikasi menggunakan fitur keamanan dasar Laravel, seperti:
- Proteksi CSRF pada form.
- Validasi input.
- Hash password.
- Middleware autentikasi.
- Pembatasan akses dashboard admin.
- Transaksi database saat membuat pesanan.
- Pengecekan stok sebelum transaksi disimpan.

Untuk penggunaan produksi, tambahkan pengujian keamanan, pembatasan percobaan login, logging aktivitas admin, konfigurasi HTTPS, backup database, dan pemeriksaan otorisasi secara menyeluruh.

## 💳 Integrasi Pembayaran

Versi awal Aurelia Gold mencatat pesanan dengan status pembayaran `pending`. Status pembayaran dapat diperbarui oleh admin.

**Payment gateway belum terintegrasi secara otomatis.** Untuk menerima pembayaran sungguhan, integrasikan penyedia seperti Midtrans atau layanan lain yang sesuai, termasuk verifikasi callback pembayaran di sisi server.

Harga produk pada versi ini juga dikelola admin dan belum mengambil harga emas real-time dari penyedia data pasar.

## 🧪 Perintah Pengembangan

Melihat seluruh route:

```bash
php artisan route:list
```

Menghapus cache konfigurasi:

```bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear
```

Menjalankan pengujian Laravel:

```bash
php artisan test
```

## 📚 Referensi

- Laravel: https://laravel.com
- Dokumentasi Laravel 11: https://laravel.com/docs/11.x
- Bootstrap: https://getbootstrap.com
- MySQL: https://dev.mysql.com/doc/
- Chart.js: https://www.chartjs.org
- Bootstrap Icons: https://icons.getbootstrap.com

## 🤝 Kontribusi

Pengembangan aplikasi dapat dilanjutkan dengan menambahkan fitur upload gambar, harga emas real-time, payment gateway, invoice PDF, laporan Excel, notifikasi pesanan, serta pengelolaan pengiriman.

## 📄 Lisensi

Framework Laravel menggunakan lisensi MIT. Lisensi dan hak penggunaan komponen lain mengikuti ketentuan masing-masing dependensi.

---

<p align="center">
  <strong>Aurelia Gold</strong><br>
  Investasi nilai, sentuhan elegansi.
</p>
