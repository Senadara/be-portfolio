<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Achievement;
use App\Models\Education;
use App\Models\Tool;
use Illuminate\Support\Facades\DB;
use App\Models\Portfolio;
use App\Models\Profile;

class ExperienceEducationCertificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Profile
        Profile::updateOrCreate([
            'email' => 'putrasanjaya498@gmail.com',
        ], [
            'name' => 'Septian Nanda Saputra',
            'title' => 'Full Stack Developer, Backend Developer, QA Engineer, AI Engineer, Software Architect',
            'bio' => 'A passionate software engineer with experience in backend, QA, AI, and software architecture. Highly adaptive, creative, and a fast learner. Open to collaboration and continuous learning.',
            'email' => 'putrasanjaya498@gmail.com',
            'phone' => '083848931368',
            'address' => 'Jl. Bubutan II, No.9i, Alun alun Contong, Surabaya, Jawa Timur',
            'photo' => null,
        ]);

        // Education
        Education::updateOrCreate([
            'institution' => 'Telkom University Surabaya',
            'degree' => 'Bachelor of Software Engineering',
        ], [
            'institution' => 'Telkom University Surabaya',
            'degree' => 'Bachelor of Software Engineering',
            'start_year' => 2022,
            'end_year' => null,
            'description' => 'GPA 3.85. Area of Interest: Full Stack Developer, Backend Developer, QA Engineer, AI Engineer, Software Architect.',
        ]);

        Education::updateOrCreate([
            'institution' => 'SMK Telkom Malang',
            'degree' => 'Teknik Komputer dan Jaringan',
        ], [
            'institution' => 'SMK Telkom Malang',
            'degree' => 'Teknik Komputer dan Jaringan',
            'start_year' => 2019,
            'end_year' => 2022,
            'description' => 'Specialist Cyber Security',
        ]);

        // Achievements (Awards, Certifications, Organizational Experience)
        $achievements = [
            [
                'title' => 'Vice Head of Research and Technology Department',
                'description' => 'Himpunan Rekayasa Perangkat Lunak (Software Engineer Association) | Responsible for running research department programs, actively contributing to achieving the organization\'s vision and mission.',
                'date' => '2024-01-12',
                'image' => null,
            ],
            [
                'title' => 'Vice Chairperson',
                'description' => 'Punggawa Inspiratif | Responsible for supporting and ensuring the success of all activities, including preparation for competitions and olympiads.',
                'date' => '2024-02-12',
                'image' => null,
            ],
            [
                'title' => 'Chairperson',
                'description' => 'Punggawa Inspiratif | Official student activity unit with a vision to create outstanding and contributive students for Telkom University Surabaya.',
                'date' => '2025-02-17',
                'image' => null,
            ],
            [
                'title' => 'Chief Executive',
                'description' => 'SE FEST | Annual event by Software Engineering Student Association to improve education quality.',
                'date' => '2024-04-01',
                'image' => null,
            ],
            [
                'title' => 'City of Tomorrow The Infinite Challenge 2024',
                'description' => 'Infineon | Top 10 finalist team and participation with Merits.',
                'date' => '2024-09-21',
                'image' => null,
            ],
            [
                'title' => 'Program Kreativitas Mahasiswa PKM Tahun 2023',
                'description' => 'Directorate of Higher Education | PKMKC Funding.',
                'date' => '2023-11-15',
                'image' => null,
            ],
            [
                'title' => 'KEMENRISTEK BEM ITTS',
                'description' => '3rd Place Scientific Writing Competition.',
                'date' => '2023-07-09',
                'image' => 'sertifikat_kemenristek_bem_itts.jpg',
            ],
            [
                'title' => 'Lomba Kompetensi Siswa',
                'description' => '2nd Place INC East Java.',
                'date' => '2022-03-28',
                'image' => null,
            ],
            [
                'title' => 'Networking Fundamentals',
                'description' => 'Microsoft Technology Associate • REy3-FVPn | Recognized as a Microsoft Technology Associate for Networking Fundamentals.',
                'date' => '2021-12-08',
                'image' => null,
            ],
            [
                'title' => 'Certified Developer',
                'description' => 'Alibaba Cloud • ACCCD137340300010008 | Test developing with Alibaba Cloud.',
                'date' => '2024-03-15',
                'image' => null,
            ],
        ];
        foreach ($achievements as $achievement) {
            Achievement::updateOrCreate([
                'title' => $achievement['title'],
                'date' => $achievement['date'],
            ], $achievement);
        }

        // Tools (migrated from old skills table)
        $tools = [
            // Development Tools
            ['name' => 'React', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/react/react-original.svg', 'description' => 'Frontend JavaScript library', 'category' => 'Development', 'proficiency_level' => 4],
            ['name' => 'Laravel', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-plain.svg', 'description' => 'PHP web framework', 'category' => 'Development', 'proficiency_level' => 4],
            ['name' => 'Figma', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/figma/figma-original.svg', 'description' => 'UI/UX design tool', 'category' => 'Design', 'proficiency_level' => 3],
            ['name' => 'Bootstrap', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original.svg', 'description' => 'CSS framework', 'category' => 'Development', 'proficiency_level' => 4],
            ['name' => 'Tailwind CSS', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/tailwindcss/tailwindcss-plain.svg', 'description' => 'Utility-first CSS', 'category' => 'Development', 'proficiency_level' => 4],
            ['name' => 'MySQL', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg', 'description' => 'Relational database', 'category' => 'Database', 'proficiency_level' => 4],
            ['name' => 'MongoDB', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mongodb/mongodb-original.svg', 'description' => 'NoSQL database', 'category' => 'Database', 'proficiency_level' => 3],
            ['name' => 'Git', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/git/git-original.svg', 'description' => 'Version control', 'category' => 'Development', 'proficiency_level' => 4],
            ['name' => 'VS Code', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/vscode/vscode-original.svg', 'description' => 'Code editor', 'category' => 'Development', 'proficiency_level' => 4],
            ['name' => 'Postman', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/postman/postman-original.svg', 'description' => 'API testing platform', 'category' => 'Testing & QA', 'proficiency_level' => 4],
            ['name' => 'TensorFlow', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/tensorflow/tensorflow-original.svg', 'description' => 'Machine learning framework', 'category' => 'AI & ML', 'proficiency_level' => 3],
            ['name' => 'Arduino', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/arduino/arduino-original.svg', 'description' => 'IoT platform', 'category' => 'IoT', 'proficiency_level' => 3],
            ['name' => 'Maze', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/raspberrypi/raspberrypi-original.svg', 'description' => 'IoT development platform', 'category' => 'IoT', 'proficiency_level' => 3],
            ['name' => 'Notion', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/notion/notion-original.svg', 'description' => 'Documentation workspace', 'category' => 'Productivity', 'proficiency_level' => 4],
        ];
        foreach ($tools as $tool) {
            Tool::updateOrCreate([
                'name' => $tool['name']
            ], $tool);
        }

        // Portfolios
        $portfolios = [
            [
                'title' => 'GitHub Portfolio',
                'description' => 'Personal and open-source projects. See more at github.com/senadara',
                'image' => null,
            ],
            [
                'title' => 'Personal Website',
                'description' => 'Online portfolio and CV. See more at senadara.my.id',
                'image' => null,
            ],
        ];
        foreach ($portfolios as $portfolio) {
            Portfolio::updateOrCreate([
                'title' => $portfolio['title']
            ], $portfolio);
        }
    }
}
