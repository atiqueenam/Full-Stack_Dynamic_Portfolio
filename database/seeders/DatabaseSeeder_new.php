<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Project;
use App\Models\Skill;
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

        // Create sample projects
        Project::create([
            'user_id' => $user->id,
            'name' => 'Portfolio Website',
            'description' => 'A modern, responsive portfolio website built with Laravel and Vue.js. Features include dynamic content management, contact forms, and project showcases.',
            'github_url' => 'https://github.com/atiqueenam/portfolio',
            'demo_url' => 'https://atiqueenam.com',
            'images' => json_encode(['https://via.placeholder.com/600x400/667eea/ffffff?text=Portfolio']),
            'type' => 'personal',
            'tools' => json_encode(['Laravel', 'Vue.js', 'MySQL', 'Tailwind CSS', 'Docker']),
            'keywords' => json_encode(['portfolio', 'web development', 'laravel']),
            'status' => 'active'
        ]);

        Project::create([
            'user_id' => $user->id,
            'name' => 'E-Learning Platform',
            'description' => 'A comprehensive e-learning platform with course management, video streaming, quizzes, and progress tracking for students and instructors.',
            'github_url' => 'https://github.com/atiqueenam/elearning',
            'demo_url' => 'https://elearning-demo.com',
            'images' => json_encode(['https://via.placeholder.com/600x400/764ba2/ffffff?text=E-Learning']),
            'type' => 'academic',
            'tools' => json_encode(['React', 'Node.js', 'MongoDB', 'Express.js', 'Socket.io']),
            'keywords' => json_encode(['education', 'e-learning', 'react']),
            'status' => 'active'
        ]);

        Project::create([
            'user_id' => $user->id,
            'name' => 'Task Management App',
            'description' => 'A productivity app for team collaboration with real-time updates, file sharing, and advanced project analytics.',
            'github_url' => 'https://github.com/atiqueenam/taskmanager',
            'demo_url' => null,
            'images' => json_encode(['https://via.placeholder.com/600x400/00d4ff/ffffff?text=Task+Manager']),
            'type' => 'personal',
            'tools' => json_encode(['Flutter', 'Firebase', 'Node.js', 'PostgreSQL']),
            'keywords' => json_encode(['productivity', 'task management', 'flutter']),
            'status' => 'in-progress'
        ]);

        // Create sample skills
        $skills = [
            ['name' => 'Laravel', 'category' => 'Backend', 'type' => 'technical', 'level' => 'expert'],
            ['name' => 'Vue.js', 'category' => 'Frontend', 'type' => 'technical', 'level' => 'expert'],
            ['name' => 'React', 'category' => 'Frontend', 'type' => 'technical', 'level' => 'intermediate'],
            ['name' => 'Node.js', 'category' => 'Backend', 'type' => 'technical', 'level' => 'intermediate'],
            ['name' => 'MySQL', 'category' => 'Database', 'type' => 'technical', 'level' => 'expert'],
            ['name' => 'MongoDB', 'category' => 'Database', 'type' => 'technical', 'level' => 'intermediate'],
            ['name' => 'Docker', 'category' => 'DevOps', 'type' => 'technical', 'level' => 'intermediate'],
            ['name' => 'AWS', 'category' => 'Cloud', 'type' => 'technical', 'level' => 'beginner'],
            ['name' => 'Python', 'category' => 'Programming', 'type' => 'technical', 'level' => 'intermediate'],
            ['name' => 'JavaScript', 'category' => 'Programming', 'type' => 'technical', 'level' => 'expert'],
            ['name' => 'PHP', 'category' => 'Programming', 'type' => 'technical', 'level' => 'expert'],
            ['name' => 'Git', 'category' => 'Tools', 'type' => 'technical', 'level' => 'expert'],
            ['name' => 'Leadership', 'category' => 'Management', 'type' => 'soft', 'level' => 'expert'],
            ['name' => 'Communication', 'category' => 'Social', 'type' => 'soft', 'level' => 'expert'],
        ];

        foreach ($skills as $skill) {
            Skill::create([
                'user_id' => $user->id,
                'name' => $skill['name'],
                'category' => $skill['category'],
                'type' => $skill['type'],
                'level' => $skill['level'],
            ]);
        }
    }
}
