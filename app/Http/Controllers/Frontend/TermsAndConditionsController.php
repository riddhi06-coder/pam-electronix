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


use App\Models\PolicyDetails; 

use Carbon\Carbon;

class TermsAndConditionsController extends Controller
{

public function termsconditions()
{
    $terms = \App\Models\PolicyDetails::first(); // Fetch the first record from policy_details table
    return view('frontend.termsconditions', compact('terms'));
}


   

}