<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

use Carbon\Carbon;
use App\Models\Product; 
use App\Models\ProductSpecification;


class ProductSpecificationsController extends Controller
{

    public function index()
    {
        $specs = ProductSpecification::with('product')->wherenull('deleted_by')->latest()->get(); 
        return view('backend.store.product-spec.index', compact('specs'));
    }
    
    
    public function create(Request $request)
    { 
        $products = Product::orderBy('id', 'asc')->wherenull('deleted_by')->get();
        return view('backend.store.product-spec.create', compact('products'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:master_product,id',
            'product_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',

            'name' => 'required|string|max:255',
            'manufacturer' => 'required|string|max:255',
            'product_description' => 'required|string',

            'availability' => 'required|string|max:255',
            'pricing' => 'required|numeric|min:0',

            'rohs' => 'required|string|max:255',
            'capacitance' => 'required|numeric|min:0',
            'voltage' => 'required|numeric|min:0',

            'termination' => 'required|string|max:255',
            'pf' => 'required|string|max:255',

            'lead_spacing' => 'required|string|max:255',
            'length' => 'required|numeric|min:0',
            'width' => 'required|numeric|min:0',
            'height' => 'required|numeric|min:0',

            'lead_wire' => 'required|string|max:255',
            'tolerance' => 'required|string|max:255',
            'package_case' => 'required|numeric|min:0',

            'operating_temp' => 'required|string|max:255',
            'max_operating_temp' => 'required|string|max:255',

            'series' => 'required|string|max:255',
            'qualification' => 'required|string|max:255',
            'packaging' => 'required|string|max:255',
        ], [
            'required' => 'The :attribute field is required.',
            'numeric' => 'The :attribute must be a number.',
            'image' => 'The :attribute must be an image.',
            'mimes' => 'The :attribute must be a file of type: jpg, jpeg, png, webp.',
            'max' => 'The :attribute must not be greater than :max kilobytes.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $bannerImageName = null;
        if ($request->hasFile('product_image')) {
            $banner = $request->file('product_image');
            $bannerImageName = time() . rand(10, 999) . '.' . $banner->getClientOriginalExtension();
            $banner->move(public_path('uploads/product/specifications/'), $bannerImageName);
        }

        ProductSpecification::create([
            'product_id' => $request->product_id,
            'product_image' => $bannerImageName,

            'name' => $request->name,
            'manufacturer' => $request->manufacturer,
            'product_description' => $request->product_description,

            'availability' => $request->availability,
            'pricing' => $request->pricing,

            'rohs' => $request->rohs,
            'capacitance' => $request->capacitance,
            'voltage' => $request->voltage,
            'voltage_rating' =>$request->voltage_rating,

            'termination' => $request->termination,
            'pf' => $request->pf,

            'lead_spacing' => $request->lead_spacing,
            'length' => $request->length,
            'width' => $request->width,
            'height' => $request->height,

            'lead_wire' => $request->lead_wire,
            'tolerance' => $request->tolerance,
            'package_case' => $request->package_case,

            'operating_temp' => $request->operating_temp,
            'max_operating_temp' => $request->max_operating_temp,

            'series' => $request->series,
            'qualification' => $request->qualification,
            'packaging' => $request->packaging,
            'created_at' => Carbon::now(),
            'created_by' => Auth::user()->id,
        ]);

        return redirect()->route('product-specifications.index')->with('message', 'Specification added successfully.');
    }

    public function edit($id)
    {
        $details = ProductSpecification::findOrFail($id);
        $products = Product::orderBy('id', 'asc')->wherenull('deleted_by')->get();
        return view('backend.store.product-spec.edit', compact('details', 'products'));
    }


    public function update(Request $request, $id)
    {
        $spec = ProductSpecification::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:master_product,id',
            'product_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'name' => 'required|string|max:255',
            'manufacturer' => 'required|string|max:255',
            'product_description' => 'required|string',

            'availability' => 'required|string|max:255',
            'pricing' => 'required|numeric|min:0',

            'rohs' => 'required|string|max:255',
            'capacitance' => 'required|numeric|min:0',
            'voltage' => 'required|numeric|min:0',
            'voltage_rating' => 'nullable|string|max:255',

            'termination' => 'required|string|max:255',
            'pf' => 'required|string|max:255',

            'lead_spacing' => 'required|string|max:255',
            'length' => 'required|numeric|min:0',
            'width' => 'required|numeric|min:0',
            'height' => 'required|numeric|min:0',

            'lead_wire' => 'required|string|max:255',
            'tolerance' => 'required|string|max:255',
            'package_case' => 'required|numeric|min:0',

            'operating_temp' => 'required|string|max:255',
            'max_operating_temp' => 'required|string|max:255',

            'series' => 'required|string|max:255',
            'qualification' => 'required|string|max:255',
            'packaging' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Handle image update
        if ($request->hasFile('product_image')) {
            $banner = $request->file('product_image');
            $bannerImageName = time() . rand(10, 999) . '.' . $banner->getClientOriginalExtension();
            $banner->move(public_path('uploads/product/specifications/'), $bannerImageName);

            $spec->product_image = $bannerImageName;
        }

        // Update all fields
        $spec->update([
            'product_id' => $request->product_id,
            'name' => $request->name,
            'manufacturer' => $request->manufacturer,
            'product_description' => $request->product_description,

            'availability' => $request->availability,
            'pricing' => $request->pricing,

            'rohs' => $request->rohs,
            'capacitance' => $request->capacitance,
            'voltage' => $request->voltage,
            'voltage_rating' => $request->voltage_rating,

            'termination' => $request->termination,
            'pf' => $request->pf,

            'lead_spacing' => $request->lead_spacing,
            'length' => $request->length,
            'width' => $request->width,
            'height' => $request->height,

            'lead_wire' => $request->lead_wire,
            'tolerance' => $request->tolerance,
            'package_case' => $request->package_case,

            'operating_temp' => $request->operating_temp,
            'max_operating_temp' => $request->max_operating_temp,

            'series' => $request->series,
            'qualification' => $request->qualification,
            'packaging' => $request->packaging,
            'modified_at' => Carbon::now(),
            'modified_by' => Auth::user()->id,
        ]);

        return redirect()->route('product-specifications.index')->with('message', 'Specification updated successfully.');
    }

    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = ProductSpecification::findOrFail($id);
            $industries->update($data);

            return redirect()->route('product-specifications.index')->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }
}