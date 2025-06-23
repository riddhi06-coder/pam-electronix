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
use App\Models\ChipMica; 



class ChipMicaController extends Controller
{

    public function index()
    {
        return view('backend.store.chip_mica.index');
    }
    
    
    public function create(Request $request)
    { 
        return view('backend.store.chip_mica.create');
    }

    public function store(Request $request)
    {
        dd($request);

        // Step 1: Validate inputs with custom messages
        $validatedData = $request->validate([
            'banner_heading' => 'required|string|max:255',
            'banner_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'detailed_description' => 'required|string',
            'description' => 'required|string',
            'header.*' => 'required|string|max:255',
            'header1.*' => 'required|string|max:255',
            'header2.*' => 'required|string|max:255',
        ], [
            'banner_heading.required' => 'The banner heading is required.',
            'banner_image.required' => 'Please upload a banner image.',
            'banner_image.image' => 'Banner image must be an image file.',
            'banner_image.mimes' => 'Banner image must be a jpg, jpeg, png, or webp file.',
            'banner_image.max' => 'Banner image size must not exceed 2MB.',
            'image.required' => 'Please upload an image.',
            'image.image' => 'Image must be an image file.',
            'image.mimes' => 'Image must be a jpg, jpeg, png, or webp file.',
            'image.max' => 'Image size must not exceed 2MB.',
            'detailed_description.required' => 'Please enter the detailed description.',
            'description.required' => 'Please enter the short description.',
            'header.*.required' => 'All Table 1 headers are required.',
            'header1.*.required' => 'All Table 2 headers are required.',
            'header2.*.required' => 'All Table 3 headers are required.',
        ]);

        // Step 2: Handle file uploads with your method
        $bannerImageName = null;
        if ($request->hasFile('banner_image')) {
            $banner = $request->file('banner_image');
            $bannerImageName = time() . rand(10, 999) . '.' . $banner->getClientOriginalExtension();
            $banner->move(public_path('uploads/product/'), $bannerImageName);
        }

        $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/product/'), $imageName);
        }

        // Step 3: Encode table headers and data
        $table1_headers = json_encode($request->input('header'));
        $table1_data = json_encode([
            'case_type' => $request->input('case_type'),
            'cap' => $request->input('cap'),
            'catalog500' => $request->input('catalog500'),
            'catalog100' => $request->input('catalog100'),
        ]);

        $table2_headers = json_encode($request->input('header1'));
        $table2_data = json_encode([
            'case_type' => $request->input('case_type1'),
            'cap' => $request->input('cap1'),
            'catalog500' => $request->input('catalog5001'),
            'catalog100' => $request->input('catalog1001'),
        ]);

        $table3_headers = json_encode($request->input('header2'));
        $table3_data = json_encode([
            'case_type' => $request->input('case_type2'),
            'cap' => $request->input('cap2'),
            'catalog500' => $request->input('catalog5002'),
            'catalog100' => $request->input('catalog1002'),
        ]);

        // Step 4: Save data to the database
        $chipMica = new ChipMica();
        $chipMica->banner_heading = $request->input('banner_heading');
        $chipMica->banner_image = $bannerImageName;
        $chipMica->image = $imageName;
        $chipMica->detailed_description = $request->input('detailed_description');
        $chipMica->short_description = $request->input('description');

        $chipMica->table1_headers = $table1_headers;
        $chipMica->table1_data = $table1_data;
        $chipMica->table2_headers = $table2_headers;
        $chipMica->table2_data = $table2_data;
        $chipMica->table3_headers = $table3_headers;
        $chipMica->table3_data = $table3_data;
        $chipMica->created_at = Carbon::now();
        $chipMica->created_by = Auth::user()->id;

        $chipMica->save();

        return redirect()->route('manage-chip-mica.index')->with('message', 'Chip Mica data saved successfully!');
    }

}