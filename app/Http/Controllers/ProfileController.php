<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Http\Resources\ProfileResource;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->expectsJson() || $request->wantsJson()) {
            return ProfileResource::collection(Profile::all());
        }
        return view('profiles.index', ['profiles' => Profile::all()]);
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
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $filename = uniqid() . '-' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path('profile-photos'), $filename);
            $validated['photo'] = 'profile-photos/' . $filename;
        }

        $profile = Profile::create($validated);
        if ($request->expectsJson() || $request->wantsJson()) {
            return new ProfileResource($profile);
        }
        return redirect()->route('profiles.index')->with('success', 'Profile created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Profile $profile)
    {
        if ($request->expectsJson() || $request->wantsJson()) {
            return new ProfileResource($profile);
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
    public function update(Request $request, Profile $profile)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'email' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $filename = uniqid() . '-' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path('profile-photos'), $filename);
            $validated['photo'] = 'profile-photos/' . $filename;
        }

        $profile->update($validated);
        if ($request->expectsJson() || $request->wantsJson()) {
            return new ProfileResource($profile);
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
