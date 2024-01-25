<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CenterInformationController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\MedicalImageController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServicesController;
use Illuminate\Support\Facades\Route;


// --------------------------------------------------------
// =================== Admin Routes ===================
Route::controller(AdminController::class)
    ->group(function () {
        Route::get('/',  'index')->name('index');
        Route::get('/create',  'create')->name('create');
        Route::post('/store',  'store')->name('store');
        Route::get('/edit/{id}',  'edit')->name('edit');
        Route::post('/update/{id}',  'update')->name('update');
        Route::get('/destroy/{id}',  'destroy')->name('destroy');
        Route::get('toggle-status/{id}',  'toggleStatus')->name('toggleStatus');
    });
// ----------------- End Admin Routes -------------------
// ***************************************************************



// --------------------------------------------------------
// =================== Roles Routes ===================
Route::prefix('role')
    ->name('role.')
    ->controller(RoleController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create',  'create')->name('create');
        Route::post('/',  'store')->name('store');
        Route::get('destroy/{id}',  'destroy')->name('destroy');
    });
// ----------------- End Roles Routes -------------------
// ***************************************************************


// --------------------------------------------------------
// =================== Permission Routes ===================
Route::prefix('permission')
    ->name('permission.')
    ->controller(PermissionController::class)
    ->group(function () {
        Route::get('/', 'create')->name('create');
        Route::post('/',  'store')->name('store');
    });
// ----------------- End Permission Routes -------------------
// ***************************************************************


// --------------------------------------------------------
// =================== MedicalImage Routes ===================
Route::prefix('medicalImage')
    ->name('medicalImage.')
    ->controller(MedicalImageController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
    });
// ----------------- End MedicalImage Routes -------------------
// ***************************************************************


// --------------------------------------------------------
// =================== Patient Routes ===================
Route::group(['prefix' => 'patient', 'as' => 'patient.'], function () {

    Route::controller(PatientController::class)
        ->group(function () {
            Route::get('/',  'index')->name('index');
            Route::get('/create',  'create')->name('create');
            Route::post('/',  'store')->name('store');
            Route::post('/search',  'search')->name('search');
            Route::get('toggle-status/{id}',   'toggleStatus')->name('toggleStatus');
            Route::get('inactive-patients',   'showInactivePatients')->name('showInactivePatients');
            Route::get('/edit/{id}',  'edit')->name('edit');
            Route::post('/update/{id}',  'update')->name('update');
            Route::get('/destroy/{id}',  'destroy')->name('destroy');
            Route::get('{id}/reports',  'showPatientReports')->name('reports');
        });

    Route::controller(RegisterController::class)
        ->group(function () {
            Route::post('/register',  'register')->name('register');
            Route::post('/physician',  'physician')->name('physician');
        });

    Route::controller(ReportController::class)
        ->group(function () {
            Route::get('/report/{registerId}',  'create')->name('report');
            Route::post('/report',  'store')->name('report.store');
            Route::get('/report/print/{registerId}',  'print')->name('report.print');
        });
});
// ----------------- End Patient Routes -------------------
// ***************************************************************


// --------------------------------------------------------
// =================== Center Information Routes ===================
Route::prefix('centerInformation')
    ->name('centerInformation.')
    ->controller(CenterInformationController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
    });
// ----------------- End Center Information Routes -------------------
// ***************************************************************


// --------------------------------------------------------
// =================== ContactUs Routes ===================
Route::prefix('contact-us')
    ->name('contactUs.')
    ->controller(ContactUsController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });
// ----------------- End ContactUs Routes -------------------
// ***************************************************************



// --------------------------------------------------------
// =================== Services Routes ===================
Route::resource('services', ServicesController::class)->except(['show', 'destroy']);
Route::get('services/destroy/{id}', [ServicesController::class, 'destroy'])->name('services.destroy');
// ----------------- End Services Routes -------------------
// ***************************************************************


// --------------------------------------------------------
// =================== Doctors Routes ===================
Route::resource('doctors', DoctorsController::class)->except(['show', 'destroy']);
Route::get('doctors/destroy/{id}', [DoctorsController::class, 'destroy'])->name('doctors.destroy');
// ----------------- End Doctors Routes -------------------
// ***************************************************************

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
