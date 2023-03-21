<?php

namespace App\Http\Controllers;

use App\Models\WeeklyMargin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Inertia\Inertia;

class WeeklyMarginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Admin/ProductDetail/WeeklyMargin');
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
           'margin_amount'=>'required'
        ]);
        WeeklyMargin::updateOrCreate([
            'id'=>1
        ],[
            'margin_amount'=>$request->margin_amount
        ]);
        return response()->success();
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return response()->success(WeeklyMargin::select('margin_amount')->first());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WeeklyMargin $weeklyMargin): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WeeklyMargin $weeklyMargin): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WeeklyMargin $weeklyMargin): RedirectResponse
    {
        //
    }
}
