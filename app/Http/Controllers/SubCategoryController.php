<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Inertia\Inertia;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Inertia\Response
    {
        return Inertia::render('Admin/ProductDetail/SubCategory', [
            'subCategories' => SubCategory::select('id', 'name', 'categories_id')->with('CategoryData')->paginate(5),
            'categories' => Category::select('id', 'name')->get()
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
            'name' => 'required|string|unique:sub_categories,name,'.$request->id,
            'category' => 'required',
        ]);
        SubCategory::updateOrCreate([
            'id'=>$request->id,
        ],[
            'name'=>$request->name ?? '',
            'categories_id'=>$request->category ?? '',
            'sub_category_slug'=>Str::slug($request->name ?? ''),
        ]);
        return response()->success();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if(!empty($id))
            return response()->success(SubCategory::where('id', $id)->with('CategoryData')->first());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subCategory): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubCategory $subCategory): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        SubCategory::where('id', $id)->delete();
        return response()->success();
    }
}
