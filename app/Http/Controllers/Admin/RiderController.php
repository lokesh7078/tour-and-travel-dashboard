<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User; // ✅ YE LINE MUST HAI

class RiderController extends Controller
{
    public function index()
{
    $riders = User::where('role', 'rider')->latest()->paginate(10);
    return view('admin.rider.index', compact('riders'));
}

}


    // public function index()
    // {
    //    $riders = Rider::latest()->paginate(10);

    //     return view('admin.rider.index', compact('riders'));
    // }

