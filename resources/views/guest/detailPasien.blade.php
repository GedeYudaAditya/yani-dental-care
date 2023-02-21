@extends('guest.layouts.app')

@section('content')
    @php
        // Format tanggal lahir ke j F Y
        $tanggal = date('j F Y', strtotime($pasien->ttl));
    @endphp
    <section class="container my-3">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Detail Pasien</h1>
            </div>
        </div>

        <div class="border rounded py-4 px-5">
            <h4>Data Pasien</h4>
            <hr class="mt-0">
            <div class="row mb-3">
                <div class="col-lg-8">
                    <table class="table">
                        <tr>
                            <th>Nama</th>
                            <td class="text-center" style="width: 30px">:</td>
                            <td>{{ $tanggal }}</td>
                        </tr>
                        <tr>
                            <th>TTL</th>
                            <td class="text-center" style="width: 30px">:</td>
                            <td>{{ $pasien->ttl }}</td>
                        </tr>
                        <tr>
                            <th>Alamat Rumah</th>
                            <td class="text-center" style="width: 30px">:</td>
                            <td>{{ $pasien->alamat_rumah }}</td>
                        </tr>
                        <tr>
                            <th>Alamat Kantor</th>
                            <td class="text-center" style="width: 30px">:</td>
                            <td>{{ $pasien->alamat_kantor }}</td>
                        </tr>
                        <tr>
                            <th>No. Telp</th>
                            <td class="text-center" style="width: 30px">:</td>
                            <td>{{ $pasien->no_hp }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-lg-4">
                    <table class="table">
                        <tr>
                            <th>Jenis kel.</th>
                            <td class="text-center" style="width: 30px">:</td>
                            <td>{{ $pasien->jenis_kelamin }}</td>
                        </tr>
                        <tr>
                            <th>Pekerjaan</th>
                            <td class="text-center" style="width: 30px">:</td>
                            <td>{{ $pasien->pekerjaan }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <h4>Rekaman Medis</h4>
            <hr class="mt-0">
            <div class="row">
                <a href="{{ route('tambah-medical-record-spesific', $pasien->slug) }}"
                    class="btn btn-sm btn-primary mb-2">Tambahkan data
                    <i class="bi bi-journal-plus"></i></a>
                {{-- check apakah pasien memiliki lebih dari 1 medicalRecord --}}
                @if ($pasien->medicalRecord->count() > 0)
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Tanggal Record</th>
                                        <th>Diagnosa</th>
                                        <th>Tindakan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pasien->medicalRecord as $medicalRecord)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $medicalRecord->created_at->format('j F Y') }}</td>
                                            <td>{{ $medicalRecord->diagnosa }}</td>
                                            <td>{{ $medicalRecord->tindakan }}</td>
                                            <td>
                                                <a href="{{ route('detail-medical-record', $medicalRecord->slug) }}"
                                                    class="btn btn-sm btn-primary">Detail</a>
                                                <a href="{{ route('edit-medical-record', $medicalRecord->slug) }}"
                                                    class="btn btn-sm btn-warning">Edit</a>
                                                <form
                                                    action="{{ route('guest.medical-record.destroy', $medicalRecord->slug) }}"
                                                    onsubmit="return confirm(' Yakin ingin menghapus ' . $medicalRecord->name . '? ')"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    <div class="col-md-12">
                        <p class="text-center">Pasien tidak memiliki medical record</p>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
