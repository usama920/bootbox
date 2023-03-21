<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Inertia\Inertia;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::select('heading', 'description', 'image')->first();
        if (empty($about))
            $about = '';
        return Inertia::render('User/About', [
            'about' => $about
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
//        $image = $request->image;
        $heading = json_decode($request->heading, true);
        $description = json_decode($request->description, true);
        $previous_img = json_decode($request->previous_img, true);

        if ($request->hasFile('image')) {
            $file1 = $request->file('image')->getClientOriginalName();
            $filename1 = pathinfo($file1, PATHINFO_FILENAME);
            $extension1 = pathinfo($file1, PATHINFO_EXTENSION);
            $image = $filename1.'-'.time().'.'.$extension1;
            $request->file('image')->move(public_path('storage/images/about'), $image);

            if (!empty($previous_img)){
                if (File::exists(storage_path('/app/public/images/about/') . $previous_img)) {
                    File::delete(storage_path('/app/public/images/about/') . $previous_img);
                }
            }
        }
        if (empty($image))
            $image=$request->image;
        About::updateOrCreate([
            'id' => 1,
        ],[
            'heading'=>$heading ?? '',
            'description' => $description ?? '',
            'image' => $image ?? '',
        ]);
        return response()->success();
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return response()->success(About::first());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about): RedirectResponse
    {
        //
    }
}
