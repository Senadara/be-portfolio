<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Http\Resources\PortfolioResource;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->expectsJson() || $request->wantsJson()) {
            return PortfolioResource::collection(Portfolio::all());
        }
        return view('portfolios.index', ['portfolios' => Portfolio::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['message' => 'Not supported for API'], 405);
        }
        return view('portfolios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $filename = uniqid() . '-' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('portfolio-images'), $filename);
            $validated['image'] = 'portfolio-images/' . $filename;
        }
        $portfolio = Portfolio::create($validated);
        if ($request->expectsJson() || $request->wantsJson()) {
            $portfolio->image_url = $portfolio->getImageUrl('image');
            return response()->json(['data' => $portfolio], 201);
        }
        return redirect()->route('portfolios.index')->with('success', 'Portfolio created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Portfolio $portfolio)
    {
        if ($request->expectsJson() || $request->wantsJson()) {
            return new PortfolioResource($portfolio);
        }
        return view('portfolios.show', ['portfolio' => $portfolio]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, \App\Models\Portfolio $portfolio)
    {
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['message' => 'Not supported for API'], 405);
        }
        return view('portfolios.edit', ['portfolio' => $portfolio]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $filename = uniqid() . '-' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('portfolio-images'), $filename);
            $validated['image'] = 'portfolio-images/' . $filename;
        }
        $portfolio->update($validated);
        if ($request->expectsJson() || $request->wantsJson()) {
            $portfolio->image_url = $portfolio->getImageUrl('image');
            return response()->json(['data' => $portfolio]);
        }
        return redirect()->route('portfolios.index')->with('success', 'Portfolio updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Portfolio $portfolio)
    {
        $portfolio->delete();
        if ($request->expectsJson() || $request->wantsJson()) {
            return response()->json(['message' => 'Portfolio deleted']);
        }
        return redirect()->route('portfolios.index')->with('success', 'Portfolio deleted!');
    }
}
