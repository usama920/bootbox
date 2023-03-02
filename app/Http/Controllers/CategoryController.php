<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Inertia\Inertia;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Inertia\Response
    {
        return Inertia::render('Admin/ProductDetail/Category', [
            'categories' => Category::select('id', 'name')->paginate(10)
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
            'name' => 'required|string|unique:categories,name,'.$request->id,
        ]);
        Category::updateOrCreate([
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
        return response()->success(Category::where('id', $id)->first());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Category::where('id', $id)->delete();
        return response()->success();
    }
}
