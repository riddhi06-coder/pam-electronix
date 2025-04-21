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
use App\Models\FooterContact;


class FooterController extends Controller
{

    public function index()
    {
        $contacts = FooterContact::wherenull('deleted_by')->latest()->get(); 
        return view('backend.contact.index', compact('contacts'));
    }
    

    public function create(Request $request)
    { 
        return view('backend.contact.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|max:255',
            'phone' => 'required|digits_between:10,12',
            'address' => 'required|string|max:1000',
            'url' => 'required|url|max:255',
            'social_media_platform' => 'required|array',
            'social_media_platform.*' => 'required|string',
            'social_media_url' => 'required|array',
            'social_media_url.*' => 'required|url'
        ], [
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'phone.required' => 'Phone number is required.',
            'phone.digits_between' => 'Phone number must be between 10 to 12 digits.',
            'address.required' => 'Address is required.',
            'url.required' => 'Location URL is required.',
            'url.url' => 'Please enter a valid Location URL.',
            'social_media_platform.*.required' => 'Please select a social media platform.',
            'social_media_url.*.required' => 'Please enter a valid URL for the selected platform.'
        ]);

        FooterContact::create([
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'url' => $validated['url'],
            'social_media_platforms' => json_encode($validated['social_media_platform']),
            'social_media_urls' => json_encode($validated['social_media_url']),
            'created_at' => Carbon::now(),
            'created_by' => Auth::user()->id,
        ]);

        return redirect()->route('footer-contact.index')->with('message', 'Contact details saved successfully.');
    }
}