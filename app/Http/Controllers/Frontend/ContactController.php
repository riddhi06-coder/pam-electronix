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
            'name' => 'required|string|regex:/^[A-Za-z\s]+$/',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        $emailData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'user_message' => $request->input('message'),
        ];

        // Send mail to admin
        Mail::send('frontend.contact_mail', $emailData, function ($message) use ($emailData) {
            $message->to('riddhi@matrixbricks.com')
                    ->cc('shweta@matrixbricks.com','onkar@matrixbricks.com')
                    ->subject('New Contact Enquiry: ' . $emailData['subject']);
        });

        // Send confirmation mail to user
        Mail::send('frontend.confirmation_mail', $emailData, function ($message) use ($emailData) {
            $message->to($emailData['email'])
                    ->subject('Thanks for Reaching Out!');
        });

        return redirect()->route('thank.you')->with('message', 'Thank you for your enquiry. We will get back to you soon.');
    }

}