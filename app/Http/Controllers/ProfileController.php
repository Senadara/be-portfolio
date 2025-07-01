<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['data' => \App\Models\Profile::all()]);
        }
        return view('profiles.index', ['profiles' => \App\Models\Profile::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['message' => 'Not supported for API'], 405);
        }
        return view('profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'email' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'photo' => 'nullable|string|max:255',
        ]);
        $profile = \App\Models\Profile::create($validated);
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['data' => $profile], 201);
        }
        return redirect()->route('profiles.index')->with('success', 'Profile created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, \App\Models\Profile $profile)
    {
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['data' => $profile]);
        }
        return view('profiles.show', ['profile' => $profile]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, \App\Models\Profile $profile)
    {
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['message' => 'Not supported for API'], 405);
        }
        return view('profiles.edit', ['profile' => $profile]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, \App\Models\Profile $profile)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'email' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'photo' => 'nullable|string|max:255',
        ]);
        $profile->update($validated);
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['data' => $profile]);
        }
        return redirect()->route('profiles.index')->with('success', 'Profile updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, \App\Models\Profile $profile)
    {
        $profile->delete();
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['message' => 'Profile deleted']);
        }
        return redirect()->route('profiles.index')->with('success', 'Profile deleted!');
    }
}
