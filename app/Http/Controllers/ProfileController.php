<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProfileResource;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $profiles = Profile::all();

        if ($request->wantsJson()) {
            return ProfileResource::collection($profiles);
        }

        return view('profiles.index', compact('profiles'));
    }

    public function create(Request $request)
    {
        if ($request->wantsJson()) {
            return response()->json(['message' => 'Not supported for API'], 405);
        }

        return view('profiles.create');
    }

    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'title'   => 'nullable|string|max:255',
            'bio'     => 'nullable|string',
            'email'   => 'nullable|email|max:255',
            'phone'   => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255', // hanya string, koma diperbolehkan
            'photo'   => 'nullable|image|max:2048',
        ]);

        if ($file = $request->file('photo')) {
            $filename = uniqid() . '-' . preg_replace('/[^A-Za-z0-9\.\-_]/', '', $file->getClientOriginalName());
            $destination = public_path('profile-photos');
            if (! file_exists($destination)) {
                mkdir($destination, 0755, true);
            }
            $file->move($destination, $filename);
            $validated['photo'] = 'profile-photos/' . $filename;
        }

        $profile = Profile::create($validated);

        if ($request->wantsJson()) {
            return new ProfileResource($profile);
        }

        return redirect()
            ->route('profiles.index')
            ->with('success', 'Profile berhasil dibuat!');
    }

    public function show(Request $request, Profile $profile)
    {
        if ($request->wantsJson()) {
            return new ProfileResource($profile);
        }

        return view('profiles.show', compact('profile'));
    }

    public function edit(Request $request, Profile $profile)
    {
        if ($request->wantsJson()) {
            return response()->json(['message' => 'Not supported for API'], 405);
        }

        return view('profiles.edit', compact('profile'));
    }

    public function update(Request $request, Profile $profile)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'title'   => 'nullable|string|max:255',
            'bio'     => 'nullable|string',
            'email'   => 'nullable|email|max:255',
            'phone'   => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'photo'   => 'nullable|image|max:2048',
        ]);

        if ($file = $request->file('photo')) {
            $filename = uniqid() . '-' . preg_replace('/[^A-Za-z0-9\.\-_]/', '', $file->getClientOriginalName());
            $destination = public_path('profile-photos');
            if (! file_exists($destination)) {
                mkdir($destination, 0755, true);
            }
            $file->move($destination, $filename);
            $validated['photo'] = 'profile-photos/' . $filename;
        }

        $profile->update($validated);

        if ($request->wantsJson()) {
            return new ProfileResource($profile);
        }

        return redirect()
            ->route('profiles.index')
            ->with('success', 'Profile berhasil diperbarui!');
    }

    public function destroy(Request $request, Profile $profile)
    {
        $profile->delete();

        if ($request->wantsJson()) {
            return response()->json(['message' => 'Profile deleted']);
        }

        return redirect()
            ->route('profiles.index')
            ->with('success', 'Profile berhasil dihapus!');
    }
}
