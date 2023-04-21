<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\SliderImages;
use App\Models\SocialLinks;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;

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
        $contact_email = json_decode($request->contact_email, true);
        $contact_number = json_decode($request->contact_number, true);
        $social_facebook = json_decode($request->social_facebook, true);
        $social_instagram = json_decode($request->social_instagram, true);
        $social_twitter = json_decode($request->social_twitter, true);
        $question_text = json_decode($request->question_text, true);
        $social_email = json_decode($request->social_email, true);
        $questions = json_decode($request->questions, true);
        $previous_img = json_decode($request->previous_images, true);
        $length = json_decode($request->length, true);

        if (!empty($length) && $length > 0 && !empty($previous_img) && count($previous_img) !== 0){
            foreach ($previous_img as $item) {
                if(!empty($item)){
                    if (File::exists(storage_path('/app/public/images/slider/') . $item['image'])) {
                        File::delete(storage_path('/app/public/images/slider/') . $item['image']);
                    }
                    SliderImages::truncate();
                }
            }
        }

        for ($i=1; $i <= $length; $i++ ){
            if ($request->hasFile('image'.$i)) {
                $file1 = $request->file('image'.$i)->getClientOriginalName();
                $filename1 = pathinfo($file1, PATHINFO_FILENAME);
                $extension1 = pathinfo($file1, PATHINFO_EXTENSION);
                $image = $filename1.'-'.time().'.'.$extension1;
                $request->file('image'.$i)->move(public_path('storage/images/slider'), $image);

                SliderImages::updateOrCreate([
                    'id'=> null,
                ],[
                    'image' => $image,
                    'status' => 0,
                ]);
            }
        }

        SocialLinks::updateOrCreate([
            'id'=>1
        ],[
            "contact_email" => $contact_email ?? '',
            "contact_number" => $contact_number ?? '',
            "social_facebook" => $social_facebook ?? '',
            "social_instagram" => $social_instagram ?? '',
            "social_twitter" => $social_twitter ?? '',
            "social_email" => $social_email ?? '',
            "question_text" => $question_text ?? '',
        ]);

        if (!empty($questions)){
            foreach ($questions as $data)
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
        $images = SliderImages::all();
        return response()->json(['data1'=>$social, 'data2' =>$question, 'data3' => $images]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function footerContent()
    {
        $data = SocialLinks::select('contact_email', 'contact_number', 'social_facebook', 'social_instagram', 'social_twitter', 'social_email')->first();
        return response()->success($data);
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
