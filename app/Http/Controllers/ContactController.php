<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Inertia\Inertia;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Inertia\Response
    {
        return Inertia::render('User/Contact', [
            'contact' => Contact::select('phone_text', 'phone', 'email_text', 'email')->first()
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
        Contact::updateOrCreate([
            'id'=>1
        ],[
            "phone_text" => $request->phone_text,
            "phone" => $request->phone,
            "email_text" => $request->email_text,
            "email" => $request->email,
        ]);
        return response()->success();
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return response()->success(
            Contact::select('phone_text', 'phone', 'email_text', 'email')->first()
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact): RedirectResponse
    {
        //
    }
}
