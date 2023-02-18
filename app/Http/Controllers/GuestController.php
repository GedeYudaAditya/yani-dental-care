<?php

namespace App\Http\Controllers;

use App\DataTables\MedicalRecordDataTable;
use App\DataTables\PatienDataTable;
use App\DataTables\UsersDataTable;
use App\Models\Patien;
use App\Models\User;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $title = 'Home';
        return view('guest.index', ['title' => $title]);
    }

    public function dataPasien(PatienDataTable $dataTable)
    {
        $title = 'Data Pasien';
        return $dataTable->render('guest.daftarPasien', ['title' => $title]);
    }

    public function detailPasien(Patien $patien)
    {
        $title = 'Detail Pasien';
        return view('guest.detailPasien', ['title' => $title, 'pasien' => $patien]);
    }

    public function tambahPasien()
    {
        $title = 'Tambah Pasien';
        $judul = 'Tambah Pasien';
        return view('guest.formPasien', ['title' => $title, 'judul' => $judul]);
    }

    public function editPasien(Patien $patien)
    {
        $title = 'Edit Pasien';
        $judul = 'Edit Pasien';
        return view('guest.formPasien', ['title' => $title, 'judul' => $judul, 'patien' => $patien]);
    }

    public function medicalRecord(MedicalRecordDataTable $dataTable)
    {
        $title = 'Medical Record';
        return $dataTable->render('guest.medicalRecord', ['title' => $title]);
    }

    public function detailMedicalRecord(Patien $patien)
    {
        $title = 'Detail Medical Record';
        return view('guest.detailMedicalRecord', ['title' => $title, 'pasien' => $patien]);
    }

    public function tambahMedicalRecord()
    {
        $title = 'Tambah Medical Record';
        $judul = 'Tambah Medical Record';
        $pasien = Patien::all();
        return view('guest.formRecord', ['title' => $title, 'judul' => $judul, 'pasien' => $pasien]);
    }
}
