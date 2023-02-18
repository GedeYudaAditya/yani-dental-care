<?php

namespace App\Http\Controllers;

use App\Models\Patien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PatienController extends Controller
{
    //
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'ttl' => 'required',
            'alamat_rumah' => 'required',
            'alamat_kantor' => 'required',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required',
            'pekerjaan' => 'required',
        ]);

        DB::beginTransaction();
        try {
            Patien::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name . '_' . date('Y-m-d H:i:s')),
                'ttl' => $request->ttl,
                'alamat_rumah' => $request->alamat_rumah,
                'alamat_kantor' => $request->alamat_kantor,
                'no_hp' => $request->no_hp,
                'jenis_kelamin' => $request->jenis_kelamin,
                'pekerjaan' => $request->pekerjaan,
            ]);

            DB::commit();

            return redirect()->route('data-pasien')->with('success', 'Data pasien berhasil ditambahkan');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('data-pasien')->with('error', 'Data pasien gagal ditambahkan. Error: ' . $th->getMessage());
        }
    }

    public function update(Request $request, Patien $patien)
    {
        $request->validate([
            'name' => 'required',
            'ttl' => 'required',
            'alamat_rumah' => 'required',
            'alamat_kantor' => 'required',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required',
            'pekerjaan' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $patien->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name . '_' . date('Y-m-d H:i:s')),
                'ttl' => $request->ttl,
                'alamat_rumah' => $request->alamat_rumah,
                'alamat_kantor' => $request->alamat_kantor,
                'no_hp' => $request->no_hp,
                'jenis_kelamin' => $request->jenis_kelamin,
                'pekerjaan' => $request->pekerjaan,
            ]);

            DB::commit();

            return redirect()->route('data-pasien')->with('success', 'Data pasien berhasil diubah');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('data-pasien')->with('error', 'Data pasien gagal diubah. Error: ' . $th->getMessage());
        }
    }

    public function destroy(Patien $patien)
    {
        try {
            $patien->delete();
            return redirect()->route('data-pasien')->with('success', 'Data pasien berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->route('data-pasien')->with('error', 'Data pasien gagal dihapus. Error: ' . $th->getMessage());
        }
    }
}
