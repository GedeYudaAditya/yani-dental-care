@extends('guest.layouts.app')

@section('plugin-head')
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background-color: #f1f1f1;
        }

        #sectionForm {
            background-color: #ffffff;
            margin: 100px auto;
            font-family: Raleway;
            padding: 40px;
            width: 70%;
            min-width: 300px;
        }

        h1 {
            text-align: center;
        }

        input {
            padding: 10px;
            width: 100%;
            font-size: 17px;
            font-family: Raleway;
            border: 1px solid #aaaaaa;
        }

        /* Mark input boxes that gets an error on validation: */
        input.invalid {
            background-color: #ffdddd;
        }

        select {
            padding: 10px;
            width: 100%;
            font-size: 17px;
            font-family: Raleway;
            border: 1px solid #aaaaaa;
        }

        /* Mark input boxes that gets an error on validation: */
        select.invalid {
            background-color: #ffdddd;
        }

        /* Hide all steps by default: */
        .tab {
            display: none;
        }

        button {
            background-color: #04AA6D;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            font-size: 17px;
            font-family: Raleway;
            cursor: pointer;
        }

        button:hover {
            opacity: 0.8;
        }

        #prevBtn {
            background-color: #bbbbbb;
        }

        /* Make circles that indicate the steps of the form: */
        .step {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbbbbb;
            border: none;
            border-radius: 50%;
            display: inline-block;
            opacity: 0.5;
        }

        .step.active {
            opacity: 1;
        }

        /* Mark the steps that are finished and valid: */
        .step.finish {
            background-color: #04AA6D;
        }

        /* clear the css */
        .none {
            padding: 0 !important;
            margin: 0 !important;
            border: none !important;
            background: none !important;
        }
    </style>
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
                        <select name="patient_id" oninput="this.className = ''" required>
                            <option disabled selected>Pilihan</option>
                            @foreach ($pasien as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
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
            <form id="sectionForm" action="{{ route('guest.pasien.update', $patien->slug) }}" method="POST">
                @csrf
                <h1 class="text-center">{{ $judul }}</h1>

                <!-- One "tab" for each step in the form: -->
                <div class="tab">Data Diri Pasien:
                    <p><input type="text" placeholder="Nama..." oninput="this.className = ''" name="name"
                            value="{{ $patien->name }}"></p>
                    <p><input type="date" placeholder="Tempat Tanggal Lahir..." oninput="this.className = ''"
                            name="ttl" value="{{ $patien->ttl }}">
                    </p>
                    <p><input type="text" placeholder="Alamat..." oninput="this.className = ''" name="alamat_rumah"
                            value="{{ $patien->alamat_rumah }}"></p>
                </div>
                <div class="tab">Info lainnya:
                    <p><input type="text" placeholder="Alamat Kantor..." oninput="this.className = ''"
                            name="alamat_kantor" value="{{ $patien->alamat_kantor }}">
                    </p>
                    <p>
                        <select name="jenis_kelamin" oninput="this.className = ''">
                            {{-- <option disabled selected>Jenis Kelamin</option> --}}
                            <option value="laki-laki" {{ $patien->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>
                                Laki-laki</option>
                            <option value="perempuan" {{ $patien->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>
                                Perempuan</option>
                        </select>
                    </p>
                    <p><input type="text" placeholder="Pekerjaan..." oninput="this.className = ''" name="pekerjaan"
                            value="{{ $patien->pekerjaan }}"></p>
                    <p><input type="tel" placeholder="Phone..." oninput="this.className = ''" name="no_hp"
                            value="{{ $patien->no_hp }}"></p>
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
        @endif

        <script>
            var loading = document.getElementsByClassName('loading');
            var currentTab = 0; // Current tab is set to be the first tab (0)
            showTab(currentTab); // Display the current tab

            function showTab(n) {
                // This function will display the specified tab of the form...
                var x = document.getElementsByClassName("tab");
                x[n].style.display = "block";
                //... and fix the Previous/Next buttons:
                if (n == 0) {
                    document.getElementById("prevBtn").style.display = "none";
                } else {
                    document.getElementById("prevBtn").style.display = "inline";
                }
                if (n == (x.length - 1)) {
                    document.getElementById("nextBtn").innerHTML = "Submit";
                } else {
                    document.getElementById("nextBtn").innerHTML = "Next";
                }
                //... and run a function that will display the correct step indicator:
                fixStepIndicator(n)
            }

            function nextPrev(n) {
                // This function will figure out which tab to display
                var x = document.getElementsByClassName("tab");
                // Exit the function if any field in the current tab is invalid:
                if (n == 1 && !validateForm()) return false;
                // Hide the current tab:
                x[currentTab].style.display = "none";
                // Increase or decrease the current tab by 1:
                currentTab = currentTab + n;
                // if you have reached the end of the form...
                if (currentTab >= x.length) {
                    // ... the form gets submitted:
                    document.getElementById("sectionForm").submit();

                    // on loading

                    return false;
                }
                // Otherwise, display the correct tab:
                showTab(currentTab);
            }

            function validateForm() {
                // This function deals with validation of the form fields
                var x, y, z, i, valid = true;
                x = document.getElementsByClassName("tab");
                y = x[currentTab].getElementsByTagName("input");
                z = x[currentTab].getElementsByTagName("select");
                // A loop that checks every input field in the current tab:
                for (i = 0; i < y.length; i++) {
                    // If a field is empty...
                    if (y[i].value == "") {
                        // add an "invalid" class to the field:
                        y[i].className += " invalid";
                        // and set the current valid status to false
                        valid = false;
                    }
                }

                for (i = 0; i < z.length; i++) {
                    // If a field is empty...
                    if (z.length > 0 && z[i] != undefined) {
                        // If a field from select is empty...
                        console.log(z[i].options[z[i].selectedIndex].value);
                        if (z[i].options[z[i].selectedIndex].text == "Pilihan") {
                            // add an "invalid" class to the field:
                            z[i].className += " invalid";
                            // and set the current valid status to false
                            valid = false;
                        }
                    }
                }
                // If the valid status is true, mark the step as finished and valid:
                if (valid) {
                    document.getElementsByClassName("step")[currentTab].className += " finish";
                }
                return valid; // return the valid status
            }

            function fixStepIndicator(n) {
                // This function removes the "active" class of all steps...
                var i, x = document.getElementsByClassName("step");
                for (i = 0; i < x.length; i++) {
                    x[i].className = x[i].className.replace(" active", "");
                }
                //... and adds the "active" class on the current step:
                x[n].className += " active";
            }
        </script>

        <script>
            // buat element dengan kelas kotak saat di klik mendapatkan nomor giginya dan di tambahkan ke inputan
            var arrayOfObject = [];
            var angka = [];
            var indicator = 0;
            $(document).ready(function() {
                $('.kotak').click(function() {
                    var tembelan_detail = $('.tembelan-detail');

                    // console.log(tembelan_detail);

                    var nomor = $(this).attr('data-nomor');
                    var nomor_gigi = $('#nomor_gigi').val();
                    var gigi = $('#gigi').val();
                    var isExist = false;

                    // check apakah nomor sudah pernah di ambil
                    isExist = angka.includes(nomor);
                    // console.log(angka.includes(nomor));

                    if (isExist != true) {
                        arrayOfObject.push(['tembelan', nomor, '1']);
                        $(this).addClass('tembelan');
                        angka.push(nomor);
                        console.log(arrayOfObject);

                        // add input in .tembelan-detail for each nomor
                        tembelan_detail.append('<p id="tembelan-' + nomor +
                            '" class="col-md-3">Tembelan no ' + nomor +
                            ' <input class="banyak-tembelan mb-2" type="number" id="tem-input-' + nomor +
                            '" name="tembelan_detail[]" value="1"></p>');

                        var nomor_gigi = angka;
                        $('#nomor_gigi').val(nomor_gigi);

                        var gigi = arrayOfObject;
                        $('#gigi').val(JSON.stringify(gigi));
                    } else {
                        // remove array that have same value with nomor
                        arrayOfObject = arrayOfObject.filter(function(item) {
                            return item[1] !== nomor
                        });

                        // remove angka that have same value with nomor
                        angka = angka.filter(function(item) {
                            return item !== nomor
                        });

                        indicator++;
                        if ($(this).hasClass('tembelan')) {
                            $(this).removeClass('tembelan');
                            $(this).addClass('sisa-akar');
                            arrayOfObject.push(['sisa-akar', nomor, '1']);
                            var gigi = arrayOfObject;
                            $('#gigi').val(JSON.stringify(gigi));
                            angka.push(nomor);

                            // remove input in #tembelan-detail for each nomor
                            $('#tembelan-' + nomor).remove();
                        } else if ($(this).hasClass('sisa-akar')) {
                            $(this).removeClass('sisa-akar');
                            $(this).addClass('lubang');
                            arrayOfObject.push(['lubang', nomor, '1']);
                            var gigi = arrayOfObject;
                            $('#gigi').val(JSON.stringify(gigi));
                            angka.push(nomor);
                        } else if ($(this).hasClass('lubang')) {
                            $(this).removeClass('lubang');
                            $(this).addClass('hilang');
                            arrayOfObject.push(['hilang', nomor, '1']);
                            var gigi = arrayOfObject;
                            $('#gigi').val(JSON.stringify(gigi));
                            angka.push(nomor);
                        } else {
                            $(this).removeClass('hilang');
                            // remove string that have same value with nomor
                            var nomor_gigi = angka;
                            $('#nomor_gigi').val(nomor_gigi);
                            var gigi = arrayOfObject;
                            $('#gigi').val(JSON.stringify(gigi));
                            indicator = 0;
                        }
                    }
                });

            });

            // add event listener to .banyak-tembelan
            $(document).on('change', '.banyak-tembelan', function() {
                var nomor = $(this).attr('id').split('-')[2];
                var banyak = $(this).val();
                var gigi = arrayOfObject;

                // update arrayOfObject
                for (var i = 0; i < gigi.length; i++) {
                    if (gigi[i][1] == nomor) {
                        gigi[i][2] = banyak;
                    }
                }

                // update gigi
                $('#gigi').val(JSON.stringify(gigi));
            });
        </script>

    </section>
@endsection
