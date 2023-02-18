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
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

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
        @if ($judul == 'Tambah Pasien')
            <form id="sectionForm" action="{{ route('guest.pasien.store') }}" method="POST">
                @csrf
                <h1 class="text-center">{{ $judul }}</h1>

                <!-- One "tab" for each step in the form: -->
                <div class="tab">Data Diri Pasien:
                    <p><input type="text" placeholder="Nama..." oninput="this.className = ''" name="name"></p>
                    <p><input type="date" placeholder="Tempat Tanggal Lahir..." oninput="this.className = ''"
                            name="ttl">
                    </p>
                    <p><input type="text" placeholder="Alamat..." oninput="this.className = ''" name="alamat_rumah"></p>
                </div>
                <div class="tab">Info lainnya:
                    <p><input type="text" placeholder="Alamat Kantor..." oninput="this.className = ''"
                            name="alamat_kantor">
                    </p>
                    <p>
                        <select name="jenis_kelamin" oninput="this.className = ''">
                            <option disabled selected>Jenis Kelamin</option>
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </p>
                    <p><input type="text" placeholder="Pekerjaan..." oninput="this.className = ''" name="pekerjaan"></p>
                    <p><input type="tel" placeholder="Phone..." oninput="this.className = ''" name="no_hp"></p>
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
                        if (z[i].options[z[i].selectedIndex].text == "Jenis Kelamin") {
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

    </section>
@endsection
