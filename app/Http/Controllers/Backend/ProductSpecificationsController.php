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


class ProductSpecificationsController extends Controller
{

    public function index()
    {
        return view('backend.store.product-spec.index');
    }
    
    
    public function create(Request $request)
    { 
        $products = Product::orderBy('id', 'asc')->wherenull('deleted_by')->get();
        return view('backend.store.product-spec.create', compact('products'));
    }
}