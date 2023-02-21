<?php

namespace App\Http\Controllers;

use App\DataTables\MedicalRecordDataTable;
use App\DataTables\PatienDataTable;
use App\DataTables\UsersDataTable;
use App\Models\MedicalRecord;
use App\Models\Patien;
use App\Models\User;
use Illuminate\Http\Request;

class GuestController extends Controller
{

    public function login()
    {
        $title = 'Login';
        return view('index', ['title' => $title]);
    }

    public function loginProcess(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login')->with('error', 'Email atau Password salah');
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }

    public function index()
    {
        $title = 'Home';
        $banyakPasien = Patien::count();
        $banyakHistory = MedicalRecord::count();
        $lastUpdateRecord = MedicalRecord::latest()->first();
        $lastUpdatePasien = Patien::latest()->first();

        if ($banyakPasien > 0 && $banyakHistory > 0) {
            if ($lastUpdateRecord->created_at > $lastUpdatePasien->created_at) {
                $lastUpdate = $lastUpdateRecord->created_at->format('j F Y');
            } else if ($lastUpdateRecord->created_at < $lastUpdatePasien->created_at) {
                $lastUpdate = $lastUpdatePasien->created_at->format('j F Y');
            }
        } else if ($banyakPasien > 0) {
            $lastUpdate = $lastUpdatePasien->created_at->format('j F Y');
        } else if ($banyakHistory > 0) {
            $lastUpdate = $lastUpdateRecord->created_at->format('j F Y');
        } else {
            $lastUpdate = now()->format('j F Y');
        }

        return view('guest.index', ['title' => $title, 'banyakPasien' => $banyakPasien, 'banyakHistory' => $banyakHistory, 'lastUpdate' => $lastUpdate]);
    }

    public function dataPasien(PatienDataTable $dataTable)
    {
        $title = 'Data Pasien';
        return $dataTable->render('guest.daftarPasien', ['title' => $title]);
    }

    public function detailPasien(Patien $patien)
    {
        $patien = $patien->load('medicalRecord');
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

    public function detailMedicalRecord(MedicalRecord $medicalRecord)
    {
        // $medicalRecord = $medicalRecord->with('radiology', 'document', 'patien');

        // dd($medicalRecord->patien);

        $title = 'Detail Medical Record';
        return view('guest.detailRecord', ['title' => $title, 'medicalRecord' => $medicalRecord]);
    }

    public function tambahMedicalRecord()
    {
        $title = 'Tambah Medical Record';
        $judul = 'Tambah Medical Record';
        $pasien = Patien::all();
        return view('guest.formRecord', ['title' => $title, 'judul' => $judul, 'pasien' => $pasien]);
    }

    public function tambahMedicalRecordSpesific(Patien $patien)
    {
        $title = 'Tambah Medical Record';
        $judul = 'Tambah Medical Record';
        $pasien = Patien::all();
        return view('guest.formRecord', ['title' => $title, 'judul' => $judul, 'pasien' => $pasien, 'record' => $patien]);
    }

    public function editMedicalRecord(MedicalRecord $medicalRecord)
    {
        // dd($medicalRecord);
        $medicalRecord->with('radiology', 'document', 'patien');
        $title = 'Edit Medical Record';
        $judul = 'Edit Medical Record';
        return view('guest.formRecord', ['title' => $title, 'judul' => $judul, 'patien' => $medicalRecord]);
    }
}
