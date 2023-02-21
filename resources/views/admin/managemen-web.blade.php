@extends('admin.layouts.app')

@section('content')
    @include('components.topbar')
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">

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
@endsection
