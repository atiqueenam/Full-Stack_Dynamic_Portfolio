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
        $personalDetails = PersonalDetail::first(); // Get first user's details for public portfolio
        $projects = Project::where('is_featured', true)->latest()->get();
        $skills = Skill::orderBy('category')->orderBy('name')->get();
        $experiences = Experience::orderBy('from_date', 'desc')->get();
        $achievements = Achievement::orderBy('date', 'desc')->get();
        $education = Education::orderBy('passing_year', 'desc')->get();
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
        $personalDetails = PersonalDetail::where('user_id', auth()->id())->first();
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
        
        $personalDetails = PersonalDetail::where('user_id', auth()->id())->first();
        
        if (!$personalDetails) {
            $personalDetails = new PersonalDetail();
            $personalDetails->user_id = auth()->id();
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
            'images' => 'nullable|string',
            'is_featured' => 'nullable|boolean'
        ]);
        
        $validated['user_id'] = Auth::id();
        $validated['is_featured'] = $request->has('is_featured');
        
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
            'images' => 'nullable|string',
            'is_featured' => 'nullable|boolean'
        ]);
        
        $validated['is_featured'] = $request->has('is_featured');
        
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
            'type' => 'required|in:technical,soft',
            'level' => 'required|in:beginner,intermediate,expert',
            'logo' => 'nullable|string|max:255'
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
            'type' => 'required|in:technical,soft',
            'level' => 'required|in:beginner,intermediate,expert',
            'logo' => 'nullable|string|max:255'
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
            'type' => 'required|in:job,internship,freelance,volunteer',
            'designation' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'from_date' => 'required|date',
            'to_date' => 'nullable|date|after:from_date'
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
            'type' => 'required|in:job,internship,freelance,volunteer',
            'designation' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'from_date' => 'required|date',
            'to_date' => 'nullable|date|after:from_date'
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
            'type' => 'required|string|max:255',
            'name' => 'required|string|max:255', 
            'institute' => 'required|string|max:255',
            'enrolled_year' => 'required|integer|min:1900|max:2030',
            'passing_year' => 'required|integer|min:1900|max:2030|gte:enrolled_year',
            'grade' => 'required|string|max:255'
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
            'type' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'institute' => 'required|string|max:255', 
            'enrolled_year' => 'required|integer|min:1900|max:2030',
            'passing_year' => 'required|integer|min:1900|max:2030|gte:enrolled_year',
            'grade' => 'required|string|max:255'
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
            'name' => 'required|string|max:255',
            'type' => 'required|in:award,certification,recognition',
            'certification' => 'nullable|string|max:255',
            'organization' => 'required|string|max:255',
            'date' => 'required|date',
            'category' => 'required|in:academic,professional,other',
            'images' => 'nullable|string'
        ]);
        
        $validated['user_id'] = Auth::id();
        
        // Handle images JSON field
        if ($request->filled('images')) {
            $validated['images'] = json_encode(explode(',', $request->images));
        } else {
            $validated['images'] = json_encode([]);
        }
        
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
            'name' => 'required|string|max:255',
            'type' => 'required|in:award,certification,recognition',
            'certification' => 'nullable|string|max:255',
            'organization' => 'required|string|max:255',
            'date' => 'required|date',
            'category' => 'required|in:academic,professional,other',
            'images' => 'nullable|string'
        ]);
        
        // Handle images JSON field
        if ($request->filled('images')) {
            $validated['images'] = json_encode(explode(',', $request->images));
        }
        
        $achievement->update($validated);
        
        return redirect()->route('dashboard.achievements')->with('success', 'Achievement updated successfully!');
    }
    
    public function destroyAchievement(Achievement $achievement)
    {
        $achievement->delete();
        
        return redirect()->route('dashboard.achievements')->with('success', 'Achievement deleted successfully!');
    }
    
    // Website Info Management
    public function info()
    {
        $info = Info::where('user_id', auth()->id())->first();
        return view('dashboard.info', compact('info'));
    }
    
    public function updateInfo(Request $request)
    {
        $validated = $request->validate([
            'portfolio' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'designation' => 'nullable|string|max:255',
            'scienthush_description' => 'nullable|string',
            'scienthush_facebook_url' => 'nullable|url|max:255',
            'scienthush_youtube_url' => 'nullable|url|max:255',
            'scienthush_featured_videos' => 'nullable|string',
            'show_scienthush_section' => 'nullable|boolean'
        ]);
        
        $info = Info::where('user_id', auth()->id())->first();
        
        if (!$info) {
            $info = new Info();
            $info->user_id = auth()->id();
        }
        
        // Handle featured videos (convert text area to JSON array)
        if ($request->filled('scienthush_featured_videos')) {
            $videos = array_filter(array_map('trim', explode("\n", $request->scienthush_featured_videos)));
            $validated['scienthush_featured_videos'] = $videos;
        } else {
            $validated['scienthush_featured_videos'] = [];
        }
        
        // Handle checkbox
        $validated['show_scienthush_section'] = $request->has('show_scienthush_section');
        
        $info->fill($validated);
        $info->save();
        
        return redirect()->route('dashboard.info')->with('success', 'Website information updated successfully!');
    }
}
