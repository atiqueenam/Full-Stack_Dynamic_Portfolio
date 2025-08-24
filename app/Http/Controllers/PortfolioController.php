<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Achievement;
use App\Models\Education;
use App\Models\PersonalDetail;
use App\Models\Info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index()
    {
        // Get all portfolio data for the public website
        $user = User::first(); // For single user portfolio
        $personalDetails = PersonalDetail::first();
        $projects = Project::where('is_featured', true)->latest()->get();
        $skills = Skill::orderBy('category')->orderBy('level', 'desc')->get();
        $experiences = Experience::orderBy('start_date', 'desc')->get();
        $achievements = Achievement::orderBy('date', 'desc')->get();
        $education = Education::orderBy('start_date', 'desc')->get();
        $info = Info::first();
        
        return view('welcome', compact(
            'user',
            'personalDetails', 
            'projects', 
            'skills', 
            'experiences', 
            'achievements', 
            'education',
            'info'
        ));
    }
    
    // Personal Details Management
    public function editPersonalDetails()
    {
        $personalDetails = PersonalDetail::first();
        return view('dashboard.personal-details', compact('personalDetails'));
    }
    
    public function updatePersonalDetails(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'bio' => 'required|string',
            'phone' => 'nullable|string|max:20',
            'email' => 'required|email|max:255',
            'location' => 'nullable|string|max:255',
            'website' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'github' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'facebook' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'youtube' => 'nullable|url|max:255',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        
        $personalDetails = PersonalDetail::first();
        
        if (!$personalDetails) {
            $personalDetails = new PersonalDetail();
        }
        
        // Handle profile image upload
        if ($request->hasFile('profile_image')) {
            // Delete old image if exists
            if ($personalDetails->profile_image) {
                Storage::delete('public/' . $personalDetails->profile_image);
            }
            
            $imagePath = $request->file('profile_image')->store('profile', 'public');
            $validated['profile_image'] = $imagePath;
        }
        
        $personalDetails->fill($validated);
        $personalDetails->save();
        
        return redirect()->route('dashboard.personal-details')->with('success', 'Personal details updated successfully!');
    }
    
    // Projects Management
    public function projects()
    {
        $projects = Project::where('user_id', Auth::id())->latest()->get();
        return view('dashboard.projects.index', compact('projects'));
    }
    
    public function createProject()
    {
        return view('dashboard.projects.create');
    }
    
    public function storeProject(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|in:personal,client,academic',
            'status' => 'required|in:active,inactive,in-progress',
            'tools' => 'required|string',
            'github_url' => 'nullable|url',
            'demo_url' => 'nullable|url',
            'reference' => 'nullable|string|max:255',
            'keywords' => 'nullable|string',
            'images' => 'nullable|string'
        ]);
        
        $validated['user_id'] = Auth::id();
        
        // Handle JSON fields
        if ($request->filled('tools')) {
            $validated['tools'] = json_encode(explode(',', $request->tools));
        }
        if ($request->filled('keywords')) {
            $validated['keywords'] = json_encode(explode(',', $request->keywords));
        }
        if ($request->filled('images')) {
            $validated['images'] = json_encode(explode(',', $request->images));
        } else {
            $validated['images'] = json_encode([]);
        }
        
        Project::create($validated);
        
        return redirect()->route('dashboard.projects')->with('success', 'Project created successfully!');
    }
    
    public function editProject(Project $project)
    {
        return view('dashboard.projects.edit', compact('project'));
    }
    
    public function updateProject(Request $request, Project $project)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|in:personal,client,academic',
            'status' => 'required|in:active,inactive,in-progress',
            'tools' => 'required|string',
            'github_url' => 'nullable|url',
            'demo_url' => 'nullable|url',
            'reference' => 'nullable|string|max:255',
            'keywords' => 'nullable|string',
            'images' => 'nullable|string'
        ]);
        
        // Handle JSON fields
        if ($request->filled('tools')) {
            $validated['tools'] = json_encode(explode(',', $request->tools));
        }
        if ($request->filled('keywords')) {
            $validated['keywords'] = json_encode(explode(',', $request->keywords));
        }
        if ($request->filled('images')) {
            $validated['images'] = json_encode(explode(',', $request->images));
        }
        
        $project->update($validated);
        
        return redirect()->route('dashboard.projects')->with('success', 'Project updated successfully!');
    }
    
    public function destroyProject(Project $project)
    {
        // Delete image if exists
        if ($project->image) {
            Storage::delete('public/' . $project->image);
        }
        
        $project->delete();
        
        return redirect()->route('dashboard.projects')->with('success', 'Project deleted successfully!');
    }
    
    // Skills Management
    public function skills()
    {
        $skills = Skill::where('user_id', Auth::id())->orderBy('category')->orderBy('level', 'desc')->get();
        return view('dashboard.skills.index', compact('skills'));
    }
    
    public function createSkill()
    {
        return view('dashboard.skills.create');
    }
    
    public function storeSkill(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'level' => 'required|integer|min:1|max:100',
            'description' => 'nullable|string'
        ]);
        
        $validated['user_id'] = Auth::id();
        
        Skill::create($validated);
        
        return redirect()->route('dashboard.skills')->with('success', 'Skill created successfully!');
    }
    
    public function editSkill(Skill $skill)
    {
        return view('dashboard.skills.edit', compact('skill'));
    }
    
    public function updateSkill(Request $request, Skill $skill)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'level' => 'required|integer|min:1|max:100',
            'description' => 'nullable|string'
        ]);
        
        $skill->update($validated);
        
        return redirect()->route('dashboard.skills')->with('success', 'Skill updated successfully!');
    }
    
    public function destroySkill(Skill $skill)
    {
        $skill->delete();
        
        return redirect()->route('dashboard.skills')->with('success', 'Skill deleted successfully!');
    }
    
    // Experience Management
    public function experiences()
    {
        $experiences = Experience::where('user_id', Auth::id())->orderBy('from_date', 'desc')->get();
        return view('dashboard.experiences.index', compact('experiences'));
    }
    
    public function createExperience()
    {
        return view('dashboard.experiences.create');
    }
    
    public function storeExperience(Request $request)
    {
        $validated = $request->validate([
            'company' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'is_current' => 'boolean',
            'location' => 'nullable|string|max:255'
        ]);
        
        $validated['user_id'] = Auth::id();
        
        Experience::create($validated);
        
        return redirect()->route('dashboard.experiences')->with('success', 'Experience created successfully!');
    }
    
    public function editExperience(Experience $experience)
    {
        return view('dashboard.experiences.edit', compact('experience'));
    }
    
    public function updateExperience(Request $request, Experience $experience)
    {
        $validated = $request->validate([
            'company' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'is_current' => 'boolean',
            'location' => 'nullable|string|max:255'
        ]);
        
        $experience->update($validated);
        
        return redirect()->route('dashboard.experiences')->with('success', 'Experience updated successfully!');
    }
    
    public function destroyExperience(Experience $experience)
    {
        $experience->delete();
        
        return redirect()->route('dashboard.experiences')->with('success', 'Experience deleted successfully!');
    }
    
    // Education Management
    public function education()
    {
        $education = Education::where('user_id', Auth::id())->orderBy('enrolled_year', 'desc')->get();
        return view('dashboard.education.index', compact('education'));
    }
    
    public function createEducation()
    {
        return view('dashboard.education.create');
    }
    
    public function storeEducation(Request $request)
    {
        $validated = $request->validate([
            'institution' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'field_of_study' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'gpa' => 'nullable|numeric|min:0|max:4',
            'location' => 'nullable|string|max:255'
        ]);
        
        $validated['user_id'] = Auth::id();
        
        Education::create($validated);
        
        return redirect()->route('dashboard.education')->with('success', 'Education created successfully!');
    }
    
    public function editEducation(Education $education)
    {
        return view('dashboard.education.edit', compact('education'));
    }
    
    public function updateEducation(Request $request, Education $education)
    {
        $validated = $request->validate([
            'institution' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'field_of_study' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'gpa' => 'nullable|numeric|min:0|max:4',
            'location' => 'nullable|string|max:255'
        ]);
        
        $education->update($validated);
        
        return redirect()->route('dashboard.education')->with('success', 'Education updated successfully!');
    }
    
    public function destroyEducation(Education $education)
    {
        $education->delete();
        
        return redirect()->route('dashboard.education')->with('success', 'Education deleted successfully!');
    }
    
    // Achievements Management
    public function achievements()
    {
        $achievements = Achievement::where('user_id', Auth::id())->orderBy('date', 'desc')->get();
        return view('dashboard.achievements.index', compact('achievements'));
    }
    
    public function createAchievement()
    {
        return view('dashboard.achievements.create');
    }
    
    public function storeAchievement(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'issuer' => 'nullable|string|max:255',
            'date' => 'required|date',
            'url' => 'nullable|url'
        ]);
        
        $validated['user_id'] = Auth::id();
        
        Achievement::create($validated);
        
        return redirect()->route('dashboard.achievements')->with('success', 'Achievement created successfully!');
    }
    
    public function editAchievement(Achievement $achievement)
    {
        return view('dashboard.achievements.edit', compact('achievement'));
    }
    
    public function updateAchievement(Request $request, Achievement $achievement)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'issuer' => 'nullable|string|max:255',
            'date' => 'required|date',
            'url' => 'nullable|url'
        ]);
        
        $achievement->update($validated);
        
        return redirect()->route('dashboard.achievements')->with('success', 'Achievement updated successfully!');
    }
    
    public function destroyAchievement(Achievement $achievement)
    {
        $achievement->delete();
        
        return redirect()->route('dashboard.achievements')->with('success', 'Achievement deleted successfully!');
    }
}
