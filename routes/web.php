<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MedicalImageController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('Dashboard.index');
// });

Route::get('/', function () {
    return view('index');
})->name('home');




Route::get('admin/login', [AuthController::class, 'loginPage'])->name('admin.login');
Route::post('/login', [AuthController::class, 'login'])->name('admin.checkLogin');

Route::prefix('admin')->name('admin.')->middleware(['auth:admin'])->group(function () {

    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/create', [AdminController::class, 'create'])->name('create');
    Route::post('/store', [AdminController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [AdminController::class, 'update'])->name('update');
    Route::get('/destroy/{id}', [AdminController::class, 'destroy'])->name('destroy');

    // =================== Roles Controller ===================
    Route::prefix('role')->name('role.')->controller(RoleController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create',  'create')->name('create');
        Route::post('/',  'store')->name('store');
        Route::get('destroy/{id}',  'destroy')->name('destroy');
    });

    Route::group(['prefix' => 'permission', 'as' => 'permission.'], function () {

        Route::get('/', [PermissionController::class, 'create'])->name('create');
        Route::post('/', [PermissionController::class, 'store'])->name('store');
    });

    Route::group(['prefix' => 'medicalImage', 'as' => 'medicalImage.'], function () {
        Route::get('/', [MedicalImageController::class, 'index'])->name('index');
        Route::post('/', [MedicalImageController::class, 'store'])->name('store');
    });


    Route::group(['prefix' => 'patient', 'as' => 'patient.'], function () {
        Route::get('/', [PatientController::class, 'index'])->name('index');
        Route::get('/create', [PatientController::class, 'create'])->name('create');
        Route::post('/', [PatientController::class, 'store'])->name('store');
        Route::post('/search', [PatientController::class, 'search'])->name('search');
        Route::post('/register', [RegisterController::class, 'register'])->name('register');
        Route::post('/physician', [RegisterController::class, 'physician'])->name('physician');
        Route::get('/report/print/{registerId}', [ReportController::class, 'print'])->name('report.print');
        Route::get('/report/{registerId}', [ReportController::class, 'create'])->name('report');
        Route::post('/report', [ReportController::class, 'store'])->name('report.store');
    });


    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
