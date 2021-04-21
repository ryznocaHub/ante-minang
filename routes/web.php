<?php

use App\Http\Controllers\BahanBaku\BahanBakuController;
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


Auth::routes(['register' => 'false']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('manajemen/bahanbaku/history/masuk',     [BahanBakuController::class, 'masuk'])->name('history.bahanbaku.masuk');
Route::get('manajemen/bahanbaku/history/keluar',    [BahanBakuController::class, 'keluar'])->name('history.bahanbaku.keluar');
Route::post('manajemen/bahanbaku/updatebahan',      [BahanBakuController::class, 'updateBahanBaku'])->name('bahanbaku.updatedata');
Route::post('manajemen/bahanbaku/destroy',          [BahanBakuController::class, 'destroy'])->name('bahanbaku.destroy');
Route::resource('manajemen/bahanbaku', BahanBakuController::class)->only(['index', 'store', 'update']);

Route::resource('users',            UserController::class)->except(['edit']);
Route::resource('manajemen',        ManagementBarangController::class)->except(['show', 'edit', 'create']);
Route::get('history/masuk',         [ManagementBarangController::class, 'masuk'])->name('history.masuk');
Route::get('history/keluar',         [ManagementBarangController::class, 'keluar'])->name('history.keluar');
