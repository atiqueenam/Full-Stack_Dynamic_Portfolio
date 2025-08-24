<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateTestUser extends Command
{
    protected $signature = 'user:create-test';
    protected $description = 'Create a test user for login';

    public function handle()
    {
        $email = 'admin@test.com';
        $password = 'password123';
        
        $user = User::firstOrCreate(
            ['email' => $email],
            [
                'name' => 'Admin User',
                'password' => Hash::make($password)
            ]
        );

        if ($user->wasRecentlyCreated) {
            $this->info("Test user created!");
        } else {
            $this->info("Test user already exists!");
        }
        
        $this->info("Email: {$email}");
        $this->info("Password: {$password}");
        
        return Command::SUCCESS;
    }
}
