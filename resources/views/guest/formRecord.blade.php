@extends('guest.layouts.app')

@section('plugin-head')
    <link rel="stylesheet" href="{{ asset('/css/formRecord.css') }}">
@endsection

@section('content')
    <section class="container my-3">
        {{-- closable alert --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- end of closable alert --}}

        {{-- See all invalid from validation --}}
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- form session --}}
        @if ($judul == 'Tambah Medical Record')
            <form id="sectionForm" action="{{ route('guest.medical-record.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <h1 class="text-center">{{ $judul }}</h1>

                <!-- One "tab" for each step in the form: -->
                <div class="tab">Pilih Pasien:
                    <p>
                        @isset($record)
                            <select name="patient_id" oninput="this.className = ''" required>
                                <option disabled>Pilihan</option>
                                @foreach ($pasien as $item)
                                    <option value="{{ $item->id }}" @if ($item->id == $record->id) selected @endif>
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>
                        @else
                            <select name="patient_id" oninput="this.className = ''" required>
                                <option disabled selected>Pilihan</option>
                                @foreach ($pasien as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        @endisset
                    </p>
                    <p class="text-center">Data Medik yang Perlu di Perhatikan:</p>
                    <p>
                        Golongan Darah
                        <select name="gol_darah" oninput="this.className = ''" required>
                            <option disabled selected>Pilihan</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                        </select>
                    </p>
                    <p><input type="text" placeholder="Tekanan darah..." oninput="this.className = ''"
                            name="tekanan_darah">
                    </p>
                    <p> Jantung
                        <select name="penyakit_jantung" oninput="this.className = ''" required>
                            <option disabled selected>Pilihan</option>
                            <option value="ya">Ya</option>
                            <option value="tidak">Tidak</option>
                        </select>
                    </p>
                    <p> Haemophilia
                        <select name="haemophilia" oninput="this.className = ''" required>
                            <option disabled selected>Pilihan</option>
                            <option value="ya">Ya</option>
                            <option value="tidak">Tidak</option>
                        </select>
                    </p>
                    <p> Diabetes
                        <select name="diabetes" oninput="this.className = ''" required>
                            <option disabled selected>Pilihan</option>
                            <option value="ya">Ya</option>
                            <option value="tidak">Tidak</option>
                        </select>
                    </p>
                    <p> Hepatitis
                        <select name="hepatitis" oninput="this.className = ''" required>
                            <option disabled selected>Pilihan</option>
                            <option value="ya">Ya</option>
                            <option value="tidak">Tidak</option>
                        </select>
                    </p>
                    <p><input type="text" placeholder="Penyakit Lain..." oninput="this.className = ''"
                            name="penyakit_lain"></p>

                    Alergi (Beri tanda "-" jika tidak ada alergi)
                    <p><input type="text" placeholder="Alergi obat-obatan..." oninput="this.className = ''"
                            name="alergi_obat"></p>
                    <p><input type="text" placeholder="Alergi Makanan..." oninput="this.className = ''"
                            name="alergi_makanan"></p>

                </div>
                <div class="tab">Record Gigi:
                    <input type="hidden" name="gigi" id="gigi">
                    <p>
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
                    </div>
                    </p>

                    <p>
                        Nomor gigi yang masuk:
                        <input type="text" placeholder="Angka Gigi..." oninput="this.className = ''" name="gigi"
                            id="nomor_gigi" disabled readonly>
                    </p>

                    Banyak Tembelan :
                    <div class="tembelan-detail row mb-3">

                    </div>

                    <p>
                        Radiologi
                        <input type="file" placeholder="File Radiologi..." oninput="this.className = ''"
                            name="radiologi">
                    </p>
                    <p>
                        Dokumen
                        <input type="file" placeholder="File Radiologi..." oninput="this.className = ''"
                            name="dokumen">
                    </p>
                    <p>Anamnesa
                        <textarea name="anamnesa" id="" class="w-100"></textarea>
                    </p>
                    <p>Diagnosa
                        <textarea name="diagnosa" id="" class="w-100"></textarea>
                    </p>
                    <p>Tindakan
                        <textarea name="tindakan" id="" class="w-100"></textarea>
                    </p>
                </div>
                {{-- <div class="tab">Birthday:
                <p><input placeholder="dd" oninput="this.className = ''" name="dd"></p>
                <p><input placeholder="mm" oninput="this.className = ''" name="nn"></p>
                <p><input placeholder="yyyy" oninput="this.className = ''" name="yyyy"></p>
            </div>
            <div class="tab">Login Info:
                <p><input placeholder="Username..." oninput="this.className = ''" name="uname"></p>
                <p><input placeholder="Password..." oninput="this.className = ''" name="pword" type="password"></p>
            </div> --}}
                <div style="overflow:auto;">
                    <div style="float:right;">
                        <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                    </div>
                </div>
                <!-- Circles which indicates the steps of the form: -->
                <div style="text-align:center;margin-top:40px;">
                    <span class="step"></span>
                    <span class="step"></span>
                    {{-- <span class="step"></span>
                <span class="step"></span> --}}
                </div>
            </form>
        @else
            <form id="sectionForm" action="{{ route('guest.medical-record.update', $patien->slug) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <h1 class="text-center">{{ $judul }}</h1>

                <!-- One "tab" for each step in the form: -->
                {{-- update data --}}
                <div class="tab">Pilih Pasien:
                    <p>
                        <select name="patient_id" oninput="this.className = ''" required>
                            <option value="{{ $patien->patien->id }}">{{ $patien->patien->name }}</option>
                        </select>
                    </p>
                    <p class="text-center">Data Medik yang Perlu di Perhatikan:</p>
                    <p>
                        Golongan Darah
                        <select name="gol_darah" oninput="this.className = ''" required>
                            <option {{ $patien->gol_darah == 'A' ? 'selected' : '' }} value="A">A</option>
                            <option {{ $patien->gol_darah == 'B' ? 'selected' : '' }} value="B">B</option>
                            <option {{ $patien->gol_darah == 'AB' ? 'selected' : '' }} value="AB">AB</option>
                            <option {{ $patien->gol_darah == 'O' ? 'selected' : '' }} value="O">O</option>
                        </select>
                    </p>
                    <p><input type="text" placeholder="Tekanan darah..." oninput="this.className = ''"
                            name="tekanan_darah" value="{{ $patien->tekanan_darah }}">
                    </p>
                    <p> Jantung
                        <select name="penyakit_jantung" oninput="this.className = ''" required>
                            {{-- <option disabled selected>Pilihan</option> --}}
                            <option {{ $patien->penyakit_jantung == 'ya' ? 'selected' : '' }} value="ya">Ya</option>
                            <option {{ $patien->penyakit_jantung == 'tidak' ? 'selected' : '' }} value="tidak">Tidak
                            </option>
                        </select>
                    </p>
                    <p> Haemophilia
                        <select name="haemophilia" oninput="this.className = ''" required>
                            {{-- <option disabled selected>Pilihan</option> --}}
                            <option {{ $patien->haemophilia == 'ya' ? 'selected' : '' }} value="ya">Ya</option>
                            <option {{ $patien->haemophilia == 'tidak' ? 'selected' : '' }} value="tidak">Tidak</option>
                        </select>
                    </p>
                    <p> Diabetes
                        <select name="diabetes" oninput="this.className = ''" required>
                            {{-- <option disabled selected>Pilihan</option> --}}
                            <option {{ $patien->diabetes == 'ya' ? 'selected' : '' }} value="ya">Ya</option>
                            <option {{ $patien->diabetes == 'tidak' ? 'selected' : '' }} value="tidak">Tidak</option>
                        </select>
                    </p>
                    <p> Hepatitis
                        <select name="hepatitis" oninput="this.className = ''" required>
                            {{-- <option disabled selected>Pilihan</option> --}}
                            <option {{ $patien->hepatitis == 'ya' ? 'selected' : '' }} value="ya">Ya</option>
                            <option {{ $patien->hepatitis == 'tidak' ? 'selected' : '' }} value="tidak">Tidak</option>
                        </select>
                    </p>
                    <p><input type="text" placeholder="Penyakit Lain..." oninput="this.className = ''"
                            name="penyakit_lain" value="{{ $patien->penyakit_lain }}"></p>

                    Alergi (Beri tanda "-" jika tidak ada alergi)
                    <p><input type="text" placeholder="Alergi obat-obatan..." oninput="this.className = ''"
                            value="{{ $patien->alergi_obat }}" name="alergi_obat"></p>
                    <p><input type="text" placeholder="Alergi Makanan..." oninput="this.className = ''"
                            value="{{ $patien->alergi_makanan }}" name="alergi_makanan"></p>

                </div>
                <div class="tab">Record Gigi:
                    <input type="hidden" name="gigi" id="gigi" value="{{ $patien->gigi }}">
                    <p>
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
                    </div>
                    </p>

                    <p>
                        Nomor gigi yang masuk:
                        <input type="text" placeholder="Angka Gigi..." oninput="this.className = ''" name="gigi"
                            id="nomor_gigi" disabled readonly>
                    </p>

                    Banyak Tembelan :
                    <div class="tembelan-detail row mb-3">

                    </div>

                    <p>
                        Radiologi
                        <input type="file" placeholder="File Radiologi..." oninput="this.className = ''"
                            name="radiologi" value="{{ $patien->radiology[0]->image }}">
                    </p>
                    <p>
                        Dokumen
                        <input type="file" placeholder="File Radiologi..." oninput="this.className = ''"
                            name="dokumen" value="{{ $patien->document[0]->document }}">
                    </p>
                    <p>Anamnesa
                        <textarea name="anamnesa" id="" class="w-100">{{ $patien->anamnesa }}</textarea>
                    </p>
                    <p>Diagnosa
                        <textarea name="diagnosa" id="" class="w-100">{{ $patien->diagnosa }}</textarea>
                    </p>
                    <p>Tindakan
                        <textarea name="tindakan" id="" class="w-100">{{ $patien->tindakan }}</textarea>
                    </p>
                </div>
                <div style="overflow:auto;">
                    <div style="float:right;">
                        <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                    </div>
                </div>
                <!-- Circles which indicates the steps of the form: -->
                <div style="text-align:center;margin-top:40px;">
                    <span class="step"></span>
                    <span class="step"></span>
                    {{-- <span class="step"></span>
                <span class="step"></span> --}}
                </div>
            </form>
        @endif

    </section>
@endsection

@section('plugin-body')
    <script src="{{ asset('/js/formRecord.js') }}"></script>
@endsection
