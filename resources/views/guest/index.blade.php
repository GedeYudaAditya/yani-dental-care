@extends('guest.layouts.app')

@section('content')
    {{-- Start of jumbotron --}}
    @include('components.jumbotron')
    {{-- End of jumbotron --}}

    {{-- Start of Status App --}}
    <section class="container mb-5">

        <h4 class="text-center">Selamat datang dokter [Name]</h4>

        <hr>

        <div class="row">
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="card text-bg-primary mb-3 h-100">
                    <div class="card-header">Jumlah Pasien</div>
                    <div class="card-body">
                        <h4 class="card-title">25 Pasien</h4>
                        <p class="card-text">telah terdaftar dalam aplikasi, anda dapat mengelolanya pada menu
                            <a class="text-mylink" href="#">daftar pasien</a>.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="card text-bg-primary mb-3 h-100">
                    <div class="card-header">Jumlah Riwayat Medis</div>
                    <div class="card-body">
                        <h4 class="card-title">25 History</h4>
                        <p class="card-text">telah dibuat dalam aplikasi, anda dapat mengelolanya pada menu
                            <i><a class="text-mylink" href="#">medical history</a></i>.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="card text-bg-primary mb-3 h-100">
                    <div class="card-header">Update Terakhir</div>
                    <div class="card-body">
                        <h4 class="card-title">13 Februari 2023</h4>
                        <p class="card-text">Aplikasi ini masih dalam tahap pengembangan, untuk informasi lebih lanjut
                            hubungi
                            <a class="text-mylink" href="#">admin</a>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- End of Status App --}}

    {{-- Start of All Menu --}}
    <section class="container">
        <h4 class="text-center">Menu</h4>
        <hr>
        <div class="row">
            <div class="col-md-4 mb-3 mb-md-0">
                <a href="" class="text-decoration-none text-white">
                    <div class="card text-bg-dark active-menu">
                        <img src="{{ asset('images/pasien.jpg') }}" class="card-img myimage" alt="Pasien">
                        <div class="card-img-overlay text-center d-flex align-items-center">
                            <div class="row align-content-around h-100">
                                <h5 class="card-title col-12">Daftar Pasien</h5>
                                <p class="card-text col-12">
                                    Melihat daftar pasien yang telah terdaftar dalam aplikasi ini.
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
                <a href="" class="text-decoration-none text-white">
                    <div class="card text-bg-dark active-menu">
                        <img src="{{ asset('images/medical_records.jpg') }}" class="card-img myimage" alt="Medical Record">
                        <div class="card-img-overlay text-center d-flex align-items-center">
                            <div class="row align-content-around h-100">
                                <h5 class="card-title col-12">Medical History</h5>
                                <p class="card-text col-12">
                                    Menambahkan riwayat medis pasien yang telah terdaftar dalam sistem.
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="card text-bg-dark disabled-menu">
                    <img src="{{ asset('images/appointment.jpg') }}" class="card-img myimage" alt="Jadwal">
                    <div class="card-img-overlay text-center d-flex align-items-center">
                        <div class="row align-content-around h-100">
                            <h5 class="card-title col-12">Appointment Management</h5>
                            <p class="card-text col-12">
                                Melihat jadwal pasien yang telah terdaftar dalam aplikasi ini.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
