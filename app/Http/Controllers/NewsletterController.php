<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Inertia\Inertia;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterMail;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Admin/Newsletter/Newsletter', [
            'news_letter' => Newsletter::select('id', 'email', 'status')
                ->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function email(Request $request)
    {
        $request->validate([
            'newsContent' => 'required',
        ]);
        $all_subscribers = [];
        $emails = Newsletter::select('id', 'email', 'status')->get();
        foreach ($emails as $email) {
            array_push($all_subscribers, $email->email);
        }
        if(count($all_subscribers) == 0) {
            return response()->success();
        }
        $status = ['content'=>$request->newsContent];
        Mail::to($request->email)->send(new NewsletterMail($status));
        return response()->success();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'email'=>'required|email|unique:newsletters,email'
        ]);
        Newsletter::create([
            'email'=>$request->email,
            'status'=>0
        ]);
        return response()->success();
    }

    /**
     * Display the specified resource.
     */
    public function show(Newsletter $newsletter): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Newsletter $newsletter): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Newsletter $newsletter): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Newsletter::where('id', $id)->delete();
        return response()->success();
    }
}
