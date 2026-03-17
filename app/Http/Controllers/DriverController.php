<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class DriverController extends Controller
{
    public function index()
    {
        return view('admin.driver.index');
    }
}
