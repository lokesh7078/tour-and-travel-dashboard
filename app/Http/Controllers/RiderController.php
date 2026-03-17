<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class RiderController extends Controller
{
    public function index()
    {
        return view('admin.rider.index');
    }
}

