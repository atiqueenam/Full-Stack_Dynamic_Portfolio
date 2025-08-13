<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::where('user_id', Auth::id())->latest()->get();
        return view('dashboard.skills.index', compact('skills'));
    }
    
    public function create()
    {
        return view('dashboard.skills.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'proficiency' => 'required|integer|min:1|max:100',
            'description' => 'nullable|string',
        ]);
        
        Skill::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'category' => $request->category,
            'proficiency' => $request->proficiency,
            'description' => $request->description,
        ]);
        
        return redirect()->route('dashboard.skills.index')->with('success', 'Skill added successfully!');
    }
    
    public function edit(Skill $skill)
    {
        if ($skill->user_id !== Auth::id()) {
            abort(403);
        }
        
        return view('dashboard.skills.edit', compact('skill'));
    }
    
    public function update(Request $request, Skill $skill)
    {
        if ($skill->user_id !== Auth::id()) {
            abort(403);
        }
        
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'proficiency' => 'required|integer|min:1|max:100',
            'description' => 'nullable|string',
        ]);
        
        $skill->update($request->only(['name', 'category', 'proficiency', 'description']));
        
        return redirect()->route('dashboard.skills.index')->with('success', 'Skill updated successfully!');
    }
    
    public function destroy(Skill $skill)
    {
        if ($skill->user_id !== Auth::id()) {
            abort(403);
        }
        
        $skill->delete();
        
        return redirect()->route('dashboard.skills.index')->with('success', 'Skill deleted successfully!');
    }
}
