<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HardSkill;
use App\Models\SoftSkill;
use App\Models\Tool;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hard Skills
        $hardSkills = [
            ['name' => 'Software Development', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/code/code-original.svg', 'description' => 'Full-stack software development', 'category' => 'Development', 'proficiency_level' => 4],
            ['name' => 'Web Development', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg', 'description' => 'Building responsive web applications', 'category' => 'Development', 'proficiency_level' => 4],
            ['name' => 'Mobile Development', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/android/android-original.svg', 'description' => 'Mobile app development', 'category' => 'Development', 'proficiency_level' => 3],
            ['name' => 'API Development', 'icon' => null, 'description' => 'RESTful API design and implementation', 'category' => 'Development', 'proficiency_level' => 4],
            ['name' => 'Software QA', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/checkmarx/checkmarx-original.svg', 'description' => 'Software testing and quality assurance', 'category' => 'Testing & QA', 'proficiency_level' => 4],
            ['name' => 'Quality Control', 'icon' => null, 'description' => 'Ensuring software quality', 'category' => 'Testing & QA', 'proficiency_level' => 4],
            ['name' => 'Test Case Design', 'icon' => null, 'description' => 'Creating comprehensive test cases', 'category' => 'Testing & QA', 'proficiency_level' => 4],
            ['name' => 'Bug Tracking', 'icon' => null, 'description' => 'Identifying and tracking software defects', 'category' => 'Testing & QA', 'proficiency_level' => 4],
            ['name' => 'Project Management', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/trello/trello-original.svg', 'description' => 'Managing software projects', 'category' => 'Project Management', 'proficiency_level' => 4],
            ['name' => 'Agile Development', 'icon' => null, 'description' => 'Implementing Agile methodologies', 'category' => 'Project Management', 'proficiency_level' => 4],
            ['name' => 'Sprint Planning', 'icon' => null, 'description' => 'Planning development sprints', 'category' => 'Project Management', 'proficiency_level' => 4],
            ['name' => 'Software Documentation', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/markdown/markdown-original.svg', 'description' => 'Creating technical documentation', 'category' => 'Documentation', 'proficiency_level' => 4],
            ['name' => 'User Stories', 'icon' => null, 'description' => 'Writing user stories and requirements', 'category' => 'Documentation', 'proficiency_level' => 4],
            ['name' => 'Acceptance Criteria', 'icon' => null, 'description' => 'Defining acceptance criteria', 'category' => 'Documentation', 'proficiency_level' => 4],
            ['name' => 'Network Security', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/networkx/networkx-original.svg', 'description' => 'Network architecture and security', 'category' => 'Network & Security', 'proficiency_level' => 3],
            ['name' => 'Cyber Security', 'icon' => null, 'description' => 'Security best practices', 'category' => 'Network & Security', 'proficiency_level' => 3],
            ['name' => 'IoT Development', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/raspberrypi/raspberrypi-original.svg', 'description' => 'IoT solutions development', 'category' => 'IoT', 'proficiency_level' => 3],
            ['name' => 'Embedded Systems', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/arduino/arduino-original.svg', 'description' => 'Embedded systems programming', 'category' => 'IoT', 'proficiency_level' => 3],
        ];

        foreach ($hardSkills as $skill) {
            HardSkill::updateOrCreate(['name' => $skill['name']], $skill);
        }

        // Soft Skills
        $softSkills = [
            ['name' => 'Communication', 'description' => 'Effective verbal and written communication', 'category' => 'Communication', 'proficiency_level' => 4],
            ['name' => 'Team Collaboration', 'description' => 'Working in cross-functional teams', 'category' => 'Communication', 'proficiency_level' => 4],
            ['name' => 'Presentation Skills', 'description' => 'Delivering engaging presentations', 'category' => 'Communication', 'proficiency_level' => 3],
            ['name' => 'Leadership', 'description' => 'Leading teams and projects', 'category' => 'Leadership', 'proficiency_level' => 4],
            ['name' => 'Team Management', 'description' => 'Managing team dynamics', 'category' => 'Leadership', 'proficiency_level' => 4],
            ['name' => 'Decision Making', 'description' => 'Making informed decisions', 'category' => 'Leadership', 'proficiency_level' => 4],
            ['name' => 'Problem Solving', 'description' => 'Analyzing and solving complex problems', 'category' => 'Problem Solving', 'proficiency_level' => 4],
            ['name' => 'Critical Thinking', 'description' => 'Evaluating information logically', 'category' => 'Problem Solving', 'proficiency_level' => 4],
            ['name' => 'Analytical Skills', 'description' => 'Breaking down complex issues', 'category' => 'Problem Solving', 'proficiency_level' => 4],
            ['name' => 'Adaptability', 'description' => 'Adapting to new technologies', 'category' => 'Adaptability', 'proficiency_level' => 4],
            ['name' => 'Fast Learning', 'description' => 'Rapidly acquiring new skills', 'category' => 'Adaptability', 'proficiency_level' => 4],
            ['name' => 'Creativity', 'description' => 'Thinking creatively for solutions', 'category' => 'Adaptability', 'proficiency_level' => 4],
            ['name' => 'Time Management', 'description' => 'Managing time effectively', 'category' => 'Time Management', 'proficiency_level' => 4],
            ['name' => 'Organization', 'description' => 'Maintaining organized workflows', 'category' => 'Time Management', 'proficiency_level' => 4],
            ['name' => 'Attention to Detail', 'description' => 'Ensuring accuracy and quality', 'category' => 'Time Management', 'proficiency_level' => 4],
        ];

        foreach ($softSkills as $skill) {
            SoftSkill::updateOrCreate(['name' => $skill['name']], $skill);
        }

        // Tools
        $tools = [
            ['name' => 'React', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/react/react-original.svg', 'description' => 'Frontend JavaScript library', 'category' => 'Development', 'proficiency_level' => 4],
            ['name' => 'Laravel', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-plain.svg', 'description' => 'PHP web framework', 'category' => 'Development', 'proficiency_level' => 4],
            ['name' => 'HTML/CSS', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg', 'description' => 'Web markup and styling', 'category' => 'Development', 'proficiency_level' => 4],
            ['name' => 'JavaScript', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg', 'description' => 'Programming language', 'category' => 'Development', 'proficiency_level' => 4],
            ['name' => 'PHP', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg', 'description' => 'Server-side language', 'category' => 'Development', 'proficiency_level' => 4],
            ['name' => 'Bootstrap', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original.svg', 'description' => 'CSS framework', 'category' => 'Development', 'proficiency_level' => 4],
            ['name' => 'Tailwind CSS', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/tailwindcss/tailwindcss-plain.svg', 'description' => 'Utility-first CSS', 'category' => 'Development', 'proficiency_level' => 4],
            ['name' => '.NET', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/dotnetcore/dotnetcore-original.svg', 'description' => 'Microsoft framework', 'category' => 'Development', 'proficiency_level' => 3],
            ['name' => 'MySQL', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg', 'description' => 'Relational database', 'category' => 'Database', 'proficiency_level' => 4],
            ['name' => 'MongoDB', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mongodb/mongodb-original.svg', 'description' => 'NoSQL database', 'category' => 'Database', 'proficiency_level' => 3],
            ['name' => 'SQL', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg', 'description' => 'Database query language', 'category' => 'Database', 'proficiency_level' => 4],
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
            ['name' => 'Figma', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/figma/figma-original.svg', 'description' => 'UI/UX design tool', 'category' => 'Design', 'proficiency_level' => 3],
            ['name' => 'Wireframing', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/figma/figma-original.svg', 'description' => 'Creating wireframes', 'category' => 'Design', 'proficiency_level' => 3],
            ['name' => 'Git', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/git/git-original.svg', 'description' => 'Version control', 'category' => 'Development', 'proficiency_level' => 4],
            ['name' => 'VS Code', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/vscode/vscode-original.svg', 'description' => 'Code editor', 'category' => 'Development', 'proficiency_level' => 4],
            ['name' => 'TensorFlow', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/tensorflow/tensorflow-original.svg', 'description' => 'Machine learning framework', 'category' => 'AI & ML', 'proficiency_level' => 3],
            ['name' => 'Arduino', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/arduino/arduino-original.svg', 'description' => 'IoT platform', 'category' => 'IoT', 'proficiency_level' => 3],
            ['name' => 'Maze', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/raspberrypi/raspberrypi-original.svg', 'description' => 'IoT development platform', 'category' => 'IoT', 'proficiency_level' => 3],
            ['name' => 'Notion', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/notion/notion-original.svg', 'description' => 'Documentation workspace', 'category' => 'Productivity', 'proficiency_level' => 4],
        ];

        foreach ($tools as $tool) {
            Tool::updateOrCreate(['name' => $tool['name']], $tool);
        }
    }
}
