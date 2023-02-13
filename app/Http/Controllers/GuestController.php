<?php

namespace App\Http\Controllers;

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
}
