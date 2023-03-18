<?php

namespace App\Http\Controllers;

use App\Mail\ContactReplyMail;
use App\Mail\NewsletterMail;
use App\Models\ContactReply;
use App\Models\UserContact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class ContactReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Inertia\Response
    {
        return Inertia::render('Admin/Contact/UserContact', [
            'user_contact' => UserContact::select('id', 'name', 'email', 'question', 'comment', 'status')
                ->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function status($id)
    {
        $contact = UserContact::select('id', 'status')->where('id', $id)->first();
        if ($contact->status == 1)
            $contact->update(['status'=> 2]);
        return response()->success();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'reply'=>'required',
        ]);
        ContactReply::create([
            'user_contacts_id'=>$request->id,
            'reply'=>$request->reply,
        ]);
        UserContact::select('id', 'status')->where('id', $request->id)->update(['status'=> 3]);
        $status = [
            'name'=>$request->name,
            'question'=>$request->question,
            'content'=>$request->reply,
        ];
        Mail::to($request->email)->send(new ContactReplyMail($status));
        return response()->success();
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactReply $contactReply): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactReply $contactReply): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactReply $contactReply): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        UserContact::where('id', $id)->delete();
        return response()->success();
    }
}
