<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['data' => Tool::all()]);
        }
        return view('tools.index', ['tools' => Tool::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['message' => 'Not supported for API'], 405);
        }
        return view('tools.create');
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
            'category' => 'nullable|string|max:255',
            'proficiency_level' => 'nullable|integer|min:1|max:5',
        ]);
        
        $tool = Tool::create($validated);
        
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['data' => $tool], 201);
        }
        return redirect()->route('tools.index')->with('success', 'Tool created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Tool $tool)
    {
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['data' => $tool]);
        }
        return view('tools.show', ['tool' => $tool]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Tool $tool)
    {
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['message' => 'Not supported for API'], 405);
        }
        return view('tools.edit', ['tool' => $tool]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tool $tool)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:255',
            'proficiency_level' => 'nullable|integer|min:1|max:5',
        ]);
        
        $tool->update($validated);
        
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['data' => $tool]);
        }
        return redirect()->route('tools.index')->with('success', 'Tool updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Tool $tool)
    {
        $tool->delete();
        
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['message' => 'Tool deleted']);
        }
        return redirect()->route('tools.index')->with('success', 'Tool deleted!');
    }
}
