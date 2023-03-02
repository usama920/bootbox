<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Inertia\Inertia;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Admin/ProductDetail/Material', [
            'materials' => Material::select('id', 'name')->paginate(10)
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
            'name' => 'required|string|unique:materials,name,'.$request->id,
        ]);
        Material::updateOrCreate([
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
            return response()->success(Material::where('id', $id)->first());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Material $material): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Material $material): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Material::where('id', $id)->delete();
        return response()->success();
    }
}
