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

### 2. Menjalankan Website

1. Pastikan server lokal Anda (XAMPP/WAMP) sedang berjalan.
2. Buka browser, lalu akses:
   ```
   http://localhost/rolex
   ```

Website akan tampil di browser Anda.

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

## 🔐 Halaman Login
Untuk mengakses halaman login, buka browser dan navigasikan ke:

```bash
http://localhost:port/rolex/login
```

Masukkan username dan password berikut:

* Username: admin
* Password: 123123

Jika login berhasil, Anda akan diarahkan ke halaman dashboard.

---

