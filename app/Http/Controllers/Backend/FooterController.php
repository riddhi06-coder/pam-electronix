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
use App\Models\BannerDetails;


class FooterController extends Controller
{

    public function index()
    {
        return view('backend.contact.index');
    }
    

    public function create(Request $request)
    { 
        return view('backend.contact.create');
    }
}