@extends('guest.layouts.app')

@section('plugin-head')
    <link rel="stylesheet" href="{{ asset('/css/formRecord.css') }}">
@endsection

@section('content')
    @php
        // Format tanggal lahir ke j F Y
        $tanggal = date('j F Y', strtotime($medicalRecord->patien->ttl));
    @endphp

    <section class="container my-3">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Detail Pasien</h1>
            </div>
        </div>

        <div class="border rounded py-4 px-5 bg-white">
            <h4>Data Pasien</h4>
            <hr class="mt-0">
            <div class="row mb-3">
                <div class="col-lg-8">
                    <table class="table">
                        <tr>
                            <th>Nama</th>
                            <td class="text-center" style="width: 30px">:</td>
                            <td>{{ $medicalRecord->patien->name }}</td>
                        </tr>
                        <tr>
                            <th>TTL</th>
                            <td class="text-center" style="width: 30px">:</td>
                            <td>{{ $tanggal }}</td>
                        </tr>
                        <tr>
                            <th>Alamat Rumah</th>
                            <td class="text-center" style="width: 30px">:</td>
                            <td>{{ $medicalRecord->patien->alamat_rumah }}</td>
                        </tr>
                        <tr>
                            <th>Alamat Kantor</th>
                            <td class="text-center" style="width: 30px">:</td>
                            <td>{{ $medicalRecord->patien->alamat_kantor }}</td>
                        </tr>
                        <tr>
                            <th>No. Telp</th>
                            <td class="text-center" style="width: 30px">:</td>
                            <td>{{ $medicalRecord->patien->no_hp }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-lg-4">
                    <table class="table">
                        <tr>
                            <th>Jenis kel.</th>
                            <td class="text-center" style="width: 30px">:</td>
                            <td>{{ $medicalRecord->patien->jenis_kelamin }}</td>
                        </tr>
                        <tr>
                            <th>Pekerjaan</th>
                            <td class="text-center" style="width: 30px">:</td>
                            <td>{{ $medicalRecord->patien->pekerjaan }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <h4>Data Medik yang Perlu di Perhatikan</h4>
            <hr class="mt-0">
            <div class="row">
                <div class="col-lg-8">
                    <table class="table">
                        <tr>
                            <th>Gol darah</th>
                            <td class="text-center" style="width: 30px">:</td>
                            <td>{{ $medicalRecord->gol_darah }}</td>
                        </tr>
                        <tr>
                            <th>Penyk. Jantung</th>
                            <td class="text-center" style="width: 30px">:</td>
                            <td>{{ $medicalRecord->penyakit_jantung }}</td>
                        </tr>
                        <tr>
                            <th>Haemophilia</th>
                            <td class="text-center" style="width: 30px">:</td>
                            <td>{{ $medicalRecord->haemophilia }}</td>
                        </tr>
                        <tr>
                            <th>Penyk. Lain</th>
                            <td class="text-center" style="width: 30px">:</td>
                            <td>{{ $medicalRecord->penyakit_lain }}</td>
                        </tr>
                        <tr>
                            <th>Alergi obat-obatan</th>
                            <td class="text-center" style="width: 30px">:</td>
                            <td>{{ $medicalRecord->alergi_obat }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal pencatatan data</th>
                            <td class="text-center" style="width: 30px">:</td>
                            {{-- Format date to j F Y --}}
                            <td>{{ $medicalRecord->created_at->format('j F Y') }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-lg-4">
                    <table class="table">
                        <tr>
                            <th>Tek. darah</th>
                            <td class="text-center" style="width: 30px">:</td>
                            <td>{{ $medicalRecord->tekanan_darah }}</td>
                        </tr>
                        <tr>
                            <th>Diabetes</th>
                            <td class="text-center" style="width: 30px">:</td>
                            <td>{{ $medicalRecord->diabetes }}</td>
                        </tr>
                        <tr>
                            <th>Hepatitis</th>
                            <td class="text-center" style="width: 30px">:</td>
                            <td>{{ $medicalRecord->hepatitis }}</td>
                        </tr>
                        <tr>
                            <th>Alergi makanan</th>
                            <td class="text-center" style="width: 30px">:</td>
                            <td>{{ $medicalRecord->alergi_makanan }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <input type="hidden" name="gigi" id="gigi" value="{{ $medicalRecord->gigi }}">
            {{-- Simbol Gigi --}}
            <div class="frame-gigi row align-items-center mb-3">
                <div class="bagian-16 atas">
                    <div class="kotak" data-nomor="18">18</div>
                    <div class="kotak" data-nomor="17">17</div>
                    <div class="kotak" data-nomor="16">16</div>
                    <div class="kotak" data-nomor="15">15</div>
                    <div class="kotak" data-nomor="14">14</div>
                    <div class="kotak" data-nomor="13">13</div>
                    <div class="kotak" data-nomor="12">12</div>
                    <div class="kotak" data-nomor="11">11</div>
                    <div class="kotak" data-nomor="21">21</div>
                    <div class="kotak" data-nomor="22">22</div>
                    <div class="kotak" data-nomor="23">23</div>
                    <div class="kotak" data-nomor="24">24</div>
                    <div class="kotak" data-nomor="25">25</div>
                    <div class="kotak" data-nomor="26">26</div>
                    <div class="kotak" data-nomor="27">27</div>
                    <div class="kotak" data-nomor="28">28</div>
                </div>
                <div class="bagian-10 atas">
                    <div class="kotak" data-nomor="55">55</div>
                    <div class="kotak" data-nomor="54">54</div>
                    <div class="kotak" data-nomor="53">53</div>
                    <div class="kotak" data-nomor="52">52</div>
                    <div class="kotak" data-nomor="51">51</div>
                    <div class="kotak" data-nomor="61">61</div>
                    <div class="kotak" data-nomor="62">62</div>
                    <div class="kotak" data-nomor="63">63</div>
                    <div class="kotak" data-nomor="64">64</div>
                    <div class="kotak" data-nomor="65">65</div>
                </div>
                <div class="bagian-10 bawah">
                    <div class="kotak" data-nomor="85">85</div>
                    <div class="kotak" data-nomor="84">84</div>
                    <div class="kotak" data-nomor="83">83</div>
                    <div class="kotak" data-nomor="82">82</div>
                    <div class="kotak" data-nomor="81">81</div>
                    <div class="kotak" data-nomor="71">71</div>
                    <div class="kotak" data-nomor="72">72</div>
                    <div class="kotak" data-nomor="73">73</div>
                    <div class="kotak" data-nomor="74">74</div>
                    <div class="kotak" data-nomor="75">75</div>
                </div>
                <div class="bagian-16 bawah">
                    <div class="kotak" data-nomor="48">48</div>
                    <div class="kotak" data-nomor="47">47</div>
                    <div class="kotak" data-nomor="46">46</div>
                    <div class="kotak" data-nomor="45">45</div>
                    <div class="kotak" data-nomor="44">44</div>
                    <div class="kotak" data-nomor="43">43</div>
                    <div class="kotak" data-nomor="42">42</div>
                    <div class="kotak" data-nomor="41">41</div>
                    <div class="kotak" data-nomor="31">31</div>
                    <div class="kotak" data-nomor="32">32</div>
                    <div class="kotak" data-nomor="33">33</div>
                    <div class="kotak" data-nomor="34">34</div>
                    <div class="kotak" data-nomor="35">35</div>
                    <div class="kotak" data-nomor="36">36</div>
                    <div class="kotak" data-nomor="37">37</div>
                    <div class="kotak" data-nomor="38">38</div>
                </div>
                <b class="text-center">Keterangan</b>
                <div class="col-md-3 tembelan text-white">Tembelan</div>
                <div class="col-md-3 sisa-akar text-white">Sisa Akar</div>
                <div class="col-md-3 lubang">Lubang</div>
                <div class="col-md-3 hilang">Hilang</div>
                <div class="col-md-3 gigi-palsu">Gigi Palsu</div>
                <div class="col-md-3 implan">Implan</div>
                <div class="col-md-3 gr">GR</div>
                <div class="col-md-3 mobility">Mobility</div>
                <div class="col-md-6 persistensi">Persistensi</div>
                <div class="col-md-6 impaksi">Impaksi</div>
            </div>

            <div class="tembelan-detail row mb-3">

            </div>

            <hr>
            <b>Radiologi</b>
            <div class="m-auto" style="width: 200px">
                @if ($medicalRecord->radiology[0]->image != null)
                    <img class="img-fluid"
                        src="{{ asset('/storage/uploads/radiologi/' . $medicalRecord->radiology[0]->image) }}"
                        alt="">
                @else
                    <p class="text-center">Tidak Ada Gambar</p>
                @endif
            </div>

            <hr>
            <div class="text-center">
                @if ($medicalRecord->document[0]->document != null)
                    <a class="btn btn-primary"
                        href="{{ asset('/storage/uploads/dokumen/' . $medicalRecord->document[0]->document) }}"
                        target="_blank">Lihat
                        Dokumen</a>
                @else
                    <button class="btn btn-secondary" disabled>Tidak Ada Dokumen</button>
                @endif

                @if ($medicalRecord->rct[0]->rct != null)
                    <a class="btn btn-primary" href="{{ asset('/storage/uploads/rct/' . $medicalRecord->rct[0]->rct) }}"
                        target="_blank">Lihat
                        RCT</a>
                @else
                    <button class="btn btn-secondary" disabled>Tidak Ada Dokumen RCT</button>
                @endif
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Anamnesa</th>
                        <th scope="col">Diagnosa</th>
                        <th scope="col">Tindakan</th>
                    </tr>
                </thead>

                <tbody id="gigi-detail">
                    <tr>
                        <td scope="col">{{ $medicalRecord->anamnesa }}</td>
                        <td scope="col">{{ $medicalRecord->diagnosa }}</td>
                        <td scope="col">{{ $medicalRecord->tindakan }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </section>

    <script>
        $(document).ready(function() {
            var arrayOfObject = [];

            var angka = [];

            var gigi = $('#gigi').val();

            if (gigi.length > 0) {
                // replace all ' with "
                gigi = gigi.replace(/'/g, '"');
                // convert string to array
                gigi = JSON.parse(gigi);
            }

            var groupInputTembelan = $(".tembelan-detail");

            if (gigi.length > 0) {
                for (var i = 0; i < gigi.length; i++) {
                    arrayOfObject.push(gigi[i]);
                    angka.push(gigi[i][1]);
                    if (gigi[i][0] == "tembelan") {
                        groupInputTembelan.append(
                            '<p id="tembelan-' +
                            gigi[i][1] +
                            '" class="col-md-3">Tembelan no ' +
                            gigi[i][1] +
                            ' <input disabled class="banyak-tembelan mb-2" type="text" id="tem-input-' +
                            gigi[i][1] +
                            '" name="tembelan_detail[]" value="' +
                            gigi[i][2] +
                            ' kali"></p>'
                        );
                    }
                }
            }

            var arrayNomor = [];
            $(".kotak").each(function() {
                var nomor = $(this).attr("data-nomor");
                var inputNomor = $("#nomor_gigi").val();

                for (var i = 0; i < gigi.length; i++) {
                    if (gigi[i][1] == nomor) {
                        $(this).addClass(gigi[i][0]);

                        // add text when hover
                        // convert the text with uppercase and remove '-' and replace with ' '
                        var text = gigi[i][0].replace(/-/g, " ");
                        text = text.toUpperCase();
                        $(this).attr("title", text);

                        arrayNomor.push(nomor);
                    }
                }

                $("#nomor_gigi").val(arrayNomor);
            });
        });
    </script>
@endsection
