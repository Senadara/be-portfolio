<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['data' => \App\Models\Education::all()]);
        }
        return view('education.index', ['education' => \App\Models\Education::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['message' => 'Not supported for API'], 405);
        }
        return view('education.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'institution' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'start_year' => 'required|integer',
            'end_year' => 'nullable|integer',
            'description' => 'nullable|string',
        ]);
        $education = \App\Models\Education::create($validated);
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['data' => $education], 201);
        }
        return redirect()->route('education.index')->with('success', 'Education created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, \App\Models\Education $education)
    {
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['data' => $education]);
        }
        return view('education.show', ['education' => $education]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, \App\Models\Education $education)
    {
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['message' => 'Not supported for API'], 405);
        }
        return view('education.edit', ['education' => $education]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, \App\Models\Education $education)
    {
        $validated = $request->validate([
            'institution' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'start_year' => 'required|integer',
            'end_year' => 'nullable|integer',
            'description' => 'nullable|string',
        ]);
        $education->update($validated);
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['data' => $education]);
        }
        return redirect()->route('education.index')->with('success', 'Education updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, \App\Models\Education $education)
    {
        $education->delete();
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['message' => 'Education deleted']);
        }
        return redirect()->route('education.index')->with('success', 'Education deleted!');
    }
}
