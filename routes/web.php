<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\PatienController;
use App\Http\Controllers\UserController;
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

Route::group(['middleware' => ['auth', 'user']], function () {
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
        Route::get('/create/{patien:slug}', [GuestController::class, 'tambahMedicalRecordSpesific'])->name('tambah-medical-record-spesific');
        Route::get('/{medicalRecord:slug}', [GuestController::class, 'detailMedicalRecord'])->name('detail-medical-record');
        Route::get('/edit/{medicalRecord:slug}', [GuestController::class, 'editMedicalRecord'])->name('edit-medical-record');

        // Route Proses
        Route::post('/create', [MedicalRecordController::class, 'store'])->name('guest.medical-record.store');
        Route::post('/edit/{medicalRecord:slug}', [MedicalRecordController::class, 'update'])->name('guest.medical-record.update');
        Route::delete('/delete/{medicalRecord:slug}', [MedicalRecordController::class, 'destroy'])->name('guest.medical-record.destroy');
    });
});

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::prefix('admin')->group(function () {
        // halaman dashboard
        Route::get('/', [AdminController::class, 'index'])->name('dashboard');

        Route::prefix('/data-user')->group(function () {
            // Route Tampilan
            Route::get('/', [AdminController::class, 'dataUser'])->name('admin.data-user');
            Route::get('/create', [AdminController::class, 'createUser'])->name('admin.create-user');
            Route::get('/edit/{user:id}', [AdminController::class, 'editUser'])->name('admin.edit-user');
            // Route::get('/{user:id}', [AdminController::class, 'detailUser'])->name('admin.detail-user');

            // Route Proses
            Route::post('/create', [UserController::class, 'store'])->name('admin.create-user.process');
            Route::post('/edit/{user:id}', [UserController::class, 'update'])->name('admin.edit-user.process');
            Route::delete('/delete/{user:id}', [UserController::class, 'destroy'])->name('admin.delete-user.process');
        });

        Route::prefix('/manage-website')->group(function () {
            // Route Tampilan
            Route::get('/', [AdminController::class, 'manageWebsite'])->name('admin.manage-web');

            // Route Proses
        });

        Route::prefix('/backup-restore')->group(function () {
            // Route Tampilan
            Route::get('/', [AdminController::class, 'manageBackupRestore'])->name('admin.backup-restore');

            // Route Proses
        });
    });
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [GuestController::class, 'login'])->name('login');
    Route::post('/login', [GuestController::class, 'loginProcess'])->name('login.process');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [GuestController::class, 'logout'])->name('logout');
});
