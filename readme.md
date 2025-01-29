# Rolex Branding Website (PHP Native)

Proyek ini adalah sebuah website branding untuk Rolex yang menggunakan PHP native. Proyek ini dikembangkan oleh Kelompok 3 Pemrograman Web.

## 📋 Langkah-langkah Setup Proyek

Ikuti langkah-langkah berikut untuk menyiapkan proyek ini di lingkungan lokal Anda:

### 1. Clone Repository

Clone repository ke folder `htdocs` (XAMPP) atau `www` (WAMP).

```bash
git clone https://github.com/kelompok-3-pemograman-web/rolex.git
```

Pindahkan folder hasil clone ke lokasi sesuai dengan server lokal Anda:

- **XAMPP**: `C:/xampp/htdocs/rolex`
- **WAMP**: `C:/wamp/www/rolex`

### 2. Mengubah Konfigurasi Database

Setelah folder proyek berada di lokasi yang tepat, buka file `config/db.php`, lalu ubah bagian konfigurasi koneksi database seperti berikut:

```php
$servername = "localhost:3306";
```

### 3. Menjalankan MySQL

Pastikan server lokal Anda (XAMPP/WAMP) sedang berjalan dan MySQL sudah aktif.

- **XAMPP**: Pastikan Apache dan MySQL berjalan.
- **WAMP**: Pastikan WAMP berwarna hijau, yang menandakan server berjalan.

### 4. Jalankan `schema.sql`

Untuk membuat struktur database yang diperlukan oleh proyek ini, jalankan file `schema.sql` yang ada di dalam folder proyek.

1. Buka **phpMyAdmin** di browser (biasanya diakses di `http://localhost/phpmyadmin`).
2. Pilih tab **Import**, pilih file `schema.sql` yang ada di folder proyek Anda.
3. Klik **Go** untuk mengimpor dan membuat struktur database.

File `schema.sql` ini akan membuat database dan semua tabel dan relasi yang diperlukan untuk menjalankan aplikasi dengan benar.

### 5. Menjalankan Website

Setelah database terkonfigurasi, buka browser dan akses **halaman utama** dengan URL berikut:

```text
http://localhost
```

- Untuk mengakses **dashboard admin**, buka URL berikut dan masukkan kredensial login:

```text
http://localhost/login
```

**Kredensial login**:

- **Username**: admin
- **Password**: 123123

---

## 🌲 Workflow Pengembangan

### Branching dan Pull Request

Untuk pengembangan fitur, ikuti workflow berikut:

1. **Buat Branch Baru**\
   Setiap fitur harus dikerjakan di branch terpisah. Nama branch sebaiknya deskriptif. Contoh:

   ```bash
   git checkout -b fitur-navbar
   ```

2. **Pengembangan Fitur**\
   Kerjakan fitur sesuai branch yang telah dibuat.

3. **Commit Perubahan**\
   Setelah selesai, commit perubahan Anda.

   ```bash
   git add .
   git commit -m "Menambahkan fitur navbar"
   ```

4. **Push ke Repository**\
   Push branch ke repository:

   ```bash
   git push origin fitur-navbar
   ```

5. **Buat Pull Request (PR)**\
   Setelah push selesai, buat Pull Request di GitHub untuk mereview dan menggabungkan perubahan ke branch utama (`main` atau `master`).

---

## 🗂 Struktur Direktori

Berikut adalah struktur dasar direktori proyek ini:

```
rolex/
├── assets/         # Folder untuk aset publik
├── config/         # Folder untuk konfigurasi database dan autentikasi
│   ├── auth.php    # File autentikasi
│   └── db.php      # File konfigurasi database
├── dashboard/      # Halaman dashboard admin
│   └── index.php
├── includes/       # Folder untuk file yang di-include
├── login/          # Halaman login
│   └── index.php
├── news/           # Halaman artikel
│   └── index.php
├── products/       # Halaman produk
│   └── index.php
├── index.php       # Halaman utama website
├── schema.sql      # File schema untuk database
└── README.md       # Dokumentasi proyek
```

---

## 🛠 Tools yang Dibutuhkan

1. **XAMPP atau WAMP**\
   Sebagai server lokal untuk menjalankan aplikasi PHP.
2. **Git**\
   Untuk cloning repository dan pengelolaan kode.
3. **Browser**\
   Untuk mengakses website melalui `localhost`.

---
