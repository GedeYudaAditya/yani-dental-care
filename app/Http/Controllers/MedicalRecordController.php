<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\MedicalRecord;
use App\Models\Radiology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedicalRecordController extends Controller
{
    //
    public function store(Request $request)
    {
        // dd($request->all());
        $validationData = $request->validate([
            'patient_id' => 'required',
            'gol_darah' => 'required',
            'tekanan_darah' => 'required',
            'penyakit_jantung' => 'required',
            'haemophilia' => 'required',
            'diabetes' => 'required',
            'hepatitis' => 'required',
            'penyakit_lain' => 'required',
            'alergi_obat' => 'nullable',
            'alergi_makanan' => 'nullable',

            'gigi' => 'required',
            'radiologi' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'dokumen' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'anamnesa' => 'nullable',
            'diagnosa' => 'nullable',
            'tindakan' => 'nullable',
        ]);

        // replace sign " with ' in array gigi
        $validationData['gigi'] = str_replace('"', "'", $validationData['gigi']);

        $radiologi = null;
        $dokumen = null;

        // dd($validationData);

        DB::beginTransaction();
        try {
            if ($request->hasFile('radiologi')) {
                $radiologi = time() . '.' . $request->radiologi->extension();
                // save to storage/app/public/uploads/radiologi
                $request->radiologi->storeAs('public/uploads/radiologi', $radiologi);
            }

            if ($request->hasFile('dokumen')) {
                $dokumen = time() . '.' . $request->dokumen->extension();
                // save to storage/app/public/uploads/dokumen
                $request->dokumen->storeAs('public/uploads/dokumen', $dokumen);
            }

            $record = MedicalRecord::create([
                'patien_id' => $request->patient_id,
                'slug' => 'medical-record-' . $request->patient_id . '-' . time(),
                'gol_darah' => $request->gol_darah,
                'tekanan_darah' => $request->tekanan_darah,
                'penyakit_jantung' => $request->penyakit_jantung,
                'haemophilia' => $request->haemophilia,
                'diabetes' => $request->diabetes,
                'hepatitis' => $request->hepatitis,
                'penyakit_lain' => $request->penyakit_lain,
                'alergi_obat' => $request->alergi_obat,
                'alergi_makanan' => $request->alergi_makanan,

                'gigi' => $validationData['gigi'],
                'anamnesa' => $request->anamnesa,
                'diagnosa' => $request->diagnosa,
                'tindakan' => $request->tindakan,
            ]);


            Radiology::create([
                'image' => $radiologi,
                'medical_record_id' => $record->id,
            ]);

            Document::create([
                'document' => $dokumen,
                'medical_record_id' => $record->id,
            ]);

            DB::commit();
            return redirect()->route('medical-record')->with('success', 'Medical Record created successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('medical-record')->with('error', 'Medical Record created failed. ' . $e->getMessage());
        }
    }
}
