<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

use App\Models\ProductDescription;
use App\Models\ProductSpecification;
use App\Models\Product; 

use Carbon\Carbon;

class ProductDetailsController extends Controller
{


    public function show($slug)
    {
        // Find product from master_product by slug
        $product = Product::where('slug', $slug)
                    ->whereNull('deleted_by')
                    ->firstOrFail();
  
    
        // Fetch descriptions for that product
        $banners = ProductDescription::where('product_id', $product->id)
                    ->whereNull('deleted_by')
                    ->get();

        $capHeaders = [];
        $capacitances = [];

        foreach ($banners as $banner) {
            if (!empty($banner->header) && !empty($banner->case_style)) {
                $capHeaders = json_decode($banner->header, true); 
                $capacitances = json_decode($banner->case_style, true);
                break; 
            }
        }
    
        $infoHeader = [];
        $infoDetails = [];

        if ($banners->isNotEmpty()) {
            // Get the first banner
            $firstBanner = $banners->first();

            // Decode info_header and info_details JSON strings from the first banner
            $infoHeader = json_decode($firstBanner->info_header ?? '[]', true);
            $infoDetails = json_decode($firstBanner->info_details ?? '[]', true);
        }

        $images = [];
        if ($banners->isNotEmpty()) {
            $firstBanner = $banners->first();
            $images = json_decode($firstBanner->print_image ?? '[]', true);
        }

        // Fetch specifications for that product
        $Specifications = ProductSpecification::where('product_id', $product->id)
                    ->whereNull('deleted_by')
                    ->get();

                // dd($Specifications);
    
        return view('frontend.product-detail', compact('product', 'banners', 'Specifications', 'capHeaders', 'capacitances' , 'infoHeader', 'infoDetails','images'));
    }


    public function case_style($product_slug, $case_style_slug)
    {
        // Step 1: Find the product by slug
        $product = Product::where('slug', $product_slug)
                    ->whereNull('deleted_by')
                    ->firstOrFail();

        // Step 2: Get specifications for the product with the matching case_style_slug
   
        $specification = ProductSpecification::where('product_id', $product->id)
                        ->where('case_style_slug', $case_style_slug)
                        ->whereNull('deleted_by')
                        ->get();

        // dd($specification);

        // Step 3: Get product descriptions
        $banners = ProductDescription::where('product_id', $product->id)
                    ->whereNull('deleted_by')
                    ->get();

        $capHeaders = [];
        $capacitances = [];

        foreach ($banners as $banner) {
            if (!empty($banner->header) && !empty($banner->case_style)) {
                $capHeaders = json_decode($banner->header, true); 
                $capacitances = json_decode($banner->case_style, true);
                break; 
            }
        }

        $infoHeader = [];
        $infoDetails = [];

        if ($banners->isNotEmpty()) {
            $firstBanner = $banners->first();
            $infoHeader = json_decode($firstBanner->info_header ?? '[]', true);
            $infoDetails = json_decode($firstBanner->info_details ?? '[]', true);
        }

        $images = [];
        if ($banners->isNotEmpty()) {
            $firstBanner = $banners->first();
            $images = json_decode($firstBanner->print_image ?? '[]', true);
        }

        return view('frontend.case_style_details', compact(
            'product',
            'banners',
            'specification',
            'capHeaders',
            'capacitances',
            'infoHeader',
            'infoDetails',
            'images'
        ));
    }

   
    public function cart_details(Request $request)
    {
        $cartItems = DB::table('carts')
            ->where('session_id', session()->getId())
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'image' => $item->product_image,
                    'name' => $item->name,
                    'manufacturer' => $item->manufacturer,
                    'description' => $item->description,
                    'quantity' => $item->quantity,
                    'part_number' => $item->name, 
                    'product_name' => $item->product_name,
                ];
            });

        return view('frontend.cart', [
            'cartItems' => $cartItems,
        ]);
    }


    public function add_to_cart(Request $request)
    {
        $request->validate([
            'spec_id' => 'required|exists:product_specification,id',
            'product_id' => 'required|exists:master_product,id',
            'quantity' => 'required|integer|min:1',
        ]);

        try {

            $sessionId = session()->getId();

            $existingCart = DB::table('carts')
                ->where('product_id', $request->product_id)
                ->where('spec_id', $request->spec_id)
                ->where('session_id', $sessionId) 
                ->first();

            if ($existingCart) {
                // Update quantity by adding the new quantity
                DB::table('carts')
                    ->where('id', $existingCart->id)
                    ->update([
                        'quantity' => $existingCart->quantity + $request->quantity,
                        'updated_at' => Carbon::now(),
                    ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Quantity updated in cart!'
                ]);

            } else {
                // Insert new record
                DB::table('carts')->insert([
                    'spec_id' => $request->spec_id,
                    'product_id' => $request->product_id,
                    'name' => $request->name,
                    'manufacturer' => $request->manufacturer,
                    'description' => $request->description,
                    'quantity' => $request->quantity,
                    'product_name' => $request->product_name,
                    'product_image' => $request->product_image,
                    'session_id' => $sessionId,
                    'created_at' => Carbon::now(),
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Product added to cart!'
                ]);
            }
            
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to add to cart.'
            ], 500);
        }
    }


    public function remove_from_cart($id)
    {
        try {
            DB::table('carts')->where('id', $id)->delete();

            return response()->json([
                'success' => true,
                'message' => 'Item removed from cart.'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to remove item.'
            ], 500);
        }
    }


    public function sendContact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_name' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email',
            'message' => 'required|string|max:2000',
        ]);

        if ($validator->fails()) {
            return redirect()->route('home.page')->withErrors($validator)->withInput();
        }

        $emailData = [
            'company_name' => $request->company_name,
            'name' => $request->contact_person,
            'designation' => $request->designation,
            'phone' => $request->phone,
            'email' => $request->email,
            'message' => $request->message,
        ];

        // Retrieve cart items from session or however you're storing them
        $sessionId = session()->getId();

        $cartItems = DB::table('carts')->where('session_id', $sessionId)->get();


        try {
            Mail::send('frontend.quote-mail', [
                'emailData' => $emailData,
                'cartItems' => $cartItems, 
            ], function ($message) use ($emailData) {
                $subject = "Quote Form - " . ($emailData['name'] ?? 'Unknown');
                $message->to('riddhi@matrixbricks.com')
                        ->cc('shweta@matrixbricks.com')
                        ->subject($subject);
            });

        // Delete cart items after successful mail sending
        DB::table('carts')->where('session_id', $sessionId)->delete();


            return redirect()->route('home.page')->with('message', 'Quote sent successfully.');
        } catch (\Exception $e) {
            \Log::error('Mail sending failed: ' . $e->getMessage());
            return redirect()->route('thank.you')->with('error', 'Failed to send the message: ' . $e->getMessage());
        }
    }


}