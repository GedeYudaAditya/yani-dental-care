@extends('guest.layouts.app')

@section('content')
    <section class="container my-3">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Daftar Pasien</h1>
            </div>
        </div>
        <div class="border rounded p-3">
            <div class="table-responsive">
                {!! $dataTable->table() !!}
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush
