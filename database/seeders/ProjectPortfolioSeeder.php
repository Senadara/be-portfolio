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
                'image' => null,
            ],
            [
                'title' => 'Backend‑LogiCA',
                'description' => 'Backend proyek berbasis Laravel, menyediakan RESTful API & antarmuka admin. Dikembangkan dengan Laravel, lengkap dengan struktur app, routing, migrate dan konfigurasi default Laravel',
                'link' => 'https://github.com/Senadara/Backend-LogiCA',
                'image' => null,
            ],
            [
                'title' => 'WebSarirogo',
                'description' => 'Aplikasi web yang dibangun menggunakan Laravel. Struktur dan file mengindikasikan proyek Laravel namun tidak ada deskripsi lebih detail pada README',
                'link' => 'https://github.com/Senadara/WebSarirogo',
                'image' => null,
            ],
            [
                'title' => 'be‑portfolio',
                'description' => 'Backend portofolio pribadi berbasis Laravel untuk mengelola profil, portofolio, skill, tools, capaian, dan gambar. Dilengkapi admin panel (Filament) dan API RESTful yang siap diintegrasikan dengan frontend',
                'link' => 'https://github.com/Senadara/be-portfolio',
                'image' => null,
            ],
            [
                'title' => 'Portfolio‑React',
                'description' => 'Website portofolio pribadi modern responsif, dibangun dengan React & Tailwind CSS. Menampilkan carousel projek interaktif, animasi AOS, dan gaya gradient emas elegan',
                'link' => 'https://github.com/Senadara/Portfolio-React',
                'image' => null,
            ],
            [
                'title' => 'Tubes‑Digital‑SWK',
                'description' => 'Tugas akhir semester 2: aplikasi Java OOP berpadu database SQL menggunakan Maven (pom.xml). Deskripsi menunjukkan ini adalah proyek Java final',
                'link' => 'https://github.com/Senadara/Tubes-Digital-SWK',
                'image' => null,
            ],
            [
                'title' => 'SIREKOM',
                'description' => 'Aplikasi manajemen mahasiswa peserta lomba di kampus (TUS), dikembangkan bersama menggunakan Laravel. Cocok untuk pengelolaan kompetisi internal',
                'link' => 'https://github.com/Senadara/SIREKOM',
                'image' => null,
            ],
            [
                'title' => 'Grafika‑Komputer',
                'description' => 'Proyek Java (animasi grafika) dengan simulasi seperti Solar System, HeartBeat, dan CarPath. Termasuk file .pdf dokumentasi animasi dasar',
                'link' => 'https://github.com/Senadara/Grafika-Komputer',
                'image' => null,
            ],
            [
                'title' => 'AI‑Competition',
                'description' => 'Sistem rekomendasi lomba menggunakan Python, dikembangkan (fork) dari repo adibfirmannn/sirekom-ai. Kombinasi Python, notebook dan PHP',
                'link' => 'https://github.com/Senadara/AI-Competition',
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