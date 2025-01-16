<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminLaborController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\LaborController;
use App\Http\Controllers\SlotWaktuController;
use App\Http\Controllers\JadwalBokingController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\CreateAdminLaborController;


/* -------------------- Admin Labor Route ----------------- */
Route::prefix('adminlabor')->group(function () {
    // Login Routes
    Route::get('/login', [AdminLaborController::class, 'Index'])->name('adminlabor.login');
    Route::post('/login', [AdminLaborController::class, 'Login'])->name('adminlabor.login.submit');

    // Dashboard Route - mengarah ke index.blade.php
    Route::get('/dashboard', [AdminLaborController::class, 'Dashboard'])->name('adminlabor.dashboard');
    // Logout Route
    Route::post('/logout', [AdminLaborController::class, 'logout'])->name('adminlabor.logout');
    Route::get('/adminlabor/profile', [AdminLaborController::class, 'profile'])->name('admin_labor.profile');
});

//Route Labor========================>
Route::resource('labors', LaborController::class);
//Route Jadwal Boking=================>
Route::resource('jadwal_boking', JadwalBokingController::class);
//Route Slot Waktu====================>
Route::resource('slot_waktu', SlotWaktuController::class);
//Route Laporan=======================>
Route::resource('laporan', LaporanController::class);
/* -------------------- End Admin Labor Route ----------------- */





/* -------------------- Admin Route ----------------- */
Route::prefix('admin')->group(function () {

    Route::get('/login', [AdminController::class, 'Index'])->name('login_form');
    Route::post('/login/owner', [AdminController::class, 'Login'])->name('admin.login');

    // Admin Dashboard Route tanpa middleware
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
        Route::get('/settings', [ProfileController::class, 'index'])->name('admin.settings');
        Route::get('/reports', [ReportController::class, 'index'])->name('admin.reports.index');
        Route::get('/admin-labor/create', [AdminController::class, 'createAdminLabor'])->name('admin-labor.create');
        Route::get('/user/create', [AdminController::class, 'createUser'])->name('user.create');
    });
    Route::resource('admin_labors', AdminLaborController::class);
});

Route::resource('create_admin_labor', CreateAdminLaborController::class);
//Route Create Admin Labor
Route::resource('admin_labor', CreateAdminLaborController::class);


/* -------------------- End Admin Route ----------------- */





/* -------------------Pinjam User--------------------*/

// Route untuk modul Pinjam
Route::prefix('user/pinjam')->name('user.pinjam.')->group(function () {
    Route::get('/', [PinjamController::class, 'index'])->name('index');
});
/* ---------------------End Pinjam User ---------------------- */





Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
