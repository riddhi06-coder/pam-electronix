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
use App\Models\PolicyDetails;


class TermsConditionsController extends Controller
{

    public function index()
{
    $policyDetails = PolicyDetails::whereNull('deleted_at')->latest()->get();
    return view('backend.policy.index', compact('policyDetails'));
}

public function create()
{
    return view('backend.policy.create');
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

    PolicyDetails::create($data);

    return redirect()->route('terms-and-conditions.index')->with('message', 'Terms and Conditions added successfully!');
}

public function edit($id)
{
    $policyDetails = PolicyDetails::findOrFail($id);
    return view('backend.policy.edit', compact('policyDetails'));
}


public function update(Request $request, $id)
{
    $policy = PolicyDetails::findOrFail($id);

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

    return redirect()->route('terms-and-conditions.index')->with('message', 'Terms and Conditions updated successfully!');
}

public function destroy($id)
{
    $policy = PolicyDetails::findOrFail($id);
    $policy->update([
        'deleted_by' => Auth::id(),
        'deleted_at' => Carbon::now()
    ]);

    return redirect()->route('terms-and-conditions.index')->with('message', 'Terms and Conditions deleted successfully!');
}

}