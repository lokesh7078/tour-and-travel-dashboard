<?php

// namespace App\Http\Controllers\Admin;

// use App\Http\Controllers\Controller;

// class DashboardController extends Controller
// {
//     public function index()
//     {
//         $data['dashboard'] = [
//             'total_driver'     => 10,
//             'waiting_for_approval'   => 3,
//             'total_rider'      => 20,
//             'total_rides'       => 50,
//             'today_earning'    => 1200,
//             'monthly_earning'  => 25000,
//             'total_earning'    => 150000,
//             'complaint'        => 0,
//             'today_km'         => 120,
//             'monthly_km'       => 1200,
//             'total_km'         => 15000,
//             'accident_incident'=> 0,
//         ];


//         $recent_riderequest = [];

//         return view('admin.home', compact('data', 'recent_riderequest'));
//     }
// }



namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{     public function index()
{
    $data['dashboard'] = [
        'total_driver'         => 10,
        'waiting_for_approval' => 3,
        'total_rider'          => 20,
        'total_rides'          => 50,

        'today_earning'        => 1200,
        'monthly_earning'      => 25000,
        'total_earning'        => 150000,
        'complaint'            => 0,

        'today_km'             => 120,
        'monthly_km'           => 3200,
        'total_km'             => 15000,
        'accident_incident'    => 0,
    ];

    $recent_riderequest = [];

    return view('admin.home', compact('data', 'recent_riderequest'));
}

    public function earnings()
    {
        return view('admin.earnings');
    }

    public function complaints()
    {
        return view('admin.complaints');
    }
}
