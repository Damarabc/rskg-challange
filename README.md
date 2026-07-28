# Sistem Manajemen Data Pasien RS

Aplikasi berbasis web sederhana untuk mengelola data pasien rumah sakit dengan sistem Single Page Application (SPA).

## Tech Stack yang digunakan

Aplikasi ini menggunakan arsitektur monolitik :
- **Backend:** Laravel 11 (PHP)
- **Frontend:** Vue 3 (Composition API) & Tailwind CSS
- **Bridge:** Inertia.js (Membuat Laravel & Vue bekerja sebagai Single Page Application tanpa reload)
- **Database:** MySQL


## Fitur Utama

1. **Sistem Autentikasi & Hak Akses (Role)**
   Terdapat dua jenis pengguna:
   - **Admin:** Memiliki akses penuh (CRUD data pasien).
   - **Staff / Resepsionis:** Akses terbatas (Bisa menambah, melihat, dan mengedit data, tetapi **tidak bisa menghapus data**).
2. **Keamanan Middleware**
   Fitur hapus (Delete) dilindungi oleh Middleware di sisi *backend*. Jika ada *user* selain Admin yang mencoba memaksa menghapus data via URL/API, sistem akan otomatis menolak dengan error 403 (Forbidden).
3. **CRUD Pasien yang Interaktif**
   Pengelolaan data berjalan sangat cepat tanpa *loading* halaman berkat kombinasi Vue 3 dan Inertia.js.


## Akun Testing (Dummy)

Gunakan akun berikut untuk mencoba aplikasinya secara langsung. Keduanya sudah tersedia secara otomatis saat Anda melakukan instalasi.

**Akun Admin (Memiliki akses penuh, termasuk hapus data)**
*   Email: `admin@rs.com`
*   Password: `password123`

**Akun Staff / Resepsionis (Hanya bisa melihat, menambah, dan mengedit)**
*   Email: `staff@rs.com`
*   Password: `password123`


---

## How to Use

Required to use **PHP (min. versi 8.2), Composer, Node.js, & MySQL**. 


**1. Clone Repository**

```bash
git clone [https://github.com/Damarabc/rskg-challange.git](https://github.com/Damarabc/rskg-challange.git)
cd rskg-challange

**2. Install Dependencies**

composer install
npm install

**3. Setup Environment**

cp .env.example .env
php artisan key:generate

**4. Migrasi & Seeder**

php artisan migrate --seed

**5. Run App**

- **Terminal 1 for Run Backend:** php artisan serve
- **Terminal 2 for Run Frontend:** npm run dev
