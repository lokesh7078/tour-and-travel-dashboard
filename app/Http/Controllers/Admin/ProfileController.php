<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
 use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('admin.profile', compact('user'));
    }
public function update(Request $request)
{
    $user = auth()->user();

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'contact_number' => 'required|min:6|max:15',
        'address' => 'required|string'
    ]);

    $user->name = $request->name;
    $user->email = $request->email;
    $user->contact_number = $request->contact_number;
    $user->address = $request->address;

    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    if ($request->hasFile('image')) {

        if ($user->image && File::exists(public_path('uploads/profile/'.$user->image))) {
            File::delete(public_path('uploads/profile/'.$user->image));
        }

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads/profile'), $imageName);
        $user->image = $imageName;
    }

    $user->save();

    return redirect()->back()->with('success', 'Profile Updated Successfully');
}
}
