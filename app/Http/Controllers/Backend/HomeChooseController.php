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
use App\Models\HomeWhyChoose;


class HomeChooseController extends Controller
{

    public function index()
    {
        $data = HomeWhyChoose::wherenull('deleted_by')->get();
        return view('backend.home.choose.index', compact('data'));
    }
    
    
    public function create(Request $request)
    { 
        return view('backend.home.choose.create');
    }


    public function store(Request $request)
    {

        // Validation
        $validatedData = $request->validate([
            'banner_heading'         => 'required|string|max:255',
            'banner_title'           => 'required|string|max:255',
            'calculation_images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'calculation_titles.*' => 'required|string|max:255',
            'calculation_descriptions.*' => 'required|string',
            'detailed_description'   => 'required|string',
            'section_heading'        => 'required|string|max:255',
            'section_image'          => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'banner_heading.required' => 'Please enter the Banner Heading.',
            'banner_heading.string'   => 'Banner Heading must be valid text.',
            'banner_heading.max'      => 'Banner Heading must not exceed 255 characters.',

            'banner_title.required'   => 'Please enter the Banner Title.',
            'banner_title.string'     => 'Banner Title must be valid text.',
            'banner_title.max'        => 'Banner Title must not exceed 255 characters.',

            'calculation_images.*.required' => 'Please upload a Calculation image.',
            'calculation_images.*.image'    => 'Calculation image must be a valid image file.',
            'calculation_images.*.mimes'    => 'Only JPG, JPEG, PNG, and WEBP formats are allowed for Calculation image.',
            'calculation_images.*.max'      => 'Calculation image must not exceed 2MB.',

            'calculation_titles.*.required' => 'Please enter a title for each calculation.',
            'calculation_titles.*.string'   => 'Each calculation title must be text.',
            'calculation_titles.*.max'      => 'Calculation title must not exceed 255 characters.',

            'calculation_descriptions.*.required' => 'Please enter a description for each calculation.',
            'calculation_descriptions.*.string'   => 'Each calculation description must be valid text.',

            'detailed_description.required' => 'Please enter a detailed description.',
            'detailed_description.string'   => 'Detailed description must be valid text.',

            'section_heading.required' => 'Please enter the Section Heading.',
            'section_heading.string'   => 'Section Heading must be valid text.',
            'section_heading.max'      => 'Section Heading must not exceed 255 characters.',

            'section_image.required' => 'Please upload a Section Image.',
            'section_image.image'    => 'Section Image must be a valid image file.',
            'section_image.mimes'    => 'Only JPG, JPEG, PNG, and WEBP formats are allowed for Section Image.',
            'section_image.max'      => 'Section Image must not exceed 2MB.',
        ]);

        // Handle Section Image Upload
        $sectionImageName = null;
        if ($request->hasFile('section_image')) {
            $sectionImage = $request->file('section_image');
            $sectionImageName = time() . rand(100, 999) . '.' . $sectionImage->getClientOriginalExtension();
            $sectionImage->move(public_path('uploads/home/'), $sectionImageName);
        }


        // Handle Calculation Data
        $calculationImages = [];
        $calculationTitles = $request->calculation_titles ?? [];
        $calculationDescriptions = $request->calculation_descriptions ?? [];

        if ($request->hasFile('calculation_images')) {
            foreach ($request->file('calculation_images') as $index => $calculationImage) {
                if ($calculationImage->isValid()) {
                    $calculationImageName = time() . rand(10, 999) . '.' . $calculationImage->getClientOriginalExtension();
                    $calculationImage->move(public_path('uploads/home/'), $calculationImageName);
                    $calculationImages[] = $calculationImageName;
                }
            }
        }

        $maxCount = max(count($calculationImages), count($calculationTitles), count($calculationDescriptions));

        $calculationImages = array_pad($calculationImages, $maxCount, null);
        $calculationTitles = array_pad($calculationTitles, $maxCount, '');
        $calculationDescriptions = array_pad($calculationDescriptions, $maxCount, '');


        
        // Create main record
        $homeWhyChoose = new HomeWhyChoose();
        $homeWhyChoose->banner_heading = $validatedData['banner_heading'];
        $homeWhyChoose->banner_title = $validatedData['banner_title'];
        $homeWhyChoose->detailed_description = $validatedData['detailed_description'];
        $homeWhyChoose->section_heading = $validatedData['section_heading'];
        $homeWhyChoose->section_image = $sectionImageName;
        $homeWhyChoose->section_images = json_encode($calculationImages);
        $homeWhyChoose->section_titles = json_encode($calculationTitles); 
        $homeWhyChoose->section_descriptions = json_encode($calculationDescriptions);
        $homeWhyChoose->created_at = Carbon::now(); 
        $homeWhyChoose->created_by = Auth::user()->id;
        $homeWhyChoose->save();


        return redirect()->route('home-why-choose.index')->with('message', 'Section created successfully.');
    }

}