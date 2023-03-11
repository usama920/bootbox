<?php

namespace App\Http\Controllers;

use App\Models\Term;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Inertia\Inertia;

class TermController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Inertia\Response
    {
        return Inertia::render('User/Terms', [
            'terms' => Term::select('intro', 'agreement')->first()
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
//        dd($request->all());
        Term::updateOrCreate([
            'id'=>1,
        ],[
            'agreement'=> $request->agreement ?? '',
            'intro'=>$request->intro ?? '',
        ]);
        return response()->success();
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return response()->success(Term::select('intro', 'agreement')->first());

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Term $term): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Term $term): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Term $term): RedirectResponse
    {
        //
    }
}
