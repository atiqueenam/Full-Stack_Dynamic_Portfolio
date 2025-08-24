<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PortfolioController;

// Main portfolio website route
Route::get('/', [PortfolioController::class, 'index'])->name('home');

// Simple dashboard redirect for convenience
Route::get('/dashboard', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard.index');
    } else {
        return redirect()->route('login')->with('message', 'Please log in to access the dashboard.');
    }
});

// Debug route for testing
Route::get('/test-auth', function () {
    $user = \App\Models\User::first();
    if ($user) {
        return response()->json([
            'user_exists' => true,
            'email' => $user->email,
            'password_set' => !empty($user->password),
            'auth_check' => Auth::check(),
            'session_driver' => config('session.driver')
        ]);
    }
    return response()->json(['user_exists' => false]);
});

// Authentication routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Protected dashboard routes
Route::middleware('auth')->prefix('dashboard')->name('dashboard.')->group(function () {
    // Main dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::get('/analytics', [DashboardController::class, 'analytics'])->name('analytics');
    
    // Personal Details Management
    Route::get('/personal-details', [PortfolioController::class, 'editPersonalDetails'])->name('personal-details');
    Route::put('/personal-details', [PortfolioController::class, 'updatePersonalDetails'])->name('personal-details.update');
    
    // Projects Management
    Route::get('/projects', [PortfolioController::class, 'projects'])->name('projects');
    Route::get('/projects/create', [PortfolioController::class, 'createProject'])->name('projects.create');
    Route::post('/projects', [PortfolioController::class, 'storeProject'])->name('projects.store');
    Route::get('/projects/{project}/edit', [PortfolioController::class, 'editProject'])->name('projects.edit');
    Route::put('/projects/{project}', [PortfolioController::class, 'updateProject'])->name('projects.update');
    Route::delete('/projects/{project}', [PortfolioController::class, 'destroyProject'])->name('projects.destroy');
    
    // Skills Management
    Route::get('/skills', [PortfolioController::class, 'skills'])->name('skills');
    Route::get('/skills/create', [PortfolioController::class, 'createSkill'])->name('skills.create');
    Route::post('/skills', [PortfolioController::class, 'storeSkill'])->name('skills.store');
    Route::get('/skills/{skill}/edit', [PortfolioController::class, 'editSkill'])->name('skills.edit');
    Route::put('/skills/{skill}', [PortfolioController::class, 'updateSkill'])->name('skills.update');
    Route::delete('/skills/{skill}', [PortfolioController::class, 'destroySkill'])->name('skills.destroy');
    
    // Experience Management
    Route::get('/experiences', [PortfolioController::class, 'experiences'])->name('experiences');
    Route::get('/experiences/create', [PortfolioController::class, 'createExperience'])->name('experiences.create');
    Route::post('/experiences', [PortfolioController::class, 'storeExperience'])->name('experiences.store');
    Route::get('/experiences/{experience}/edit', [PortfolioController::class, 'editExperience'])->name('experiences.edit');
    Route::put('/experiences/{experience}', [PortfolioController::class, 'updateExperience'])->name('experiences.update');
    Route::delete('/experiences/{experience}', [PortfolioController::class, 'destroyExperience'])->name('experiences.destroy');
    
    // Education Management
    Route::get('/education', [PortfolioController::class, 'education'])->name('education');
    Route::get('/education/create', [PortfolioController::class, 'createEducation'])->name('education.create');
    Route::post('/education', [PortfolioController::class, 'storeEducation'])->name('education.store');
    Route::get('/education/{education}/edit', [PortfolioController::class, 'editEducation'])->name('education.edit');
    Route::put('/education/{education}', [PortfolioController::class, 'updateEducation'])->name('education.update');
    Route::delete('/education/{education}', [PortfolioController::class, 'destroyEducation'])->name('education.destroy');
    
    // Achievements Management
    Route::get('/achievements', [PortfolioController::class, 'achievements'])->name('achievements');
    Route::get('/achievements/create', [PortfolioController::class, 'createAchievement'])->name('achievements.create');
    Route::post('/achievements', [PortfolioController::class, 'storeAchievement'])->name('achievements.store');
    Route::get('/achievements/{achievement}/edit', [PortfolioController::class, 'editAchievement'])->name('achievements.edit');
    Route::put('/achievements/{achievement}', [PortfolioController::class, 'updateAchievement'])->name('achievements.update');
    Route::delete('/achievements/{achievement}', [PortfolioController::class, 'destroyAchievement'])->name('achievements.destroy');
    
    // Website Info Management
    Route::get('/info', [PortfolioController::class, 'info'])->name('info');
    Route::put('/info', [PortfolioController::class, 'updateInfo'])->name('info.update');
});
