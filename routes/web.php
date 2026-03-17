<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\DriverController;
use App\Http\Controllers\Admin\RiderController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\RideController;



Route::get('/', function () {

    if (Auth::check()) {
        return redirect()->route('admin.home');
    }

    return redirect()->route('login');
});



// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

// Forgot Password
Route::get('/forgot-password', [AuthController::class, 'showForgot'])->name('forgot.password');
Route::post('/forgot-password', [AuthController::class, 'resetPassword'])
    ->name('forgot.password.submit');



// Step 1
Route::get('/register/step1', [AuthController::class, 'step1'])
    ->name('register.step1');

Route::post('/register/step1', [AuthController::class, 'storeStep1'])
    ->name('register.step1.store');

// Step 2
Route::get('/register/step2', [AuthController::class, 'step2'])
    ->name('register.step2');

Route::post('/register/step2', [AuthController::class, 'storeStep2'])
    ->name('register.step2.store');

// Step 3
Route::get('/register/step3', [AuthController::class, 'step3'])
    ->name('register.step3');

Route::post('/register/complete', [AuthController::class, 'completeRegistration'])
    ->name('register.complete');


Route::middleware(['auth'])->prefix('admin')->group(function () {


    Route::get('/home', [DashboardController::class, 'index'])
        ->name('admin.home');


    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('admin.profile');

    Route::post('/profile/update', [ProfileController::class, 'update'])
        ->name('admin.profile.update');


    // Route::get('/drivers', [DriverController::class, 'index'])
    //     ->name('admin.drivers');


    // Route::get('/drivers/view/{id}', [DriverController::class, 'show'])
    //     ->name('admin.driver.view');

      Route::get('/drivers', [DriverController::class, 'index'])->name('admin.drivers.index');

Route::get('/drivers/pending', [DriverController::class, 'pending'])
    ->name('admin.drivers.pending');

Route::get('/drivers/view/{id}', [DriverController::class, 'show'])
    ->name('admin.drivers.view');


    Route::get('/riders', [RiderController::class, 'index'])
        ->name('admin.riders');


    Route::get('/rides', [RideController::class, 'index'])
        ->name('admin.rides');

    Route::get('/rides/show/{id}', [RideController::class, 'show'])
        ->name('admin.rides.show');

    Route::delete('/rides/delete/{id}', [RideController::class, 'destroy'])
        ->name('admin.rides.delete');


Route::get('/earnings', [DashboardController::class, 'earnings'])
    ->name('admin.earnings');

//   Route::get('/admin/today-earning',
// [DashboardController::class,'todayEarning'])
// ->name('admin.earnings.today');

// Route::get('/admin/monthly-earning',
// [DashboardController::class,'monthlyEarning'])
// ->name('admin.earnings.monthly');

// Route::get('/admin/total-earning',
// [DashboardController::class,'totalEarning'])
// ->name('admin.earnings.total');

    Route::get('/complaints', [DashboardController::class, 'complaints'])
        ->name('admin.complaints');


    Route::get('/settings', [SettingsController::class, 'edit'])
        ->name('admin.settings.edit');

    Route::post('/settings', [SettingsController::class, 'update'])
        ->name('admin.settings.update');


    Route::get('/terms', function () {
        return view('admin.terms');
    })->name('admin.terms');

});



// use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Auth;

// use App\Http\Controllers\Admin\AuthController;
// use App\Http\Controllers\Admin\DashboardController;
// use App\Http\Controllers\Admin\ProfileController;
// use App\Http\Controllers\Admin\DriverController;
// use App\Http\Controllers\Admin\RiderController;
// use App\Http\Controllers\Admin\SettingsController;
// use App\Http\Controllers\Admin\RideController;

// /*
// |--------------------------------------------------------------------------
// | Default Route
// |--------------------------------------------------------------------------
// */

// Route::get('/', function () {

//     if (Auth::check()) {
//         return redirect()->route('admin.home');
//     }

//     return redirect()->route('login');
// });


// /*
// |--------------------------------------------------------------------------
// | Authentication Routes
// |--------------------------------------------------------------------------
// */

// // Login
// Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
// Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// // Logout
// Route::post('/logout', function () {
//     Auth::logout();
//     return redirect()->route('login');
// })->name('logout');

// // Forgot Password
// Route::get('/forgot-password', [AuthController::class, 'showForgot'])->name('forgot.password');
// Route::post('/forgot-password', [AuthController::class, 'resetPassword'])
//     ->name('forgot.password.submit');


// /*
// |--------------------------------------------------------------------------
// | Multi Step Registration
// |--------------------------------------------------------------------------
// */

// // Step 1
// Route::get('/register/step1', [AuthController::class, 'step1'])
//     ->name('register.step1');

// Route::post('/register/step1', [AuthController::class, 'storeStep1']);

// // Step 2
// Route::get('/register/step2', [AuthController::class, 'step2'])
//     ->name('register.step2');

// Route::post('/register/step2', [AuthController::class, 'storeStep2']);

// // Step 3
// Route::get('/register/step3', [AuthController::class, 'step3'])
//     ->name('register.step3');

// Route::post('/register/complete', [AuthController::class, 'completeRegistration'])
//     ->name('register.complete');


// /*
// |--------------------------------------------------------------------------
// | Admin Protected Routes
// |--------------------------------------------------------------------------
// */

// Route::middleware(['auth'])->prefix('admin')->group(function () {

//     // Dashboard
//     Route::get('/home', [DashboardController::class, 'index'])
//         ->name('admin.home');

//     // Profile
//     Route::get('/profile', [ProfileController::class, 'edit'])
//         ->name('admin.profile');

//     Route::post('/profile/update', [ProfileController::class, 'update'])
//         ->name('profile.update');

//     // Drivers
//     Route::get('/drivers', [DriverController::class, 'index'])
//         ->name('admin.drivers');

//     Route::get('/driver/view/{id}', [DriverController::class, 'show'])
//         ->name('admin.driver.view');

//     // Riders
//     Route::get('/riders', [RiderController::class, 'index'])
//         ->name('admin.riders');

//     // Rides
//     Route::get('/rides', [RideController::class, 'index'])
//         ->name('admin.rides');

//     Route::get('/rides/show/{id}', [RideController::class, 'show'])
//         ->name('admin.rides.show');

//     Route::delete('/rides/delete/{id}', [RideController::class, 'destroy'])
//         ->name('admin.rides.delete');

//     // Earnings & Complaints
//     Route::get('/earnings', [DashboardController::class, 'earnings'])
//         ->name('admin.earnings');

//     Route::get('/complaints', [DashboardController::class, 'complaints'])
//         ->name('admin.complaints');

//     // Settings
//     Route::get('/settings', [SettingsController::class, 'edit'])
//         ->name('settings.edit');

//     Route::post('/settings', [SettingsController::class, 'update'])
//         ->name('settings.update');

//     // Terms
//     Route::get('/terms', function () {
//         return view('admin.terms');
//     })->name('admin.terms');

// });







// use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Auth;

// use App\Http\Controllers\Admin\AuthController;
// use App\Http\Controllers\Admin\DashboardController;
// use App\Http\Controllers\Admin\ProfileController;
// use App\Http\Controllers\Admin\DriverController;
// use App\Http\Controllers\Admin\RiderController;
// use App\Http\Controllers\Admin\SettingsController;
// use App\Http\Controllers\Admin\AdminController;
// use App\Http\Controllers\Admin\RideController;
// /*
// |--------------------------------------------------------------------------
// | Default Route → Redirect to Login
// |--------------------------------------------------------------------------
// */
// Route::get('/', function () {
//     return redirect()->route('login');
// });

// /*
// |--------------------------------------------------------------------------
// | Authentication Routes
// |--------------------------------------------------------------------------
// */
// Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
// Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
// Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// Route::get('/forgot-password', [AuthController::class, 'showForgot'])->name('forgot.password');
// Route::post('/forgot-password', [AuthController::class, 'resetPassword'])->name('forgot.password.submit');

// /*
// |--------------------------------------------------------------------------
// | Logout
// |--------------------------------------------------------------------------
// */
// Route::post('/logout', function () {
//     Auth::logout();
//     return redirect()->route('login');
// })->name('logout');


// /*
// |--------------------------------------------------------------------------
// | Admin Protected Routes
// |--------------------------------------------------------------------------
// */
// Route::middleware(['auth'])->prefix('admin')->group(function () {

//     // Dashboard
//     Route::get('/home', [DashboardController::class, 'index'])
//         ->name('admin.home');

//     // Profile
//     Route::get('/profile', [ProfileController::class, 'edit'])
//         ->name('admin.profile');

//     Route::post('/profile/update', [ProfileController::class, 'update'])
//         ->name('profile.update');

//     // Driver
//     Route::get('/driver', [DriverController::class, 'index'])
//         ->name('admin.driver');

//     Route::get('/driver/view/{id}', [DriverController::class, 'show'])
//         ->name('admin.driver.view');

//     // Rider
//     Route::get('/rider', [RiderController::class, 'index'])
//         ->name('admin.rider');

//     // Settings
//     Route::get('/settings', [SettingsController::class, 'edit'])
//         ->name('settings.edit');

//     Route::post('/settings', [SettingsController::class, 'update'])
//         ->name('settings.update');

//     // Dashboard Boxes Pages
//    Route::get('/drivers', [DriverController::class, 'index'])->name('admin.drivers');

//    Route::get('/riders', [RiderController::class, 'index'])->name('admin.riders');

//      Route::get('/rides', [RideController::class, 'index'])->name('admin.rides');

//     Route::get('/rides/show/{id}', [RideController::class, 'show'])
//         ->name('admin.rides.show');

//     Route::delete('/rides/delete/{id}', [RideController::class, 'destroy'])
//         ->name('admin.rides.delete');

//    Route::get('/earnings', [DashboardController::class, 'earnings'])->name('admin.earnings');

//    Route::get('/complaints', [DashboardController::class, 'complaints'])->name('admin.complaints');

//     // Terms Page
//     Route::get('/terms', function () {
//         return view('admin.terms');
//     })->name('admin.terms');

// });
