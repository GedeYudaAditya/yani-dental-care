@extends('guest.layouts.app')

@section('content')
    <section class="container my-3">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Daftar Medical Record</h1>
            </div>
        </div>
        {{-- closable alert --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

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
