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


use App\Models\PrivacyPolicyDetails; 

use Carbon\Carbon;

class PrivacysPolicyController extends Controller
{

public function privacypolicy()
{
    $terms = \App\Models\PrivacyPolicyDetails::first(); // Fetch the first record from policy_details table
    return view('frontend.privacypolicy', compact('terms'));
}


   

}