<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\SocialLinks;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SocialLinksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        //
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
        SocialLinks::updateOrCreate([
            'id'=>1
        ],[
            "contact_email" => $request->contact_email ?? '',
            "contact_number" => $request->contact_number ?? '',
            "social_facebook" => $request->social_facebook ?? '',
            "social_instagram" => $request->social_instagram ?? '',
            "social_twitter" => $request->social_twitter ?? '',
            "social_email" => $request->social_email ?? '',
            "question_text" => $request->question_text ?? '',
        ]);

        if (!empty($request->questions)){
            foreach ($request->questions as $data)
                Question::updateOrCreate([
                    'id'=>$data['id'],
                ],[
                    'question'=>$data['question'],
                    'answer'=>$data['answer'],
                ]);
        }
        return response()->success();
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $social = SocialLinks::select('contact_email', 'contact_number', 'social_facebook', 'social_instagram', 'social_twitter', 'social_email', 'question_text')->first();
        $question = Question::select('id', 'question', 'answer')->get();
        return response()->json(['data1'=>$social, 'data2' =>$question]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SocialLinks $socialLinks): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SocialLinks $socialLinks): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SocialLinks $socialLinks): RedirectResponse
    {
        //
    }
}
