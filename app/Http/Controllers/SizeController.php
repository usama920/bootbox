<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Inertia\Inertia;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Inertia\Response
    {
        return Inertia::render('Admin/ProductDetail/Size', [
            'sizes' => Size::select('id', 'name')->paginate(10)
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
            'name' => 'required|string|unique:size,name,'.$request->id,
        ]);
        Size::updateOrCreate([
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
            return response()->success(Size::where('id', $id)->first());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Size $size): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Size $size): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Size::where('id', $id)->delete();
        return response()->success();
    }
}
