<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\FooterContact;

use Carbon\Carbon;

class ContactController extends Controller
{

    public function contact()
    {
        $contact = FooterContact::latest()->first();
        return view('frontend.contact', compact('contact'));
    }
}