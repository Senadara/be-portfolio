<?php

namespace App\Http\Controllers;

use App\Models\SoftSkill;
use Illuminate\Http\Request;

class SoftSkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['data' => SoftSkill::all()]);
        }
        return view('soft-skills.index', ['softSkills' => SoftSkill::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['message' => 'Not supported for API'], 405);
        }
        return view('soft-skills.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:255',
            'proficiency_level' => 'nullable|integer|min:1|max:5',
        ]);
        
        $softSkill = SoftSkill::create($validated);
        
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['data' => $softSkill], 201);
        }
        return redirect()->route('soft-skills.index')->with('success', 'Soft Skill created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, SoftSkill $softSkill)
    {
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['data' => $softSkill]);
        }
        return view('soft-skills.show', ['softSkill' => $softSkill]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, SoftSkill $softSkill)
    {
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['message' => 'Not supported for API'], 405);
        }
        return view('soft-skills.edit', ['softSkill' => $softSkill]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SoftSkill $softSkill)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:255',
            'proficiency_level' => 'nullable|integer|min:1|max:5',
        ]);
        
        $softSkill->update($validated);
        
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['data' => $softSkill]);
        }
        return redirect()->route('soft-skills.index')->with('success', 'Soft Skill updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, SoftSkill $softSkill)
    {
        $softSkill->delete();
        
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['message' => 'Soft Skill deleted']);
        }
        return redirect()->route('soft-skills.index')->with('success', 'Soft Skill deleted!');
    }
}
