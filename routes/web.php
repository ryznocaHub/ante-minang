<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManagementBarangController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| 
*/
Auth::routes();

Route::group(['middleware' => 'Admin'], function () {
    Route::resource('users',         UserController::class)->except(['edit']);
});

Route::group(['middleware' => 'Pegawai'], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('history/barang/masuk',  [ManagementBarangController::class, 'masuk'])->name('history.masuk');
    Route::get('history/barang/keluar',  [ManagementBarangController::class, 'keluar'])->name('history.keluar');
    Route::resource('manajemen',    ManagementBarangController::class);
    Route::resource('users',        UserController::class)->only(['show', 'update']);
});

