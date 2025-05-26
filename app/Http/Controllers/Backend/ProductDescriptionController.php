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
use App\Models\ProductDescription;


class ProductDescriptionController extends Controller
{

    public function index()
    {
        $descriptions = ProductDescription::with('product')->wherenull('deleted_by')->latest()->get(); 
        return view('backend.store.product-desc.index', compact('descriptions'));
    }
    
    
    public function create(Request $request)
    { 
        $products = Product::orderBy('id', 'asc')->wherenull('deleted_by')->get();
        return view('backend.store.product-desc.create', compact('products'));
    }


    public function store(Request $request)
    {
        // Validate request inputs
            // Validate request inputs
        $validatedData = $request->validate([
            'product_id' => 'required|exists:master_product,id',
            'banner_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'product_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'product_description' => 'required|string',

            // Existing capacitance and voltage fields
            'capacitance_heading' => 'required|string',
            'capacitance_description' => 'required|string',
            'voltage_heading' => 'required|string',
            'voltage_description' => 'required|string',

            // New Characteristic Details
            'characteristics_heading' => 'required|string',
            'characteristics_description' => 'required|string',

            // New Leads Details
            'leads_heading' => 'required|string',
            'leads_description' => 'required|string',

            // New Special Features Details
            'special_heading' => 'required|string',
            'special_description' => 'required|string',
            'special_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',

            // Information Headers and Details
            'info_header.*' => 'required|string',
            'd1.*' => 'nullable|string',
            'd2.*' => 'nullable|string',
            'd3.*' => 'nullable|string',
            'd4.*' => 'nullable|string',
            'd5.*' => 'nullable|string',
            'd6.*' => 'nullable|string',
            'd7.*' => 'nullable|string',
            'd8.*' => 'nullable|string',

            // Print images (multiple)
            'print_image.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            // Existing fields continued...
            'header.*' => 'nullable|string',
            'case_style.*' => 'nullable|string',
            'commercial.*' => 'nullable|string',
            'mil.*' => 'nullable|string',
            'straight_leads.*' => 'nullable|string',
            'crimped_leads.*' => 'nullable|string',

            'operating_heading' => 'required|string',
            'operating_description' => 'required|string',

            'marking_heading' => 'required|string',
            'marking_description' => 'required|string',

            'ordering_heading' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',

            'style_heading' => 'required|string',
            'style_description' => 'required|string',

        ], [
            // Custom validation messages
            'product_id.required' => 'Please select a product.',
            'product_id.exists' => 'The selected product is invalid.',

            'banner_image.required' => 'Please upload a banner image.',
            'banner_image.image' => 'The banner must be an image.',
            'banner_image.mimes' => 'Banner image must be jpg, jpeg, png, or webp.',
            'banner_image.max' => 'Banner image must not exceed 2MB.',

            'product_image.required' => 'Please upload a product image.',
            'product_image.image' => 'The product image must be an image.',
            'product_image.mimes' => 'Product image must be jpg, jpeg, png, or webp.',
            'product_image.max' => 'Product image must not exceed 2MB.',

            'product_description.required' => 'Please enter a product description.',

            'capacitance_heading.required' => 'Please enter a heading for Capacitance Range.',
            'capacitance_description.required' => 'Please enter a description for Capacitance Range.',
            'voltage_heading.required' => 'Please enter a heading for Voltage Range.',
            'voltage_description.required' => 'Please enter a description for Voltage Range.',

            'header.*.string' => 'Each Capacitance Header must be a valid string.',
            'case_style.*.string' => 'Each Case Style must be a valid string.',
            'commercial.*.string' => 'Each Commercial entry must be a valid string.',
            'mil.*.string' => 'Each MIL entry must be a valid string.',
            'straight_leads.*.string' => 'Each Straight Lead must be a valid string.',
            'crimped_leads.*.string' => 'Each Crimped Lead must be a valid string.',


            'operating_heading.required' => 'Please enter a heading for Operating Temperature.',
            'operating_description.required' => 'Please enter a description for Operating Temperature.',

            'marking_heading.required' => 'Please enter a heading for Marking Details.',
            'marking_description.required' => 'Please enter a description for Marking Details.',

            'ordering_heading.required' => 'Please enter a heading for Ordering Code.',
            'image.required' => 'Please upload an image for Ordering Code.',
            'image.image' => 'The uploaded file must be an image.',
            'image.mimes' => 'Only jpg, jpeg, png, or webp formats are allowed.',
            'image.max' => 'The image must not exceed 2MB in size.',

            'style_heading.required' => 'Please enter a heading for Style Details.',
            'style_description.required' => 'Please enter a description for Style Details.',


            'characteristics_heading.required' => 'Please enter a heading for Characteristic Details.',
            'characteristics_description.required' => 'Please enter a description for Characteristic Details.',
            'leads_heading.required' => 'Please enter a heading for Leads Details.',
            'leads_description.required' => 'Please enter a description for Leads Details.',
            'special_heading.required' => 'Please enter a heading for Special Features.',
            'special_description.required' => 'Please enter a description for Special Features.',
            'special_image.required' => 'Please upload an image for Special Features.',
            'special_image.image' => 'Special Features image must be an image.',
            'special_image.mimes' => 'Special Features image must be jpg, jpeg, png, or webp.',
            'special_image.max' => 'Special Features image must not exceed 2MB.',

            'info_header.*.required' => 'Each Information header is required.',

            'print_image.*.image' => 'Print images must be valid images.',
            'print_image.*.mimes' => 'Print images must be jpg, jpeg, png, or webp.',
            'print_image.*.max' => 'Each print image must not exceed 2MB.',


        ]);

        // Handle banner image upload
        $bannerImageName = null;
        if ($request->hasFile('banner_image')) {
            $banner = $request->file('banner_image');
            $bannerImageName = time() . rand(10, 999) . '.' . $banner->getClientOriginalExtension();
            $banner->move(public_path('uploads/product/'), $bannerImageName);
        }

        // Handle product image upload
        $productImageName = null;
        if ($request->hasFile('product_image')) {
            $product = $request->file('product_image');
            $productImageName = time() . rand(1000, 9999) . '.' . $product->getClientOriginalExtension();
            $product->move(public_path('uploads/product/'), $productImageName);
        }

        // Handle ordering code image upload
        $orderingImageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $orderingImageName = time() . rand(10000, 99999) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/product/'), $orderingImageName);
        }

        // Handle special image upload
        $specialImageName = null;
        if ($request->hasFile('special_image')) {
            $specialImage = $request->file('special_image');
            $specialImageName = time() . rand(100000, 999999) . '.' . $specialImage->getClientOriginalExtension();
            $specialImage->move(public_path('uploads/product/'), $specialImageName);
        }

        // Handle multiple print images upload
        $printImageNames = [];
        if ($request->hasFile('print_image')) {
            foreach ($request->file('print_image') as $index => $printImage) {
                if ($printImage) {
                    $filename = time() . rand(1000, 9999) . '.' . $printImage->getClientOriginalExtension();
                    $printImage->move(public_path('uploads/product/'), $filename);
                    $printImageNames[] = $filename;
                }
            }
        }

        // Prepare dynamic Capacitance Headers
        $capHeaders = array_filter($request->input('header', []));

        // Prepare dynamic Capacitance Specifications table rows
        $rowCount = count($request->input('case_style', []));
        $specRows = [];
        for ($i = 0; $i < $rowCount; $i++) {
            $specRows[] = [
                'case_style' => $request->case_style[$i] ?? null,
                'commercial' => $request->commercial[$i] ?? null,
                'mil' => $request->mil[$i] ?? null,
                'straight_leads' => $request->straight_leads[$i] ?? null,
                'crimped_leads' => $request->crimped_leads[$i] ?? null,
            ];
        }

        // Prepare Information Headers & Details
        $infoHeaders = $request->input('info_header', []);
        $infoDetails = [];
        $detailCount = count($request->input('d1', [])); 

        for ($i = 0; $i < $detailCount; $i++) {
            $infoDetails[] = [
                'd1' => $request->d1[$i] ?? null,
                'd2' => $request->d2[$i] ?? null,
                'd3' => $request->d3[$i] ?? null,
                'd4' => $request->d4[$i] ?? null,
                'd5' => $request->d5[$i] ?? null,
                'd6' => $request->d6[$i] ?? null,
                'd7' => $request->d7[$i] ?? null,
                'd8' => $request->d8[$i] ?? null,
            ];
        }

        // Save to database
        ProductDescription::create([
            'product_id' => $validatedData['product_id'],
            'banner_image' => $bannerImageName,
            'product_image' => $productImageName,
            'product_description' => $validatedData['product_description'],

            'characteristics_heading' => $validatedData['characteristics_heading'],
            'characteristics_description' => $validatedData['characteristics_description'],

            'capacitance_heading' => $validatedData['capacitance_heading'],
            'capacitance_description' => $validatedData['capacitance_description'],
            'voltage_heading' => $validatedData['voltage_heading'],
            'voltage_description' => $validatedData['voltage_description'],

            'leads_heading' => $validatedData['leads_heading'],
            'leads_description' => $validatedData['leads_description'],

            'special_heading' => $validatedData['special_heading'],
            'special_description' => $validatedData['special_description'],
            'special_image' => $specialImageName,

            // Capacitance headers and spec rows saved as JSON
            'header' => json_encode($capHeaders),
            'case_style' => json_encode($specRows),

            'operating_heading' => $validatedData['operating_heading'],
            'operating_description' => $validatedData['operating_description'],

            'marking_heading' => $validatedData['marking_heading'],
            'marking_description' => $validatedData['marking_description'],

            'ordering_heading' => $validatedData['ordering_heading'],
            'image' => $orderingImageName,

            'style_heading' => $validatedData['style_heading'],
            'style_description' => $validatedData['style_description'],

            // Save info headers and details as JSON
            'info_header' => json_encode($infoHeaders),
            'info_details' => json_encode($infoDetails),

            // Save multiple print images as JSON array
            'print_image' => json_encode($printImageNames),

            'created_at' => Carbon::now(),
            'created_by' => Auth::user()->id,
        ]);

        return redirect()->route('product-descriptions.index')->with('message', 'Product description saved successfully.');
    }





    public function edit($id)
    {
        $details = ProductDescription::findOrFail($id);
        $details->header = json_decode($details->header, true); 
        $details->case_style = json_decode($details->case_style, true); 
        $details->info_header = json_decode($details->info_header, true); 
        $details->info_details = json_decode($details->info_details, true); 
        $details->print_image = json_decode($details->print_image, true); 

        $products = Product::orderBy('id', 'asc')->wherenull('deleted_by')->get();
        return view('backend.store.product-desc.edit', compact('details', 'products'));
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|exists:master_product,id',
            'banner_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'product_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'product_description' => 'required|string',
        ], [
            'product_id.required' => 'Please select a product.',
            'product_id.exists' => 'The selected product is invalid.',
            'banner_image.image' => 'The banner must be an image.',
            'banner_image.mimes' => 'Banner image must be jpg, jpeg, png, or webp.',
            'banner_image.max' => 'Banner image must not exceed 2MB.',
            'product_image.image' => 'The product image must be an image.',
            'product_image.mimes' => 'Product image must be jpg, jpeg, png, or webp.',
            'product_image.max' => 'Product image must not exceed 2MB.',
            'product_description.required' => 'Please enter a product description.',
        ]);

        $productDesc = ProductDescription::findOrFail($id);

        // Update banner image if uploaded
        if ($request->hasFile('banner_image')) {
            $banner = $request->file('banner_image');
            $bannerImageName = time() . rand(10, 999) . '.' . $banner->getClientOriginalExtension();
            $banner->move(public_path('uploads/product/'), $bannerImageName);
            $productDesc->banner_image = $bannerImageName;
        }

        // Update product image if uploaded
        if ($request->hasFile('product_image')) {
            $product = $request->file('product_image');
            $productImageName = time() . rand(1000, 9999) . '.' . $product->getClientOriginalExtension();
            $product->move(public_path('uploads/product/'), $productImageName);
            $productDesc->product_image = $productImageName;
        }

        // Update other fields
        $productDesc->product_id = $validatedData['product_id'];
        $productDesc->product_description = $validatedData['product_description'];
        $productDesc->modified_at = Carbon::now();
        $productDesc->modified_by = Auth::user()->id;
        $productDesc->save();

        return redirect()->route('product-descriptions.index')->with('message', 'Product description updated successfully.');
    }

    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = ProductDescription::findOrFail($id);
            $industries->update($data);

            return redirect()->route('product-descriptions.index')->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }


}