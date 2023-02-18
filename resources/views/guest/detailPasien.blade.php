@extends('guest.layouts.app')

@section('content')
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
                            <td>{{ $pasien->name }}</td>
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
            <h4>Data Medik yang Perlu di Perhatikan</h4>
            <hr class="mt-0">
            <div class="row">
                <p class="text-center">Belum Ada Data</p>
            </div>
        </div>
    </section>
@endsection
