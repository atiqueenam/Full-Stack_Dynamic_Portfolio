<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Achievement;
use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Get counts for dashboard stats
        $projectsCount = Project::where('user_id', $user->id)->count();
        $skillsCount = Skill::where('user_id', $user->id)->count();
        $experiencesCount = Experience::where('user_id', $user->id)->count();
        $achievementsCount = Achievement::where('user_id', $user->id)->count();
        
        // Get recent data for dashboard
        $recentProjects = Project::where('user_id', $user->id)->latest()->take(3)->get();
        $recentSkills = Skill::where('user_id', $user->id)->latest()->take(5)->get();
        
        // Skills distribution for chart
        $skillCategories = Skill::where('user_id', $user->id)
            ->selectRaw('category, COUNT(*) as count')
            ->groupBy('category')
            ->get();
            
        return view('dashboard.index', compact(
            'user', 
            'projectsCount', 
            'skillsCount', 
            'experiencesCount', 
            'achievementsCount',
            'recentProjects',
            'recentSkills',
            'skillCategories'
        ));
    }
    
    public function profile()
    {
        $user = Auth::user();
        return view('dashboard.profile', compact('user'));
    }
    
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'phone' => 'nullable|string|max:20',
            'student_id' => 'nullable|string|max:50',
        ]);
        
        $user = Auth::user();
        $user->update($request->only(['name', 'email', 'phone', 'student_id']));
        
        return redirect()->route('dashboard.profile')->with('success', 'Profile updated successfully!');
    }
    
    public function analytics()
    {
        $user = Auth::user();
        
        // Analytics data
        $monthlyData = [
            'projects' => Project::where('user_id', $user->id)->selectRaw('MONTH(created_at) as month, COUNT(*) as count')->groupBy('month')->get(),
            'skills' => Skill::where('user_id', $user->id)->selectRaw('MONTH(created_at) as month, COUNT(*) as count')->groupBy('month')->get(),
        ];
        
        return view('dashboard.analytics', compact('monthlyData'));
    }
}
