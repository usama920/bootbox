<?php

namespace App\Http\Controllers;

use App\Models\TierLevel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Inertia\Inertia;

class TierLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Inertia\Response
    {
        return Inertia::render('Admin/ProductDetail/TierLevel', [
            'tier_levels' => TierLevel::select('id', 'name')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:tier_levels,name,'.$request->id,
        ]);
        TierLevel::updateOrCreate([
            'id'=>$request->id,
        ],[
            'name'=>$request->name ?? '',
        ]);
        return response()->success();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if(!empty($id))
            return response()->success(TierLevel::where('id', $id)->first());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TierLevel $category): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TierLevel $tier_level): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        TierLevel::where('id', $id)->delete();
        return response()->success();
    }
}
