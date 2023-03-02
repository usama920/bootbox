<?php

namespace App\Http\Controllers;

use App\Models\SafetyResistance;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Inertia\Inertia;

class SafetyResistanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Inertia\Response
    {
        return Inertia::render('Admin/ProductDetail/SafetyResistance', [
            'safeties' => SafetyResistance::select('id', 'name')->paginate(10)
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
            'name' => 'required|string|unique:safety_resistances,name,'.$request->id,
        ]);
        SafetyResistance::updateOrCreate([
            'id'=>$request->id,
        ],[
            'name'=>$request->name ?? '',
            'category_slug'=>Str::slug($request->name ?? ''),
        ]);
        return response()->success();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if(!empty($id))
            return response()->success(SafetyResistance::where('id', $id)->first());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SafetyResistance $category): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SafetyResistance $category): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        SafetyResistance::where('id', $id)->delete();
        return response()->success();
    }
}
