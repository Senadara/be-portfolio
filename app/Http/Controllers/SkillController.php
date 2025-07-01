<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['data' => \App\Models\Skill::all()]);
        }
        return view('skills.index', ['skills' => \App\Models\Skill::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['message' => 'Not supported for API'], 405);
        }
        return view('skills.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);
        $skill = \App\Models\Skill::create($validated);
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['data' => $skill], 201);
        }
        return redirect()->route('skills.index')->with('success', 'Skill created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, \App\Models\Skill $skill)
    {
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['data' => $skill]);
        }
        return view('skills.show', ['skill' => $skill]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, \App\Models\Skill $skill)
    {
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['message' => 'Not supported for API'], 405);
        }
        return view('skills.edit', ['skill' => $skill]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, \App\Models\Skill $skill)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);
        $skill->update($validated);
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['data' => $skill]);
        }
        return redirect()->route('skills.index')->with('success', 'Skill updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, \App\Models\Skill $skill)
    {
        $skill->delete();
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['message' => 'Skill deleted']);
        }
        return redirect()->route('skills.index')->with('success', 'Skill deleted!');
    }
}
