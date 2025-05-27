<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
    
                    // dd($banners);
        return view('frontend.product-detail', compact('product', 'banners', 'Specifications', 'capHeaders', 'capacitances' , 'infoHeader', 'infoDetails','images'));
    }
    
    
}