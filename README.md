# ☕ CHENDORA CAFÉ

### Sistem Manajemen Café Berbasis Web

Chendora Café adalah aplikasi berbasis web yang dikembangkan menggunakan Laravel untuk membantu pengelolaan menu café, resep, serta data pengguna/admin.

Aplikasi ini memiliki tampilan dengan konsep café yang menggunakan perpaduan warna cokelat, cream, dan nuansa natural untuk memberikan tampilan yang sederhana dan elegan.

---

## ✨ Fitur Utama

### 🔐 Authentication

Chendora memiliki sistem autentikasi untuk mengelola akses pengguna.

Fitur yang tersedia:

- Login menggunakan username dan password
- Register akun
- Remember Me
- Forgot Password
- Email Verification
- Resend Verification Email
- Logout
- Validasi input

---

### 🍽️ Manajemen Menu

Halaman Menu digunakan untuk mengelola daftar makanan dan minuman yang tersedia di Chendora Café.

Fitur yang tersedia:

- Menampilkan daftar menu
- Tambah produk
- Edit produk
- Hapus produk
- Filter berdasarkan kategori
- Kategori Makanan dan Minuman
- Menampilkan deskripsi produk
- Menampilkan harga dalam format Rupiah
- Upload dan menampilkan gambar produk
- Modal untuk melihat deskripsi produk

Informasi produk yang ditampilkan meliputi:

- Nama Produk
- Kategori
- Deskripsi
- Harga
- Gambar

---

### 🍰 Manajemen Resep

Halaman Resep digunakan untuk mengelola resep yang digunakan dalam Chendora Café.

Fitur yang tersedia:

- Menampilkan daftar resep
- Tambah resep
- Edit resep
- Hapus resep
- Menampilkan nama resep
- Menampilkan bahan
- Menampilkan langkah pembuatan
- Upload dan menampilkan gambar resep
- Modal untuk melihat bahan
- Modal untuk melihat langkah pembuatan

---

### 👥 Manajemen User

Fitur User digunakan oleh Admin untuk mengelola data pengguna.

Fitur yang tersedia:

- Menampilkan daftar pengguna
- Tambah User
- Edit User
- Hapus User
- Role Admin
- Role User
- Menampilkan email pengguna
- Menampilkan tanggal pembuatan akun
- Pagination

---

### 👤 Role Pengguna

Chendora memiliki dua jenis role:

| Role | Akses |
|---|---|
| Admin | Dapat mengakses dan mengelola User |
| User | Menggunakan fitur yang tersedia untuk pengguna |

Menu **Users** hanya ditampilkan kepada pengguna yang memiliki role Admin.

---

## 🎨 Tampilan Antarmuka

Chendora Café menggunakan konsep desain café dengan perpaduan warna cokelat dan cream.

### 🎨 Color Palette

| Elemen | Warna |
|---|---|
| Primary Brown | `#5a3d2b` |
| Dark Brown | `#4b0e0c` |
| Accent Brown | `#6b1b13` |
| Cream Background | `#fffaf6` |
| Light Cream | `#fffdf9` |
| Green Accent | `#bcd9b4` |
| Gold Accent | `#e3a008` |

### 🔤 Font

- Poppins

### 🛠️ UI Framework

- Bootstrap 5.3

---

## 🛠️ Teknologi yang Digunakan

| Teknologi | Penggunaan |
|---|---|
| PHP | Bahasa pemrograman |
| Laravel | Web framework |
| Laravel Blade | Template engine |
| MySQL | Database |
| Bootstrap 5.3 | User Interface |
| HTML | Struktur halaman |
| CSS | Styling |
| JavaScript | Interaksi halaman |
| Laravel Storage | Penyimpanan gambar |

---

## 📂 Struktur Project

```text
CHENDORA/
│
├── app/
│   ├── Http/
│   │   └── Controllers/
│   ├── Models/
│   └── Providers/
│
├── bootstrap/
│
├── config/
│
├── database/
│   ├── migrations/
│   ├── factories/
│   └── seeders/
│
├── public/
│
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
│       ├── layouts/
│       ├── auth/
│       ├── product/
│       ├── resep/
│       └── admin/
│
├── routes/
│   └── web.php
│
├── storage/
│   └── app/
│       └── public/
│
├── tests/
│
├── .env.example
├── artisan
├── composer.json
├── composer.lock
└── README.md



---

---

## 🖥️ Preview Website

### 🏠 Dashboard
![Dashboard Chendora Café](docs/dashboard.jpeg)

### 🔐 Login
![Login Chendora Café](docs/login.jpeg)

### 📝 Register
![Register Chendora Café](docs/register.jpeg)

### 🍰 Daftar Resep
![Daftar Resep Chendora Café](docs/resep.jpeg)

---