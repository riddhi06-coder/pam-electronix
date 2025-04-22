<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\HomeWhyChoose;
use App\Models\HomeIntro;
use App\Models\BannerDetails;
use App\Models\Product;

use Carbon\Carbon;

class HomeController extends Controller
{

    public function index()
    {
        $banners = BannerDetails::wherenull('deleted_by')->get(); 
        $homeIntro = HomeIntro::whereNull('deleted_by')->latest()->first();
        $homeWhyChoose = HomeWhyChoose::whereNull('deleted_by')->latest()->first(); 
        $products = Product::orderBy('id', 'asc')->get();

        return view('frontend.home', compact('banners','homeIntro','homeWhyChoose','products'));
    }
    
}