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
        $validatedData = $request->validate([
            'product_id' => 'required|exists:master_product,id',
            'banner_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'product_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'product_description' => 'required|string',
        ], [
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

        // Save to database
        ProductDescription::create([
            'product_id' => $validatedData['product_id'],
            'banner_image' => $bannerImageName,
            'product_image' => $productImageName,
            'product_description' => $validatedData['product_description'],
            'created_at' => Carbon::now(),
            'created_by' => Auth::user()->id,
        ]);

        return redirect()->route('product-descriptions.index')->with('message', 'Product description added successfully.');
    }

    public function edit($id)
    {
        $details = ProductDescription::findOrFail($id);
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