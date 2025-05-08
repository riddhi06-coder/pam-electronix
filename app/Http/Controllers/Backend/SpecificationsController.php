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
use App\Models\Product; 
use App\Models\Specification;


class SpecificationsController extends Controller
{

    public function index()
    {
        $details = Specification::wherenull('deleted_by')->get(); 
        return view('backend.specifications.index', compact('details'));
    }
    
    
    public function create(Request $request)
    { 
        return view('backend.specifications.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'banner_heading'       => 'required|string|max:255',
            'banner_image'         => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image'                => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'detailed_description' => 'required|string',
            'header'               => 'required|array|min:1',
            'header.*'             => 'required|string|max:255',
            'id'                   => 'nullable|array',
            'temp_coeff'           => 'nullable|array',
            'capacitor_drift'      => 'nullable|array',
        ], [
            'banner_heading.required' => 'Please enter a Banner Heading.',
            'banner_image.required'   => 'Please upload a Banner Image.',
            'image.required'          => 'Please upload an Image.',
            'detailed_description.required' => 'Please enter a detailed description.',
            'header.required'         => 'Please enter at least one header.',
            'header.*.required'       => 'Each header name is required.',
        ]);
    
        // Upload single banner image
        $bannerImage = $request->file('banner_image');
        $bannerImageName = time() . '_banner.' . $bannerImage->getClientOriginalExtension();
        $bannerImage->move(public_path('uploads/specifications'), $bannerImageName);
    
        // Upload main image
        $mainImage = $request->file('image');
        $mainImageName = time() . '_image.' . $mainImage->getClientOriginalExtension();
        $mainImage->move(public_path('uploads/specifications'), $mainImageName);
    
        $productHeadersJson   = json_encode($request->header);
        $specIdsJson            = json_encode($request->id);
        $specTempCoeffJson      = json_encode($request->temp_coeff);
        $specCapacitorDriftJson = json_encode($request->capacitor_drift);
   
        // Save to database
        Specification::create([
            'banner_heading'        => $validated['banner_heading'],
            'banner_image'          => $bannerImageName,
            'image'                 => $mainImageName,
            'detailed_description'  => $validated['detailed_description'],
            'headers'       => $productHeadersJson,
            'spec_ids'              => $specIdsJson,
            'spec_temp_coeff'       => $specTempCoeffJson,
            'spec_capacitor_drift'  => $specCapacitorDriftJson,
            'created_at' => Carbon::now(),
            'created_by' => Auth::user()->id,
        ]);
        
    
        return redirect()->route('manage-specifications.index')->with('message', 'Specification saved successfully.');
    }

    public function edit($id)
    {
        $details = Specification::findOrFail($id);
        return view('backend.specifications.edit', compact('details'));
    }
    

    public function update(Request $request, $id)
    {
        $spec = Specification::findOrFail($id);

        $validated = $request->validate([
            'banner_heading'       => 'required|string|max:255',
            'banner_image'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image'                => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'detailed_description' => 'required|string',
            'header'               => 'required|array|min:1',
            'header.*'             => 'required|string|max:255',
            'id'                   => 'nullable|array',
            'temp_coeff'           => 'nullable|array',
            'capacitor_drift'      => 'nullable|array',
        ], [
            'banner_heading.required' => 'Please enter a Banner Heading.',
            'detailed_description.required' => 'Please enter a detailed description.',
            'header.required'         => 'Please enter at least one header.',
            'header.*.required'       => 'Each header name is required.',
        ]);

        // Handle optional banner image upload
        if ($request->hasFile('banner_image')) {
            $bannerImage = $request->file('banner_image');
            $bannerImageName = time() . '_banner.' . $bannerImage->getClientOriginalExtension();
            $bannerImage->move(public_path('uploads/specifications'), $bannerImageName);
        } else {
            $bannerImageName = $spec->banner_image; 
        }

        // Handle optional main image upload
        if ($request->hasFile('image')) {
            $mainImage = $request->file('image');
            $mainImageName = time() . '_image.' . $mainImage->getClientOriginalExtension();
            $mainImage->move(public_path('uploads/specifications'), $mainImageName);
        } else {
            $mainImageName = $spec->image; 
        }

        $spec->update([
            'banner_heading'        => $validated['banner_heading'],
            'banner_image'          => $bannerImageName,
            'image'                 => $mainImageName,
            'detailed_description'  => $validated['detailed_description'],
            'headers'               => json_encode($request->header),
            'spec_ids'              => json_encode($request->id),
            'spec_temp_coeff'       => json_encode($request->temp_coeff),
            'spec_capacitor_drift'  => json_encode($request->capacitor_drift),
            'modified_at'            => Carbon::now(),
            'modified_by'            => Auth::user()->id,
        ]);

        return redirect()->route('manage-specifications.index')->with('message', 'Specification updated successfully.');
    }


    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = Specification::findOrFail($id);
            $industries->update($data);

            return redirect()->route('manage-specifications.index')->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }

}