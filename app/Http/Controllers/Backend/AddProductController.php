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


class AddProductController extends Controller
{

    public function index()
    {
        $products = Product::wherenull('deleted_by')->get(); 
        return view('backend.store.product.index', compact('products'));
    }
    
    

    public function create(Request $request)
    { 
        return view('backend.store.product.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required|string|max:255|unique:master_product,product_name',
        ], [
            'product_name.required' => 'Product name is required.',
            'product_name.string' => 'Product name must be a valid string.',
            'product_name.max' => 'Product name must not be more than 255 characters.',
            'product_name.unique' => 'This product name already exists.',
        ]);

        $slug = Str::slug($validated['product_name']);
        $originalSlug = $slug;
        $count = 1;

        while (Product::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        Product::create([
            'product_name' => $validated['product_name'],
            'slug' => $slug,
            'created_at' => Carbon::now(),
            'created_by' => Auth::user()->id,
        ]);

        return redirect()->route('add-product.index')->with('message', 'Product added successfully!');
    }

    public function edit($id)
    {
        $products = Product::findOrFail($id);
        return view('backend.store.product.edit', compact('products'));
    }


    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'product_name' => 'required|string|max:255|unique:master_product,product_name,' . $product->id,
        ], [
            'product_name.required' => 'Product name is required.',
            'product_name.string' => 'Product name must be a valid string.',
            'product_name.max' => 'Product name must not be more than 255 characters.',
            'product_name.unique' => 'This product name already exists.',
        ]);

        $slug = Str::slug($validated['product_name']);
        $originalSlug = $slug;
        $count = 1;

        // Ensure slug is unique (excluding current product)
        while (Product::where('slug', $slug)->where('id', '!=', $product->id)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        $product->update([
            'product_name' => $validated['product_name'],
            'slug' => $slug,
            'modified_at' => Carbon::now(),
            'modified_by' => Auth::user()->id,
        ]);

        return redirect()->route('add-product.index')->with('message', 'Product updated successfully!');
    }


    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = Product::findOrFail($id);
            $industries->update($data);

            return redirect()->route('add-product.index')->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }


}