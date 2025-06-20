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

use App\Models\FooterContact;

use Carbon\Carbon;

class ContactController extends Controller
{

    public function contact()
    {
        $contact = FooterContact::latest()->first();
        return view('frontend.contact', compact('contact'));
    }


  public function sendContactForm(Request $request)
{
    $request->validate([
        'first_name' => 'required|string|regex:/^[A-Za-z\s]+$/',
        'last_name' => 'required|string|regex:/^[A-Za-z\s]+$/',
        'email' => 'required|email',
        'tel_no' => 'required|string|max:20',
        'topic' => 'required|string|max:255',
        'website' => 'required|url',
        'company' => 'required|string|max:255',
        'message' => 'required|string|max:2000',
    ]);

    $emailData = [
        'first_name' => $request->input('first_name'),
        'last_name' => $request->input('last_name'),
        'email' => $request->input('email'),
        'tel_no' => $request->input('tel_no'),
        'topic' => $request->input('topic'),
        'website' => $request->input('website'),
        'company' => $request->input('company'),
        'user_message' => $request->input('message'),
    ];

    Mail::send('frontend.contact_mail', $emailData, function ($message) use ($emailData) {
        $message->to('smrita@matrixbricks.com')
            ->cc(['shweta@matrixbricks.com', 'riddhi@matrixbricks.com', 'onkar@matrixbricks.com', 'smrita@matrixbricks.com'])
            ->subject('New Contact Enquiry from ' . $emailData['first_name'] . ' ' . $emailData['last_name']);
    });

    Mail::send('frontend.confirmation_mail', $emailData, function ($message) use ($emailData) {
        $message->to($emailData['email'])
            ->subject('Thanks for Reaching Out!');
    });

    return redirect()->route('thank.you')->with('message', 'Thank you for your enquiry. We will get back to you soon.');
}


}