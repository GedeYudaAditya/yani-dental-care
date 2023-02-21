<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\MedicalRecord;
use App\Models\Patien;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Manage Account
    public function index()
    {
        $title = 'Dashboard';

        $userRoleCount = User::where('role', 'user')->count();
        $adminRoleCount = User::where('role', 'admin')->count();

        $percentRoleUser = round(($userRoleCount / ($userRoleCount + $adminRoleCount)) * 100);
        $percentRoleAdmin = round(($adminRoleCount / ($userRoleCount + $adminRoleCount)) * 100);

        $patiensCount = Patien::all()->count();
        $recordCount = MedicalRecord::all()->count();

        // last update user
        if ($userRoleCount > 0 && $adminRoleCount > 0) {
            $lastUpdateUser = User::where('role', 'user')->latest()->first()->updated_at->diffForHumans();
        } else {
            $lastUpdateUser = '-';
        }

        // last update admin
        if ($userRoleCount > 0 && $adminRoleCount > 0) {
            $lastUpdateAdmin = User::where('role', 'admin')->latest()->first()->updated_at->diffForHumans();
        } else {
            $lastUpdateAdmin = '-';
        }

        // last update patien
        if ($patiensCount > 0 && $recordCount > 0) {
            $lastUpdatePatien = Patien::latest()->first()->updated_at->diffForHumans();
        } else {
            $lastUpdatePatien = '-';
        }

        // last update record
        if ($patiensCount > 0 && $recordCount > 0) {
            $lastUpdateRecord = MedicalRecord::latest()->first()->updated_at->diffForHumans();
        } else {
            $lastUpdateRecord = '-';
        }


        return view('admin.index', [
            'title' => $title,
            'userRoleCount' => $userRoleCount,
            'adminRoleCount' => $adminRoleCount,
            'percentRoleUser' => $percentRoleUser,
            'percentRoleAdmin' => $percentRoleAdmin,
            'patiensCount' => $patiensCount,
            'recordCount' => $recordCount,
            'lastUpdateUser' => $lastUpdateUser,
            'lastUpdateAdmin' => $lastUpdateAdmin,
            'lastUpdatePatien' => $lastUpdatePatien,
            'lastUpdateRecord' => $lastUpdateRecord,
        ]);
    }

    public function dataUser(UsersDataTable $dataTable)
    {
        $title = 'Managemen Akun';

        $users = User::all();

        return $dataTable->render('admin.managemen-akun', ['title' => $title, 'users' => $users]);
    }

    public function createUser()
    {
        $title = 'Tambah Akun';

        return view('admin.form-akun', ['title' => $title]);
    }

    public function editUser(User $user)
    {
        $title = 'Edit Akun';

        return view('admin.form-akun', ['title' => $title, 'user' => $user]);
    }

    // Manage Website
    public function manageWebsite()
    {
        $title = 'Managemen Website';

        return view('admin.managemen-web', ['title' => $title]);
    }

    // Manage Backup & Restore
    public function manageBackupRestore()
    {
        $title = 'Managemen Backup & Restore';

        $userRoleCount = User::where('role', 'user')->count();
        $adminRoleCount = User::where('role', 'admin')->count();

        $percentRoleUser = round(($userRoleCount / ($userRoleCount + $adminRoleCount)) * 100);
        $percentRoleAdmin = round(($adminRoleCount / ($userRoleCount + $adminRoleCount)) * 100);

        $patiensCount = Patien::all()->count();
        $recordCount = MedicalRecord::all()->count();

        // last update user
        if ($userRoleCount > 0 && $adminRoleCount > 0) {
            $lastUpdateUser = User::where('role', 'user')->latest()->first()->updated_at->diffForHumans();
        } else {
            $lastUpdateUser = '-';
        }

        // last update admin
        if ($userRoleCount > 0 && $adminRoleCount > 0) {
            $lastUpdateAdmin = User::where('role', 'admin')->latest()->first()->updated_at->diffForHumans();
        } else {
            $lastUpdateAdmin = '-';
        }

        // last update patien
        if ($patiensCount > 0 && $recordCount > 0) {
            $lastUpdatePatien = Patien::latest()->first()->updated_at->diffForHumans();
        } else {
            $lastUpdatePatien = '-';
        }

        // last update record
        if ($patiensCount > 0 && $recordCount > 0) {
            $lastUpdateRecord = MedicalRecord::latest()->first()->updated_at->diffForHumans();
        } else {
            $lastUpdateRecord = '-';
        }

        return view('admin.backup-restore', [
            'title' => $title,
            'userRoleCount' => $userRoleCount,
            'adminRoleCount' => $adminRoleCount,
            'percentRoleUser' => $percentRoleUser,
            'percentRoleAdmin' => $percentRoleAdmin,
            'patiensCount' => $patiensCount,
            'recordCount' => $recordCount,
            'lastUpdateUser' => $lastUpdateUser,
            'lastUpdateAdmin' => $lastUpdateAdmin,
            'lastUpdatePatien' => $lastUpdatePatien,
            'lastUpdateRecord' => $lastUpdateRecord,
        ]);
    }
}
