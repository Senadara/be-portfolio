<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['data' => \App\Models\Achievement::all()]);
        }
        return view('achievements.index', ['achievements' => \App\Models\Achievement::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['message' => 'Not supported for API'], 405);
        }
        return view('achievements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'nullable|date',
            'image' => 'nullable|image|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $filename = uniqid() . '-' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('achievement-images'), $filename);
            $validated['image'] = 'achievement-images/' . $filename;
        }
        $achievement = \App\Models\Achievement::create($validated);
        if ($request->expectsJson() || $request->wantsJson()) {
            $achievement->image_url = $achievement->getImageUrl('image');
            return response()->json(['data' => $achievement], 201);
        }
        return redirect()->route('achievements.index')->with('success', 'Achievement created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, \App\Models\Achievement $achievement)
    {
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['data' => $achievement]);
        }
        return view('achievements.show', ['achievement' => $achievement]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, \App\Models\Achievement $achievement)
    {
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['message' => 'Not supported for API'], 405);
        }
        return view('achievements.edit', ['achievement' => $achievement]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, \App\Models\Achievement $achievement)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'nullable|date',
            'image' => 'nullable|image|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $filename = uniqid() . '-' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('achievement-images'), $filename);
            $validated['image'] = 'achievement-images/' . $filename;
        }
        $achievement->update($validated);
        if ($request->expectsJson() || $request->wantsJson()) {
            $achievement->image_url = $achievement->getImageUrl('image');
            return response()->json(['data' => $achievement]);
        }
        return redirect()->route('achievements.index')->with('success', 'Achievement updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, \App\Models\Achievement $achievement)
    {
        $achievement->delete();
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['message' => 'Achievement deleted']);
        }
        return redirect()->route('achievements.index')->with('success', 'Achievement deleted!');
    }
}
