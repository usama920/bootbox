<?php

namespace App\Http\Controllers;

use App\Models\Style;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Inertia\Inertia;

class StyleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Inertia\Response
    {
        return Inertia::render('Admin/ProductDetail/Style', [
            'styles' => Style::select('id', 'name')->paginate(10)
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
            'name' => 'required|string|unique:styles,name,'.$request->id,

        ]);
        Style::updateOrCreate([
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
            return response()->success(Style::where('id', $id)->first());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Style $style): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Style $style): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Style::where('id', $id)->delete();
        return response()->success();
    }
}
