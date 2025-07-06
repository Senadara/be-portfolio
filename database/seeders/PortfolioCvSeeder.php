<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profile;
use App\Models\Tool;
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

        // Tools (migrated from old skills table)
        $tools = [
            ['name' => 'JUnit', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/java/java-original.svg', 'description' => 'Java testing framework', 'category' => 'Testing & QA', 'proficiency_level' => 4],
            ['name' => 'PHPUnit', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg', 'description' => 'PHP testing framework', 'category' => 'Testing & QA', 'proficiency_level' => 4],
            ['name' => 'Postman', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/postman/postman-original.svg', 'description' => 'API testing platform', 'category' => 'Testing & QA', 'proficiency_level' => 4],
            ['name' => 'JMeter', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/apache/apache-original.svg', 'description' => 'Performance testing', 'category' => 'Testing & QA', 'proficiency_level' => 3],
            ['name' => 'Katalon', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/katalon/katalon-original.svg', 'description' => 'Automated testing', 'category' => 'Testing & QA', 'proficiency_level' => 3],
            ['name' => 'Xray', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/jira/jira-original.svg', 'description' => 'Jira test management', 'category' => 'Testing & QA', 'proficiency_level' => 3],
            ['name' => 'SonarQube', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/sonarqube/sonarqube-original.svg', 'description' => 'Code quality analysis', 'category' => 'Testing & QA', 'proficiency_level' => 3],
            ['name' => 'ClickUp', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/clickup/clickup-original.svg', 'description' => 'Project management platform', 'category' => 'Project Management', 'proficiency_level' => 4],
            ['name' => 'Jira', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/jira/jira-original.svg', 'description' => 'Agile project management', 'category' => 'Project Management', 'proficiency_level' => 4],
            ['name' => 'GitLab Board', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/gitlab/gitlab-original.svg', 'description' => 'GitLab project management', 'category' => 'Project Management', 'proficiency_level' => 4],
            ['name' => 'Trello', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/trello/trello-original.svg', 'description' => 'Visual project management', 'category' => 'Project Management', 'proficiency_level' => 4],
            ['name' => 'Gantt Chart', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/gantt/gantt-original.svg', 'description' => 'Project scheduling', 'category' => 'Project Management', 'proficiency_level' => 3],
            ['name' => 'Laravel', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-plain.svg', 'description' => 'PHP web framework', 'category' => 'Development', 'proficiency_level' => 4],
            ['name' => 'React.js', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/react/react-original.svg', 'description' => 'Frontend JavaScript library', 'category' => 'Development', 'proficiency_level' => 4],
            ['name' => 'HTML/CSS', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg', 'description' => 'Web markup and styling', 'category' => 'Development', 'proficiency_level' => 4],
            ['name' => 'REST API', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/api/api-original.svg', 'description' => 'API development', 'category' => 'Development', 'proficiency_level' => 4],
            ['name' => 'MySQL', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg', 'description' => 'Relational database', 'category' => 'Database', 'proficiency_level' => 4],
            ['name' => '.NET', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/dotnetcore/dotnetcore-original.svg', 'description' => 'Microsoft framework', 'category' => 'Development', 'proficiency_level' => 3],
            ['name' => 'User Stories', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/markdown/markdown-original.svg', 'description' => 'Requirements documentation', 'category' => 'Documentation', 'proficiency_level' => 4],
            ['name' => 'Acceptance Criteria', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/markdown/markdown-original.svg', 'description' => 'Feature acceptance criteria', 'category' => 'Documentation', 'proficiency_level' => 4],
            ['name' => 'QA Documentation', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/markdown/markdown-original.svg', 'description' => 'Quality assurance documentation', 'category' => 'Documentation', 'proficiency_level' => 4],
            ['name' => 'SDLC', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/markdown/markdown-original.svg', 'description' => 'Software Development Life Cycle', 'category' => 'Project Management', 'proficiency_level' => 4],
            ['name' => 'STLC', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/markdown/markdown-original.svg', 'description' => 'Software Testing Life Cycle', 'category' => 'Testing & QA', 'proficiency_level' => 4],
            ['name' => 'Agile Scrum', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/markdown/markdown-original.svg', 'description' => 'Agile methodology', 'category' => 'Project Management', 'proficiency_level' => 4],
            ['name' => 'Wireframing', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/figma/figma-original.svg', 'description' => 'Creating wireframes', 'category' => 'Design', 'proficiency_level' => 3],
            ['name' => 'SQL', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg', 'description' => 'Database query language', 'category' => 'Database', 'proficiency_level' => 4],
        ];
        foreach ($tools as $tool) {
            Tool::updateOrCreate([
                'name' => $tool['name']
            ], $tool);
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
