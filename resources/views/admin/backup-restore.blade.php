@extends('admin.layouts.app')

@section('content')
    @include('components.topbar')
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            @include('components.cards-group')

            <div class="card mt-3 bg-dark text-white">
                <div class="card-body">
                    <h3 class="card-title text-center">Backup <i class="bi bi-layer-backward"></i></h3>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <div class="card mt-3">
                        <div class="card-status-start bg-green"></div>
                        <div class="card-body">
                            <h3 class="card-title">Fitur belum tersedia untuk saat ini.</h3>
                            <p class="text-muted">
                                Fitur ini akan segera hadir di versi selanjutnya.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mt-3">
                        <div class="card-status-start bg-green"></div>
                        <div class="card-body">
                            <h3 class="card-title">Fitur belum tersedia untuk saat ini.</h3>
                            <p class="text-muted">
                                Fitur ini akan segera hadir di versi selanjutnya.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mt-3">
                        <div class="card-status-start bg-green"></div>
                        <div class="card-body">
                            <h3 class="card-title">Fitur belum tersedia untuk saat ini.</h3>
                            <p class="text-muted">
                                Fitur ini akan segera hadir di versi selanjutnya.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card bg-dark text-white">
                <div class="card-body">
                    <h3 class="card-title text-center">Restore <i class="bi bi-box-arrow-in-up"></i></h3>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="card mt-3">
                        <div class="card-status-start bg-green"></div>
                        <div class="card-body">
                            <h3 class="card-title">Fitur belum tersedia untuk saat ini.</h3>
                            <p class="text-muted">
                                Fitur ini akan segera hadir di versi selanjutnya.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mt-3">
                        <div class="card-status-start bg-green"></div>
                        <div class="card-body">
                            <h3 class="card-title">Fitur belum tersedia untuk saat ini.</h3>
                            <p class="text-muted">
                                Fitur ini akan segera hadir di versi selanjutnya.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mt-3">
                        <div class="card-status-start bg-green"></div>
                        <div class="card-body">
                            <h3 class="card-title">Fitur belum tersedia untuk saat ini.</h3>
                            <p class="text-muted">
                                Fitur ini akan segera hadir di versi selanjutnya.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
