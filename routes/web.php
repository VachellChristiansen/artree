<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\AdminController;

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

//Info
Route::get('/info', function () {
    return view('phpinfo');
});


// Home
Route::get('/', [HomeController::class, 'show']);

// Admin
Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('adminLogin');

Route::post('/adm/login', [AdminController::class, 'login']);

Route::middleware(['auth'])->group( function () {
    Route::get('/admin', [AdminController::class, 'show']);
    
    Route::get('/admin/{current}', [AdminController::class, 'show']);
});

// Form Inputs
Route::get('/forms', [FormController::class, 'show']);

Route::post('/forms/submit', [FormController::class, 'submit']);
