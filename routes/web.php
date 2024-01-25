<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('admin/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('admin.checkLogin');


// --------------------------------------------------------
// =================== ContactUs Routes ===================
Route::prefix('contact-us')->name('contactUs.')
    ->controller(ContactUsController::class)
    ->group(function () {
        Route::post('/', 'store')->name('store');
    });
// ----------------- End ContactUs Routes -------------------
// ***************************************************************

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
