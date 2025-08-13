<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::where('user_id', Auth::id())->latest()->get();
        return view('dashboard.projects.index', compact('projects'));
    }
    
    public function create()
    {
        return view('dashboard.projects.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'technologies' => 'required|string',
            'github_url' => 'nullable|url',
            'live_url' => 'nullable|url',
            'image_url' => 'nullable|url',
        ]);
        
        Project::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'technologies' => $request->technologies,
            'github_url' => $request->github_url,
            'live_url' => $request->live_url,
            'image_url' => $request->image_url,
        ]);
        
        return redirect()->route('dashboard.projects.index')->with('success', 'Project created successfully!');
    }
    
    public function edit(Project $project)
    {
        if ($project->user_id !== Auth::id()) {
            abort(403);
        }
        
        return view('dashboard.projects.edit', compact('project'));
    }
    
    public function update(Request $request, Project $project)
    {
        if ($project->user_id !== Auth::id()) {
            abort(403);
        }
        
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'technologies' => 'required|string',
            'github_url' => 'nullable|url',
            'live_url' => 'nullable|url',
            'image_url' => 'nullable|url',
        ]);
        
        $project->update($request->only(['title', 'description', 'technologies', 'github_url', 'live_url', 'image_url']));
        
        return redirect()->route('dashboard.projects.index')->with('success', 'Project updated successfully!');
    }
    
    public function destroy(Project $project)
    {
        if ($project->user_id !== Auth::id()) {
            abort(403);
        }
        
        $project->delete();
        
        return redirect()->route('dashboard.projects.index')->with('success', 'Project deleted successfully!');
    }
}
