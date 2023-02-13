<?php

namespace App\Http\Controllers;

use App\Models\Patien;
use Illuminate\Http\Request;

class PatienController extends Controller
{
    //
    public function destroy(Patien $patien)
    {
        $patien->delete();
        return redirect()->route('data-pasien')->with('success', 'Data pasien berhasil dihapus');
    }
}
