<?php

namespace App\Http\Controllers;

use App\Models\HardSkill;
use Illuminate\Http\Request;

class HardSkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['data' => HardSkill::all()]);
        }
        return view('hard-skills.index', ['hardSkills' => HardSkill::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['message' => 'Not supported for API'], 405);
        }
        return view('hard-skills.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:255',
            'proficiency_level' => 'nullable|integer|min:1|max:5',
        ]);
        if ($request->hasFile('icon')) {
            $filename = uniqid() . '-' . $request->file('icon')->getClientOriginalName();
            $request->file('icon')->move(public_path('hard-skill-icons'), $filename);
            $validated['icon'] = 'hard-skill-icons/' . $filename;
        }
        $hardSkill = HardSkill::create($validated);
        
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['data' => $hardSkill], 201);
        }
        return redirect()->route('hard-skills.index')->with('success', 'Hard Skill created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, HardSkill $hardSkill)
    {
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['data' => $hardSkill]);
        }
        return view('hard-skills.show', ['hardSkill' => $hardSkill]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, HardSkill $hardSkill)
    {
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['message' => 'Not supported for API'], 405);
        }
        return view('hard-skills.edit', ['hardSkill' => $hardSkill]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HardSkill $hardSkill)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:255',
            'proficiency_level' => 'nullable|integer|min:1|max:5',
        ]);
        if ($request->hasFile('icon')) {
            $filename = uniqid() . '-' . $request->file('icon')->getClientOriginalName();
            $request->file('icon')->move(public_path('hard-skill-icons'), $filename);
            $validated['icon'] = 'hard-skill-icons/' . $filename;
        }
        $hardSkill->update($validated);
        
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['data' => $hardSkill]);
        }
        return redirect()->route('hard-skills.index')->with('success', 'Hard Skill updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, HardSkill $hardSkill)
    {
        $hardSkill->delete();
        
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['message' => 'Hard Skill deleted']);
        }
        return redirect()->route('hard-skills.index')->with('success', 'Hard Skill deleted!');
    }
}
