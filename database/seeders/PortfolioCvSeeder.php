<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profile;
use App\Models\Skill;
use App\Models\Portfolio;
use App\Models\Education;
use Illuminate\Support\Facades\DB;

class PortfolioCvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Profile
        Profile::updateOrCreate([
            'id' => 1
        ], [
            'name' => 'Septian Nanda Saputra',
            'title' => 'Software Engineer',
            'bio' => 'Software Engineering student with strong interest in Quality Assurance, Project Management, and Agile Development. Experienced in creating test cases, documenting bugs, and managing tasks with ClickUp and Jira. Passionate about delivering high-quality software and actively contributing in team-based development environments. Skilled in QA tools and project coordination, with hands-on experience from academic and personal projects.',
            'email' => 'senadara39@gmail.com',
            'phone' => '083848931368',
            'address' => 'Surabaya, Indonesia',
            'photo' => 'profile1.png',
        ]);

        // Skills
        $skills = [
            ['name' => 'JUnit', 'icon' => 'skill1.png', 'description' => 'Testing & QA'],
            ['name' => 'PHPUnit', 'icon' => 'skill2.png', 'description' => 'Testing & QA'],
            ['name' => 'Postman', 'icon' => 'skill3.png', 'description' => 'Testing & QA'],
            ['name' => 'JMeter', 'icon' => 'skill4.png', 'description' => 'Testing & QA'],
            ['name' => 'Katalon', 'icon' => 'skill5.png', 'description' => 'Testing & QA'],
            ['name' => 'Xray', 'icon' => 'skill6.png', 'description' => 'Testing & QA'],
            ['name' => 'SonarQube', 'icon' => 'skill7.png', 'description' => 'Testing & QA'],
            ['name' => 'ClickUp', 'icon' => 'skill8.png', 'description' => 'PM & Tools'],
            ['name' => 'Jira', 'icon' => 'skill9.png', 'description' => 'PM & Tools'],
            ['name' => 'GitLab Board', 'icon' => 'skill10.png', 'description' => 'PM & Tools'],
            ['name' => 'Trello', 'icon' => 'skill11.png', 'description' => 'PM & Tools'],
            ['name' => 'Gantt Chart', 'icon' => 'skill12.png', 'description' => 'PM & Tools'],
            ['name' => 'Laravel', 'icon' => 'skill13.png', 'description' => 'Development'],
            ['name' => 'React.js', 'icon' => 'skill14.png', 'description' => 'Development'],
            ['name' => 'HTML/CSS', 'icon' => 'skill15.png', 'description' => 'Development'],
            ['name' => 'REST API', 'icon' => 'skill16.png', 'description' => 'Development'],
            ['name' => 'MySQL', 'icon' => 'skill17.png', 'description' => 'Development'],
            ['name' => '.Net', 'icon' => 'skill18.png', 'description' => 'Development'],
            ['name' => 'User Stories', 'icon' => 'skill19.png', 'description' => 'Documentation'],
            ['name' => 'Acceptance Criteria', 'icon' => 'skill20.png', 'description' => 'Documentation'],
            ['name' => 'QA Documentation', 'icon' => 'skill21.png', 'description' => 'Documentation'],
            ['name' => 'SDLC', 'icon' => 'skill22.png', 'description' => 'Others'],
            ['name' => 'STLC', 'icon' => 'skill23.png', 'description' => 'Others'],
            ['name' => 'Agile Scrum', 'icon' => 'skill24.png', 'description' => 'Others'],
            ['name' => 'Wireframing', 'icon' => 'skill25.png', 'description' => 'Others'],
            ['name' => 'SQL', 'icon' => 'skill26.png', 'description' => 'Others'],
        ];
        foreach ($skills as $skill) {
            Skill::updateOrCreate([
                'name' => $skill['name']
            ], $skill);
        }

        // Portfolio
        $portfolios = [
            [
                'title' => 'PM & Developer – Community Service Project (Tel-U Surabaya Campus)',
                'description' => "Leading development of a community web solution (Laravel, REST API).\nManaging timelines, team roles, and continuous evaluation cycles.\nSupported requirement gathering, project planning, and sprint monitoring.",
                'image' => 'portfolio1.png',
            ],
            [
                'title' => 'QA Tester – Collabora (Web Event Platform)',
                'description' => "Executed manual and API testing (Postman), tracked bugs via Jira.\nMaintained test case documentation and collaborated closely with devs.",
                'image' => 'portfolio2.png',
            ],
            [
                'title' => 'Project Manager – Sirekom (Student Competition Platform)',
                'description' => "Defined user stories, built wireframes, and coordinated a cross-functional team.\nManaged tasks using ClickUp and maintained stakeholder reports.",
                'image' => 'portfolio3.png',
            ],
        ];
        foreach ($portfolios as $portfolio) {
            Portfolio::updateOrCreate([
                'title' => $portfolio['title']
            ], $portfolio);
        }

        // Education
        $educations = [
            [
                'institution' => 'Telkom University Surabaya',
                'degree' => "Bachelor's in Software Engineering (In-Progress)",
                'start_year' => 2022,
                'end_year' => null,
                'description' => 'Software Engineer - IPK 3.93',
            ],
            [
                'institution' => 'Telkom School Malang',
                'degree' => "Bachelor's in Software Engineering (In-Progress)",
                'start_year' => 2019,
                'end_year' => 2022,
                'description' => 'Computer and Network Engineering – Cyber Security',
            ],
        ];
        foreach ($educations as $education) {
            Education::updateOrCreate([
                'institution' => $education['institution'],
                'degree' => $education['degree'],
            ], $education);
        }

        // Pengalaman/Experience (bisa masuk ke portfolio atau education, tergantung struktur)
        // Jika ingin tabel khusus, bisa dibuatkan model & migration baru.
    }
}
