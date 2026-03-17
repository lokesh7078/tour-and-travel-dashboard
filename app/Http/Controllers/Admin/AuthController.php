<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{


    public function showLogin()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('email','password'))) {
            return redirect()->route('admin.home');
        }

        return back()->with('error','Invalid email or password');
    }

    // STEP 1
    public function step1()
    {
        return view('admin.auth.step1');
    }

    public function storeStep1(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'gender'     => 'required',
            'phone'      => 'required|unique:users'
        ]);

        session(['step1' => $request->all()]);

        return redirect()->route('register.step2');
    }

    // STEP 2
    public function step2()
    {
        if (!session('step1')) {
            return redirect()->route('register.step1');
        }

        return view('admin.auth.step2');
    }

    public function storeStep2(Request $request)
    {
        $request->validate([
            'aadhaar_card'        => 'required|numeric|digits:12|unique:users',
            'account_number'      => 'required|digits_between:9,17|unique:users',
            'ifsc_code'           => 'required',
            'bank_name'           => 'required',
            'account_holder_name' => 'required'
        ]);

        session(['step2' => $request->all()]);

        return redirect()->route('register.step3');
    }

    // STEP 3
    public function step3()
    {
        if (!session('step2')) {
            return redirect()->route('register.step1');
        }

        return view('admin.auth.step3');
    }

    public function completeRegistration(Request $request)
    {
        $request->validate([
            'email'    => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6'
        ]);

        $data = array_merge(
            session('step1'),
            session('step2'),
            [
                'email'    => $request->email,
                'password' => Hash::make($request->password)
            ]
        );

        $user = User::create($data);

        // Auto Login
        Auth::login($user);

        session()->forget(['step1','step2']);

        return redirect()->route('admin.home')
                         ->with('success','Account created successfully');
     }

    /*
    |--------------------------------------------------------------------------
    | FORGOT PASSWORD
    |--------------------------------------------------------------------------
    */

    public function showForgot()
    {
        return view('admin.auth.forgot');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ]);

        User::where('email', $request->email)
            ->update([
                'password' => Hash::make($request->password)
            ]);

        return redirect()->route('login')
               ->with('success', 'Password updated successfully');
    }

}




// namespace App\Http\Controllers\Admin;

// use App\Http\Controllers\Controller;
// use Illuminate\Auth\Authenticatable;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use App\Models\User;
// use Illuminate\Support\Facades\Hash;

// class AuthController extends Controller
// {
//     public function showLogin()
//     {
//         return view('admin.auth.login');
//     }

//     public function login(Request $request)
//     {
//         $request->validate([
//             'email' => 'required|email',
//             'password' => 'required'
//         ]);

//         if (Auth::attempt($request->only('email','password'))) {
//             return redirect()->route('admin.home');
//         }

//         return back()->with('error','Invalid email or password');
//     }

//     public function showRegister()
//     {
//         return view('admin.auth.register');
//     }

//     public function register(Request $request)
//     {
//         $request->validate([
//             'name' => 'required',
//             'email' => 'required|email|unique:users',
//             'password' => 'required|min:6'
//         ]);

//         $user = User::create([
//     'name' => $request->name,
//     'email' => $request->email,
//     'password' => Hash::make($request->password),
//     'theme' => 'light',
//     'language' => 'en',
//     'timezone' => 'Asia/Kolkata'
// ]);


//         // 🔥 Auto login after register
//         Auth::login($user);

//         return redirect()->route('admin.home')
//                          ->with('success','Account created successfully');
//     }

//     public function showForgot()
//     {
//         return view('admin.auth.forgot');
//     }

//     public function resetPassword(Request $request)
//     {
//         $request->validate([
//             'email' => 'required|email',
//             'password' => 'required|confirmed|min:6',
//         ]);

//         User::where('email', $request->email)
//             ->update([
//                 'password' => Hash::make($request->password)
//             ]);

//         return redirect('/login')
//                ->with('success', 'Password updated successfully');
//     }
// }
