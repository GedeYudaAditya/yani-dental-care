<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\MedicalRecordController;
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
    // Route Tampilan
    Route::get('/', [GuestController::class, 'dataPasien'])->name('data-pasien');
    Route::get('/create', [GuestController::class, 'tambahPasien'])->name('tambah-pasien');
    Route::get('/{patien:slug}', [GuestController::class, 'detailPasien'])->name('detail-pasien');
    Route::get('/edit/{patien:slug}', [GuestController::class, 'editPasien'])->name('edit-pasien');

    // Route Proses
    Route::post('/create', [PatienController::class, 'store'])->name('guest.pasien.store');
    Route::post('/edit/{patien:slug}', [PatienController::class, 'update'])->name('guest.pasien.update');
    Route::delete('/delete/{patien:slug}', [PatienController::class, 'destroy'])->name('guest.pasien.destroy');
});

Route::prefix('medical-record')->group(function () {
    Route::get('/', [GuestController::class, 'medicalRecord'])->name('medical-record');
    Route::get('/create', [GuestController::class, 'tambahMedicalRecord'])->name('tambah-medical-record');
    // Route::get('/{medicalRecord:slug}', [GuestController::class, 'detailMedicalRecord'])->name('detail-medical-record');
    // Route::get('/edit/{medicalRecord:slug}', [GuestController::class, 'editMedicalRecord'])->name('edit-medical-record');

    // Route Proses
    Route::post('/create', [MedicalRecordController::class, 'store'])->name('guest.medical-record.store');
    // Route::post('/edit/{medicalRecord:slug}', [MedicalRecordController::class, 'update'])->name('guest.medical-record.update');
    // Route::delete('/delete/{medicalRecord:slug}', [MedicalRecordController::class, 'destroy'])->name('guest.medical-record.destroy');
});
