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
            'full_name' => 'Md Atique Enam',
            'title' => 'AI Researcher & Content Creator',
            'bio' => 'Final-year Computer Science & Engineering student at Daffodil International University, specializing in Artificial Intelligence, Machine Learning, and Educational Data Science, alongside being an active social media content creator with 470K+ followers.',
            'phone' => '+880-123-456789',
            'email' => 'scienthush.official@gmail.com',
            'location' => 'Dhaka, Bangladesh',
            'website' => 'https://atiqueenam.com',
            'linkedin' => 'https://bd.linkedin.com/in/atiqueenam',
            'github' => 'https://github.com/atiqueenam',
            'twitter' => 'https://x.com/scienthush',
            'facebook' => 'https://facebook.com/scienthush',
            'instagram' => 'https://www.instagram.com/scienthush',
            'youtube' => 'https://www.youtube.com/@scienthush',
            'profile_image' => 'assets/images/atq4.png'
        ]);

        // Create sample projects
        Project::create([
            'user_id' => $user->id,
            'title' => 'AI Research Projects',
            'name' => 'Explainable AI Systems',
            'description' => 'Working on explainable AI systems, educational data mining, and precision medicine applications. Contributing to research that makes machine learning more transparent and actionable.',
            'technologies' => 'Python, TensorFlow, PyTorch, Scikit-learn, Pandas',
            'project_url' => 'https://github.com/atiqueenam/ai-research',
            'github_url' => 'https://github.com/atiqueenam/ai-research',
            'is_featured' => true,
            'start_date' => '2022-01-01',
            'end_date' => null,
            'image' => 'assets/images/ai-project.jpg'
        ]);

        Project::create([
            'user_id' => $user->id,
            'title' => 'Portfolio Website',
            'name' => 'Dynamic Portfolio Platform',
            'description' => 'A modern, responsive portfolio website built with Laravel and Vue.js. Features include dynamic content management, contact forms, and project showcases.',
            'technologies' => 'Laravel, Vue.js, MySQL, JavaScript, Bootstrap',
            'project_url' => 'https://atiqueenam.com',
            'github_url' => 'https://github.com/atiqueenam/portfolio',
            'is_featured' => true,
            'start_date' => '2023-01-01',
            'end_date' => '2023-06-01',
            'image' => 'assets/images/portfolio.jpg'
        ]);

        // Create skills
        $skillCategories = [
            'AI & Machine Learning' => [
                ['name' => 'Python', 'level' => 90],
                ['name' => 'TensorFlow', 'level' => 85],
                ['name' => 'Scikit-learn', 'level' => 88],
                ['name' => 'Data Analysis', 'level' => 92],
            ],
            'Web Development' => [
                ['name' => 'Laravel', 'level' => 95],
                ['name' => 'Vue.js', 'level' => 88],
                ['name' => 'JavaScript', 'level' => 90],
                ['name' => 'MySQL', 'level' => 85],
            ],
            'Content Creation' => [
                ['name' => 'Video Production', 'level' => 95],
                ['name' => 'Social Media Strategy', 'level' => 98],
                ['name' => 'Storytelling & Acting', 'level' => 93],
                ['name' => 'Public Speaking', 'level' => 90],
            ],
            'Professional Skills' => [
                ['name' => 'Team Leadership', 'level' => 88],
                ['name' => 'Scriptwriting', 'level' => 85],
                ['name' => 'Video Editing', 'level' => 92],
                ['name' => 'Educational Content Design', 'level' => 90],
            ]
        ];

        foreach ($skillCategories as $category => $skills) {
            foreach ($skills as $skill) {
                Skill::create([
                    'user_id' => $user->id,
                    'name' => $skill['name'],
                    'category' => $category,
                    'level' => $skill['level'],
                    'description' => 'Proficient in ' . $skill['name'] . ' with practical experience in projects and research.'
                ]);
            }
        }

        // Create education
        Education::create([
            'user_id' => $user->id,
            'institution' => 'Daffodil International University',
            'degree' => 'Bachelor of Science',
            'field_of_study' => 'Computer Science & Engineering',
            'description' => 'Specializing in Artificial Intelligence, Machine Learning, and Educational Data Science. Outstanding academic performance with multiple scholarships.',
            'start_date' => '2021-01-01',
            'end_date' => '2025-06-01',
            'gpa' => 3.85,
            'location' => 'Dhaka, Bangladesh'
        ]);

        // Create experiences
        Experience::create([
            'user_id' => $user->id,
            'company' => 'ScienThush Content Creation',
            'position' => 'Content Creator & Social Media Influencer',
            'description' => 'Building engaging content for 470K+ followers on Facebook. Creating viral videos, brand collaborations, and educational content reaching millions globally.',
            'start_date' => '2019-01-01',
            'end_date' => null,
            'is_current' => true,
            'location' => 'Dhaka, Bangladesh'
        ]);

        Experience::create([
            'user_id' => $user->id,
            'company' => 'Daffodil International University',
            'position' => 'Research Assistant',
            'description' => 'Contributing to research in explainable AI, educational data mining, and precision medicine. Collaborating with faculty on cutting-edge AI projects.',
            'start_date' => '2022-06-01',
            'end_date' => null,
            'is_current' => true,
            'location' => 'Dhaka, Bangladesh'
        ]);

        // Create achievements
        Achievement::create([
            'user_id' => $user->id,
            'title' => 'Merit-based Scholarship',
            'description' => 'Received multiple merit-based scholarships for outstanding academic performance in Computer Science & Engineering program.',
            'issuer' => 'Daffodil International University',
            'date' => '2023-01-01',
            'url' => null
        ]);

        Achievement::create([
            'user_id' => $user->id,
            'title' => 'International Exchange Program Selection',
            'description' => 'Selected for prestigious international academic exchange programs in Japan and India, representing the university.',
            'issuer' => 'Daffodil International University',
            'date' => '2023-06-01',
            'url' => null
        ]);

        Achievement::create([
            'user_id' => $user->id,
            'title' => '470K+ Social Media Followers',
            'description' => 'Built a substantial digital presence with over 470,000 followers across social media platforms, creating viral content with social impact.',
            'issuer' => 'ScienThush',
            'date' => '2024-01-01',
            'url' => 'https://facebook.com/scienthush'
        ]);

        // Create info
        Info::create([
            'title' => 'About ScienThush',
            'description' => 'Professional AI researcher and content creator bridging academic excellence with digital innovation.',
            'content' => 'Atique Enam, known as ScienThush, represents the perfect blend of academic rigor and creative expression in the digital age.'
        ]);
    }
}
