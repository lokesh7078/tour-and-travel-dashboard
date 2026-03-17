<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function drivers() {
    return view('admin.drivers');
}

public function riders() {
    return view('admin.riders');
}

public function rides() {
    return view('admin.rides');
}

public function earnings() {
    return view('admin.earnings');
}

public function complaints() {
    return view('admin.complaints');
}

}
