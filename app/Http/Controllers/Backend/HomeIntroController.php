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
        $homeIntros = HomeIntro::wherenull('deleted_by')->get(); 
        return view('backend.home.intro.index', compact('homeIntros'));
    }
    

    public function create(Request $request)
    { 
        return view('backend.home.intro.create');
    }


    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'banner_image'     => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'section_image'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',  // Optional for section_image
            'description'      => 'required|string',
            'section_heading'  => 'required|string|max:255',
        ], [
            'banner_image.required' => 'Please upload an image.',
            'banner_image.image'    => 'The uploaded file must be an image.',
            'banner_image.mimes'    => 'Only JPG, JPEG, PNG, and WEBP formats are allowed.',
            'banner_image.max'      => 'The image size must not exceed 2MB.',
        
            'section_image.image'   => 'The uploaded file for section image must be an image.',
            'section_image.mimes'   => 'Only JPG, JPEG, PNG, and WEBP formats are allowed for the section image.',
            'section_image.max'     => 'The section image size must not exceed 2MB.',
        
            'description.required'  => 'Please enter a description.',
            'description.string'    => 'The description must be a valid text.',
        
            'section_heading.required' => 'Please enter a section heading.',
            'section_heading.string'   => 'The section heading must be a valid text.',
            'section_heading.max'      => 'The section heading may not be greater than 255 characters.',
        ]);
    
        // Image handling for banner_image
        $imageName = null;
    
        if ($request->hasFile('banner_image')) {
            $image = $request->file('banner_image');
            $imageName = time() . rand(10, 999) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/home/'), $imageName);
        }
    
        // Image handling for section_image
        $sectionimageName = null;
    
        if ($request->hasFile('section_image')) {
            $image = $request->file('section_image');
            $sectionimageName = time() . rand(10, 999) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/home/'), $sectionimageName);
        }
    
        // Save data to the database
        $homeIntro = new HomeIntro();
        $homeIntro->banner_image = $imageName;         // Corrected to use $imageName for banner image
        $homeIntro->section_image = $sectionimageName; // Corrected to use $sectionimageName for section image
        $homeIntro->description = $validatedData['description'];
        $homeIntro->section_heading = $validatedData['section_heading'];
        $homeIntro->created_at = Carbon::now(); 
        $homeIntro->created_by = Auth::user()->id;
        $homeIntro->save();
    
        // Redirect with success message
        return redirect()->route('home-intro.index')->with('message', 'Introduction created successfully.');
    }
    

    public function edit($id)
    {
        $intro = HomeIntro::findOrFail($id);
        return view('backend.home.intro.edit', compact('intro'));
    }


    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'banner_image'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'section_image'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description'      => 'required|string',
            'section_heading'  => 'required|string|max:255',
        ], [
            'banner_image.image'    => 'The uploaded file for the banner image must be an image.',
            'banner_image.mimes'    => 'Only JPG, JPEG, PNG, and WEBP formats are allowed for the banner image.',
            'banner_image.max'      => 'The banner image size must not exceed 2MB.',
    
            'section_image.image'   => 'The uploaded file for the section image must be an image.',
            'section_image.mimes'   => 'Only JPG, JPEG, PNG, and WEBP formats are allowed for the section image.',
            'section_image.max'     => 'The section image size must not exceed 2MB.',
    
            'description.required'  => 'Please enter a description.',
            'description.string'    => 'The description must be a valid text.',
    
            'section_heading.required' => 'Please enter a section heading.',
            'section_heading.string'   => 'The section heading must be a valid text.',
            'section_heading.max'      => 'The section heading may not be greater than 255 characters.',
        ]);
    
        // Find the HomeIntro record by ID
        $homeIntro = HomeIntro::findOrFail($id);
    
        // Handle banner image upload if a new image is provided
        if ($request->hasFile('banner_image')) {
            $image = $request->file('banner_image');
            $imageName = time() . rand(10, 999) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/home/'), $imageName);
            $homeIntro->banner_image = $imageName;
        }
    
        // Handle section image upload if a new image is provided
        if ($request->hasFile('section_image')) {
            $image = $request->file('section_image');
            $sectionimageName = time() . rand(10, 999) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/home/'), $sectionimageName);
            $homeIntro->section_image = $sectionimageName;
        }
    
        // Update other fields
        $homeIntro->description = $validatedData['description'];
        $homeIntro->section_heading = $validatedData['section_heading'];
        $homeIntro->modified_at = Carbon::now(); 
        $homeIntro->modified_by = Auth::user()->id;
    
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