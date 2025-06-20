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
use App\Models\PrivacyPolicyDetails;


class PrivacyPolicyController extends Controller
{

    public function index()
{
    $policyDetails = PrivacyPolicyDetails::whereNull('deleted_at')->latest()->get();
    return view('backend.privacypolicy.index', compact('policyDetails'));
}

public function create()
{
    return view('backend.privacypolicy.create');
}

public function store(Request $request)
{
    $request->validate([
        'banner_heading' => 'required|string|max:255',
        'banner_title' => 'required|string',
        'banner_image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
    ]);

    $data = $request->only(['banner_heading', 'banner_title']);

    if ($request->hasFile('banner_image')) {
        $file = $request->file('banner_image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/policy'), $filename);
        $data['banner_image'] = 'uploads/policy/' . $filename;
    }

    PrivacyPolicyDetails::create($data);

    return redirect()->route('manage-privacy-policy.index')->with('message', 'Privacy Policy added successfully!');
}

public function edit($id)
{
    $policyDetails = PrivacyPolicyDetails::findOrFail($id);
    return view('backend.privacypolicy.edit', compact('policyDetails'));
}


public function update(Request $request, $id)
{
    $policy = PrivacyPolicyDetails::findOrFail($id);

    $request->validate([
        'banner_heading' => 'required|string|max:255',
        'banner_title' => 'required|string',
        'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
    ]);

    $data = $request->only(['banner_heading', 'banner_title']);

    if ($request->hasFile('banner_image')) {
        if ($policy->banner_image && file_exists(public_path($policy->banner_image))) {
            unlink(public_path($policy->banner_image));
        }

        $file = $request->file('banner_image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/policy'), $filename);
        $data['banner_image'] = 'uploads/policy/' . $filename;
    }

    $policy->update($data);

    return redirect()->route('manage-privacy-policy.index')->with('message', 'Privacy Policy updated successfully!');
}

public function destroy($id)
{
    $policy = PrivacyPolicyDetails::findOrFail($id);
    $policy->update([
        'deleted_by' => Auth::id(),
        'deleted_at' => Carbon::now()
    ]);

    return redirect()->route('manage-privacy-policy.index')->with('message', 'Privacy Policy deleted successfully!');
}

}