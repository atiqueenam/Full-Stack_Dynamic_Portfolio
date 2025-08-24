<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Project;
use App\Models\Skill;
use App\Models\PersonalDetail;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Achievement;
use App\Models\Info;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a test user
        $user = User::create([
            'name' => 'Atique Enam',
            'email' => 'atique@example.com',
            'password' => Hash::make('password123'),
            'phone' => '+880-123-456789',
            'student_id' => 'DIU-2021001',
        ]);

        // Create personal details
        PersonalDetail::create([
            'user_id' => $user->id,
            'description' => 'Final-year Computer Science & Engineering student at Daffodil International University, specializing in Artificial Intelligence, Machine Learning, and Educational Data Science, alongside being an active social media content creator with 470K+ followers.',
            'blood_group' => 'B+',
            'department' => 'Computer Science & Engineering',
            'age' => 23,
            'dob' => '2001-05-15',
            'address' => 'Dhaka, Bangladesh',
            'gender' => 'Male'
        ]);

        // Create sample projects
        Project::create([
            'user_id' => $user->id,
            'name' => 'Explainable AI Systems',
            'description' => 'Working on explainable AI systems, educational data mining, and precision medicine applications. Contributing to research that makes machine learning more transparent and actionable.',
            'github_url' => 'https://github.com/atiqueenam/ai-research',
            'demo_url' => null,
            'images' => json_encode(['assets/images/ai-project.jpg']),
            'type' => 'academic',
            'reference' => 'DIU Research Lab',
            'tools' => json_encode(['Python', 'TensorFlow', 'PyTorch', 'Scikit-learn', 'Pandas']),
            'keywords' => json_encode(['AI', 'Machine Learning', 'Research']),
            'status' => 'active'
        ]);

        Project::create([
            'user_id' => $user->id,
            'name' => 'Dynamic Portfolio Platform',
            'description' => 'A modern, responsive portfolio website built with Laravel and Vue.js. Features include dynamic content management, contact forms, and project showcases.',
            'github_url' => 'https://github.com/atiqueenam/portfolio',
            'demo_url' => 'https://atiqueenam.com',
            'images' => json_encode(['assets/images/portfolio.jpg']),
            'type' => 'personal',
            'reference' => null,
            'tools' => json_encode(['Laravel', 'Vue.js', 'MySQL', 'JavaScript', 'Bootstrap']),
            'keywords' => json_encode(['Portfolio', 'Web Development', 'Laravel']),
            'status' => 'active'
        ]);

        // Create skills
        $skillCategories = [
            'AI & Machine Learning' => [
                ['name' => 'Python', 'type' => 'technical', 'level' => 'expert'],
                ['name' => 'TensorFlow', 'type' => 'technical', 'level' => 'expert'],
                ['name' => 'Scikit-learn', 'type' => 'technical', 'level' => 'expert'],
                ['name' => 'Data Analysis', 'type' => 'technical', 'level' => 'expert'],
            ],
            'Web Development' => [
                ['name' => 'Laravel', 'type' => 'technical', 'level' => 'expert'],
                ['name' => 'Vue.js', 'type' => 'technical', 'level' => 'expert'],
                ['name' => 'JavaScript', 'type' => 'technical', 'level' => 'expert'],
                ['name' => 'MySQL', 'type' => 'technical', 'level' => 'expert'],
            ],
            'Content Creation' => [
                ['name' => 'Video Production', 'type' => 'technical', 'level' => 'expert'],
                ['name' => 'Social Media Strategy', 'type' => 'soft', 'level' => 'expert'],
                ['name' => 'Storytelling & Acting', 'type' => 'soft', 'level' => 'expert'],
                ['name' => 'Public Speaking', 'type' => 'soft', 'level' => 'expert'],
            ],
            'Professional Skills' => [
                ['name' => 'Team Leadership', 'type' => 'soft', 'level' => 'expert'],
                ['name' => 'Scriptwriting', 'type' => 'soft', 'level' => 'expert'],
                ['name' => 'Video Editing', 'type' => 'technical', 'level' => 'expert'],
                ['name' => 'Educational Content Design', 'type' => 'soft', 'level' => 'expert'],
            ]
        ];

        foreach ($skillCategories as $category => $skills) {
            foreach ($skills as $skill) {
                Skill::create([
                    'user_id' => $user->id,
                    'name' => $skill['name'],
                    'category' => $category,
                    'type' => $skill['type'],
                    'level' => $skill['level'],
                    'logo' => null
                ]);
            }
        }

        // Create education
        Education::create([
            'user_id' => $user->id,
            'type' => 'BSc',
            'name' => 'Computer Science & Engineering',
            'institute' => 'Daffodil International University',
            'enrolled_year' => 2021,
            'passing_year' => 2025,
            'grade' => '3.85 (out of 4.00)'
        ]);

        Education::create([
            'user_id' => $user->id,
            'type' => 'HSC',
            'name' => 'Science',
            'institute' => 'Notre Dame College, Dhaka',
            'enrolled_year' => 2018,
            'passing_year' => 2020,
            'grade' => 'GPA 5.00'
        ]);

        Education::create([
            'user_id' => $user->id,
            'type' => 'SSC',
            'name' => 'Science',
            'institute' => 'Motijheel Model High School',
            'enrolled_year' => 2016,
            'passing_year' => 2018,
            'grade' => 'GPA 5.00'
        ]);

        // Create experiences
        Experience::create([
            'user_id' => $user->id,
            'type' => 'job',
            'designation' => 'Content Creator & Social Media Influencer',
            'organization' => 'ScienThush Content Creation',
            'from_date' => '2019-01-01',
            'to_date' => null
        ]);

        Experience::create([
            'user_id' => $user->id,
            'type' => 'job',
            'designation' => 'Research Assistant',
            'organization' => 'Daffodil International University',
            'from_date' => '2022-06-01',
            'to_date' => null
        ]);

        Experience::create([
            'user_id' => $user->id,
            'type' => 'internship',
            'designation' => 'Software Development Intern',
            'organization' => 'Tech Solutions Ltd',
            'from_date' => '2023-06-01',
            'to_date' => '2023-08-31'
        ]);

        // Create achievements
        Achievement::create([
            'user_id' => $user->id,
            'name' => 'Merit-based Scholarship',
            'type' => 'award',
            'certification' => null,
            'organization' => 'Daffodil International University',
            'date' => '2023-01-01',
            'images' => null,
            'category' => 'academic'
        ]);

        Achievement::create([
            'user_id' => $user->id,
            'name' => 'International Exchange Program Selection',
            'type' => 'recognition',
            'certification' => null,
            'organization' => 'Daffodil International University',
            'date' => '2023-06-01',
            'images' => null,
            'category' => 'academic'
        ]);

        Achievement::create([
            'user_id' => $user->id,
            'name' => '470K+ Social Media Followers',
            'type' => 'recognition',
            'certification' => null,
            'organization' => 'ScienThush',
            'date' => '2024-01-01',
            'images' => null,
            'category' => 'professional'
        ]);

        // Create info
        Info::create([
            'user_id' => $user->id,
            'portfolio' => 'https://github.com/scienthush',
            'address' => 'Dhaka, Bangladesh',
            'description' => 'Professional AI researcher and content creator bridging academic excellence with digital innovation. Atique Enam, known as ScienThush, represents the perfect blend of academic rigor and creative expression in the digital age.',
            'designation' => 'AI Researcher & Content Creator'
        ]);
    }
}
