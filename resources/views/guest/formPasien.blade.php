@extends('guest.layouts.app')

@section('plugin-head')
    <link rel="stylesheet" href="{{ asset('/css/formPasien.css') }}">
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

    </section>
@endsection

@section('plugin-body')
    <script src="{{ asset('/js/formPasien.js') }}"></script>
@endsection
