<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\PatienController;
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

Route::get('/', [GuestController::class, 'index'])->name('home');

Route::prefix('/data-pasien')->group(function () {
    Route::get('/', [GuestController::class, 'dataPasien'])->name('data-pasien');

    Route::get('/create', [GuestController::class, 'tambahPasien'])->name('tambah-pasien');
    Route::post('/create', [GuestController::class, 'storePasien'])->name('store-pasien');

    Route::get('/{id}', [GuestController::class, 'detailPasien'])->name('detail-pasien');

    Route::get('/edit/{patien:slug}', [GuestController::class, 'editPasien'])->name('edit-pasien');

    Route::delete('/delete/{patien:slug}', [PatienController::class, 'destroy'])->name('guest.pasien.destroy');
});
