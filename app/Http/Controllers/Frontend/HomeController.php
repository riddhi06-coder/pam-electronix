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

use App\Models\HomeWhyChoose;
use App\Models\HomeIntro;
use App\Models\BannerDetails;
use App\Models\Product;
use App\Models\Specification;

use Carbon\Carbon;

class HomeController extends Controller
{

    public function index()
    {
        $banners = BannerDetails::wherenull('deleted_by')->get(); 
        $homeIntro = HomeIntro::whereNull('deleted_by')->latest()->first();
        $homeWhyChoose = HomeWhyChoose::whereNull('deleted_by')->latest()->first(); 
        $products = Product::orderBy('id', 'asc')->get();
        // dd($products);

        return view('frontend.home', compact('banners','homeIntro','homeWhyChoose','products'));
    }

    public function specifications()
    {
        $banners = Specification::wherenull('deleted_by')->get(); 
        return view('frontend.specification', compact('banners'));
    }
    

    public function connect_experts(Request $request)
    {
        $request->validate([
            'your-name' => 'required|string|regex:/^[^\d]+$/',
            'your-email' => 'required|email',
            'tel-922' => 'required|digits_between:7,15',
            'your-subject' => 'required|string|max:255',
            'your-message' => 'required|string|max:2000',
        ]);

        $emailData = [
            'name' => $request->input('your-name'),
            'email' => $request->input('your-email'),
            'phone' => $request->input('tel-922'),
            'subject' => $request->input('your-subject'),
            'user_message' => $request->input('your-message'),
        ];

        Mail::send('frontend.experts_mail', $emailData, function ($message) use ($emailData) {
            $message->to('varunuchil@gmail.com')
                        ->cc('shweta@matrixbricks.com')
                        ->cc('onkar@matrixbricks.com')
                        ->cc('riddhi@matrixbricks.com')
                        ->cc('smrita@matrixbricks.com')

                    ->subject('Enquiry Details: ' . $emailData['name']);
        });


        // Confirmation Email to User
        Mail::send('frontend.confirmation_mail', $emailData, function ($message) use ($emailData) {
            $message->to($emailData['email'])
                    ->subject('Thanks for Reaching Out!');
        });

        return redirect()->route('thank.you')->with('message', 'Enquiry sent successfully.');
    }


    public function thankyou()
    {
        return view('frontend.thankyou');
    }
}