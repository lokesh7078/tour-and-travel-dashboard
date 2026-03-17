<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function edit()
    {
        return view('admin.settings');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'theme' => 'required',
            'language' => 'required',
            'timezone' => 'required'
        ]);

        $user->update([
            'theme' => $request->theme,
            'language' => $request->language,
            'timezone' => $request->timezone,
        ]);

        return back()->with('success','Settings Updated Successfully');
    }
}
