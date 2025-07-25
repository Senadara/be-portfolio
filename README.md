# 🚀 Backend Portfolio Senadara

![Laravel](https://img.shields.io/badge/Laravel-10.x-red?logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.1%2B-blue?logo=php)
![Filament](https://img.shields.io/badge/Filament-Admin%20Panel-orange)
![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)

API backend modern berbasis Laravel untuk manajemen portofolio, profil, skill, tools, dan achievement. Dilengkapi dengan pengelolaan gambar otomatis, admin panel interaktif, serta endpoint RESTful yang siap diintegrasikan dengan frontend apapun.

---

## ✨ Fitur Utama

- CRUD lengkap untuk Portofolio, Profil, Pendidikan, Hard Skill, Soft Skill, Tools, dan Achievement
- Manajemen gambar otomatis (resize, crop, validasi, dan URL publik)
- API RESTful siap pakai untuk integrasi frontend
- Admin panel berbasis Filament (UI modern, upload gambar, validasi data)
- Otentikasi API dengan Laravel Sanctum
- Seeder data demo (profile, skills, portfolio, dsb)
- Struktur kode rapi dan mudah dikembangkan

---

## 🛠️ Teknologi yang Digunakan

- **Laravel 10**
- **Filament Admin Panel**
- **PHP 8.1+**
- **MySQL**
- **Sanctum** (API authentication)
- **Vite** (build tool)
- **PHPUnit** (testing)

---

## 🗂️ Struktur Data Utama

| Resource     | Field Utama                                                                 |
|--------------|-----------------------------------------------------------------------------|
| Portfolio    | title, description, image, link                                             |
| Profile      | name, title, bio, email, phone, address, photo                              |
| Achievement  | title, description, image, year                                             |
| Education    | institution, degree, start_year, end_year, description                      |
| HardSkill    | name, icon, description, category, proficiency_level                        |
| SoftSkill    | name, icon, description, category, proficiency_level                        |
| Tool         | name, icon, description, category, proficiency_level                        |

---

## 📦 Instalasi Cepat

```bash
# 1. Clone repository
$ git clone <repo-url>
$ cd be-portofolio-senadara

# 2. Install dependencies
$ composer install

# 3. Copy file environment
$ cp .env.example .env

# 4. Generate app key
$ php artisan key:generate

# 5. Jalankan migrasi & seeder
$ php artisan migrate --seed

# 6. Buat storage link
$ php artisan storage:link

# 7. Jalankan server
$ php artisan serve
```

---

## 🔗 Endpoint API Utama

| Resource     | Endpoint (CRUD)                      |
|--------------|--------------------------------------|
| Portfolio    | `/api/portfolios`                    |
| Profile      | `/api/profiles`                      |
| Achievement  | `/api/achievements`                  |
| Education    | `/api/education`                     |
| HardSkill    | `/api/hard-skills`                   |
| SoftSkill    | `/api/soft-skills`                   |
| Tool         | `/api/tools`                         |

Semua endpoint mendukung operasi GET, POST, PUT, DELETE (lihat route di `routes/api.php`).

---

## 🖼️ Manajemen Gambar

- Semua gambar disimpan di `storage/app/public` dan dapat diakses via `/storage/{folder}/{filename}`
- Otomatis resize & crop sesuai kebutuhan (lihat kode untuk detail)
- Model dengan gambar menggunakan trait `HasImage`:
  - `getImageUrl($field = 'image')`: URL publik
  - `getImagePath($field = 'image')`: path relatif
  - `hasImage($field = 'image')`: boolean

Contoh response API:
```json
{
  "id": 1,
  "title": "Project Title",
  "image": "http://localhost:8000/storage/portfolio-images/filename.jpg",
  "image_path": "storage/portfolio-images/filename.jpg"
}
```

---

## 🛡️ Admin Panel

- Akses admin: `/admin`
- Manajemen data portofolio, profil, skill, tools, achievement, dan gambar
- Fitur upload gambar, validasi, dan UI modern

---

## 👤 Contoh Data Profile (Seeder)

```json
{
  "name": "Septian Nanda Saputra",
  "title": "Full Stack Developer, Backend Developer, QA Engineer, AI Engineer, Software Architect",
  "bio": "A passionate software engineer with experience in backend, QA, AI, and software architecture. Highly adaptive, creative, and a fast learner. Open to collaboration and continuous learning.",
  "email": "putrasanjaya498@gmail.com",
  "phone": "083848931368",
  "address": "Jl. Bubutan II, No.9i, Alun alun Contong, Surabaya, Jawa Timur"
}
```

---

## 🤝 Kontribusi

Pull request dan issue sangat diterima! Silakan fork dan ajukan perubahan.

---

## 📄 Lisensi

MIT License © 2024 Senadara