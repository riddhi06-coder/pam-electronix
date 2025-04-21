<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Carbon\Carbon;
use App\Models\HomeIntro;


class HomeIntroController extends Controller
{

    public function index()
    {
        $homeIntros = HomeIntro::get(); 
        return view('backend.home.intro.index', compact('homeIntros'));
    }
    

    public function create(Request $request)
    { 
        return view('backend.home.intro.create');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'banner_image'     => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description'      => 'required|string',
            'section_heading'  => 'required|string|max:255',
        ], [
            'banner_image.required' => 'Please upload an image.',
            'banner_image.image'    => 'The uploaded file must be an image.',
            'banner_image.mimes'    => 'Only JPG, JPEG, PNG, and WEBP formats are allowed.',
            'banner_image.max'      => 'The image size must not exceed 2MB.',
        
            'description.required'  => 'Please enter a description.',
            'description.string'    => 'The description must be a valid text.',
        
            'section_heading.required' => 'Please enter a section heading.',
            'section_heading.string'   => 'The section heading must be a valid text.',
            'section_heading.max'      => 'The section heading may not be greater than 255 characters.',
        ]);
        

        // Image handling
        $imageName = null;

        if ($request->hasFile('banner_image')) {
            $image = $request->file('banner_image');
            $imageName = time() . rand(10, 999) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/home/'), $imageName);
        }

        // Save to database
        $homeIntro = new HomeIntro();
        $homeIntro->banner_image = $imageName;
        $homeIntro->description = $validatedData['description'];
        $homeIntro->section_heading = $validatedData['section_heading'];
        $homeIntro->save();

        return redirect()->route('home-intro.index')->with('message', 'Introduction created successfully.');
    }

    public function edit($id)
    {
        $intro = HomeIntro::findOrFail($id);
        return view('backend.home.intro.edit', compact('intro'));
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'banner_image'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description'      => 'required|string',
            'section_heading'  => 'required|string|max:255',
        ], [
            'banner_image.image'    => 'The uploaded file must be an image.',
            'banner_image.mimes'    => 'Only JPG, JPEG, PNG, and WEBP formats are allowed.',
            'banner_image.max'      => 'The image size must not exceed 2MB.',

            'description.required'  => 'Please enter a description.',
            'description.string'    => 'The description must be a valid text.',

            'section_heading.required' => 'Please enter a section heading.',
            'section_heading.string'   => 'The section heading must be a valid text.',
            'section_heading.max'      => 'The section heading may not be greater than 255 characters.',
        ]);

        $homeIntro = HomeIntro::findOrFail($id);

        // Image handling
        if ($request->hasFile('banner_image')) {
        
            $image = $request->file('banner_image');
            $imageName = time() . rand(10, 999) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/home/'), $imageName);
            $homeIntro->banner_image = $imageName;
        }

        $homeIntro->description = $validatedData['description'];
        $homeIntro->section_heading = $validatedData['section_heading'];
        $homeIntro->save();

        return redirect()->route('home-intro.index')->with('message', 'Introduction updated successfully.');
    }


    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = HomeIntro::findOrFail($id);
            $industries->update($data);

            return redirect()->route('home-intro.index')->with('message', 'Introduction deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }

}