<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Portfolio;

class ProjectPortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Collabora',
                'description' => 'Website volunteer dan event creator collaboratif',
                'link' => 'https://github.com/Senadara/Collabora',
            ],
            [
                'title' => 'LogiCA-Mobile',
                'description' => 'Aplikasi mobile (kemungkinan berbasis Flutter atau React Native) untuk platform LogiCA, mendukung tracking dan pengelolaan kendaraan.',
                'link' => 'https://github.com/Senadara/LogiCA-Mobile',
                'image' => null,
            ],
            [
                'title' => 'EcoSurfer',
                'description' => 'Aplikasi web yang didesain untuk mendukung gaya hidup ramah lingkungan, termasuk pencatatan aktivitas atau konsumsi.',
                'link' => 'https://github.com/Senadara/EcoSurfer',
                'image' => null,
            ],
            [
                'title' => 'Backend-LogiCA',
                'description' => 'Sisi backend dari LogiCA berbasis Laravel, mencakup otentikasi, manajemen kendaraan, perbaikan, laporan, dan API.',
                'link' => 'https://github.com/Senadara/Backend-LogiCA',
                'image' => null,
            ],
            [
                'title' => 'be-portfolio',
                'description' => 'Backend Laravel untuk sistem portofolio pribadi. Mendukung manajemen profil, capaian, tools, dan gambar dengan autentikasi API.',
                'link' => 'https://github.com/Senadara/be-portfolio',
                'image' => null,
            ],
            [
                'title' => 'Portfolio-React',
                'description' => 'Frontend React untuk portofolio pribadi dengan desain modern dan animasi, terintegrasi dengan API Laravel.',
                'link' => 'https://github.com/Senadara/Portfolio-React',
                'image' => null,
            ],
            [
                'title' => 'WebSarirogo',
                'description' => 'Website informatif berbasis Laravel yang dikembangkan untuk komunitas atau institusi bernama Sarirogo.',
                'link' => 'https://github.com/Senadara/WebSarirogo',
                'image' => null,
            ],
            [
                'title' => 'SIREKOM',
                'description' => 'Sistem informasi rekap kompetisi mahasiswa untuk keperluan kampus, mendukung pengelolaan data peserta dan lomba.',
                'link' => 'https://github.com/Senadara/SIREKOM',
                'image' => null,
            ],
            [
                'title' => 'UDChandraFurniture',
                'description' => 'Aplikasi pengelolaan usaha furniture, mencakup katalog produk, transaksi, dan manajemen data pelanggan.',
                'link' => 'https://github.com/Senadara/UDChandraFurniture',
                'image' => null,
            ],
            [
                'title' => 'Senadara',
                'description' => 'Repo utama profil GitHub berisi informasi singkat tentang kamu sebagai Software Engineer.',
                'link' => 'https://github.com/Senadara/Senadara',
                'image' => null,
            ],
            [
                'title' => 'Tugas-Pemrograman-Integrative',
                'description' => 'Proyek tugas kuliah yang mengintegrasikan beberapa konsep pemrograman seperti OOP, database, dan antarmuka pengguna.',
                'link' => 'https://github.com/Senadara/Tugas-Pemrograman-Integrative',
                'image' => null,
            ],
            [
                'title' => 'BatCoin',
                'description' => 'Simulasi cryptocurrency dengan nama BatCoin, kemungkinan dikembangkan dalam Java atau PHP untuk belajar sistem transaksi digital.',
                'link' => 'https://github.com/Senadara/BatCoin',
                'image' => null,
            ],
            [
                'title' => 'Al-Klasifikasi-Rumput-Laut',
                'description' => 'Proyek klasifikasi gambar rumput laut menggunakan pendekatan AI atau CNN untuk keperluan riset atau lomba.',
                'link' => 'https://github.com/Senadara/Al-Klasifikasi-Rumput-Laut',
                'image' => null,
            ],
            [
                'title' => 'DIDIMO-Web',
                'description' => 'Aplikasi web yang kemungkinan berkaitan dengan manajemen data organisasi, laporan atau sistem pelacakan.',
                'link' => 'https://github.com/Senadara/DIDIMO-Web',
                'image' => null,
            ],
            [
                'title' => 'AI-Competition',
                'description' => 'Fork dan pengembangan sistem rekomendasi lomba dengan AI, menggunakan Python, Jupyter Notebook, dan integrasi web.',
                'link' => 'https://github.com/Senadara/AI-Competition',
                'image' => null,
            ],
            [
                'title' => 'Grafika-Komputer',
                'description' => 'Simulasi grafika komputer menggunakan Java seperti tata surya, detak jantung, dan mobil berjalan.',
                'link' => 'https://github.com/Senadara/Grafika-Komputer',
                'image' => null,
            ],
            [
                'title' => 'Tubes-Digital-SWK',
                'description' => 'Tugas besar mata kuliah Struktur Wadah Komputasi berbasis Java dan database, dikemas dalam proyek OOP.',
                'link' => 'https://github.com/Senadara/Tubes-Digital-SWK',
                'image' => null,
            ],
            [
                'title' => 'Tugas-PBO-Mahasiswa',
                'description' => 'Proyek pemrograman berorientasi objek yang berisi sistem mahasiswa, database, dan fungsi CRUD.',
                'link' => 'https://github.com/Senadara/Tugas-PBO-Mahasiswa',
                'image' => null,
            ],
            [
                'title' => 'playboxs4',
                'description' => 'Aplikasi game atau simulasi hiburan, berisi logika permainan dasar. Nama ini muncul dua kali dalam akunmu.',
                'link' => 'https://github.com/Senadara/playboxs4',
                'image' => null,
            ],
            [
                'title' => 'laravel-portfolio-project',
                'description' => 'Proyek portofolio berbasis Laravel, mendukung tampilan data profil, pengalaman, dan daftar proyek.',
                'link' => 'https://github.com/Senadara/laravel-portfolio-project',
                'image' => null,
            ],
        ];

        foreach ($projects as $project) {
            Portfolio::updateOrCreate([
                'title' => $project['title'],
            ], $project);
        }
    }
} 