<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\User;

class DriverController extends Controller
{

public function index()
{
    $verifiedDrivers = Driver::where('is_verified', 1)->get();
    return view('admin.driver.index', compact('verifiedDrivers'));
}
     
public function pending()
{
    $pendingDrivers = Driver::where('is_verified', 0)->get();
    return view('admin.driver.pending', compact('pendingDrivers'));
}


// public function index()
// {
//     $verifiedDrivers = Driver::where('is_verified', 1)->get();
//     return view('admin.driver', compact('verifiedDrivers'));
// }

// public function pending()
// {
//     $pendingDrivers = Driver::where('is_verified', 0)->get();
//     return view('admin.driver.pending', compact('pendingDrivers'));
// }


// public function index()
// {
//     $drivers = User::where('role','driver')->get(); // ya jo logic hai
//     return view('admin.driver.index', compact('drivers'));
// }

// public function pending()
// {
//     $drivers = User::where('role','driver')
//                    ->where('status','pending')
//                    ->get();

//     return view('admin.driver.pending', compact('drivers'));
// }
   
    public function show($id)
    {
        $driver = Driver::findOrFail($id);

        return view('admin.driver.view', compact('driver'));
    }
}
