@extends('admin.layouts.app')

@section('content')
    @include('components.topbar')
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            @include('components.cards-group')

            <div class="card mt-3">
                <div class="card-status-start bg-green"></div>
                <div class="card-body">
                    <h3 class="card-title">Selamat datang {{ auth()->user()->name }}</h3>
                    <p class="text-muted">
                        Ini merupakan halaman admin, anda dapat mengelola data-data yang ada di website ini.
                    </p>
                </div>
            </div>

            <h3 class="hr-text">Menu</h3>

            <div class="row">
                <div class="col-md-4">
                    <a class="text-decoration-none" href="{{ route('admin.data-user') }}">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Manajemen Akun</h3>
                                <p class="text-muted">
                                    Anda dapat mengelola akun pengguna yang ada di website ini.
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a class="text-decoration-none" href="{{ route('admin.manage-web') }}">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Manajemen Konten Website</h3>
                                <p class="text-muted">
                                    Anda dapat mengelola beberapa konten website yang ada di website ini.
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a class="text-decoration-none" href="{{ route('admin.backup-restore') }}">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Backup & Restore</h3>
                                <p class="text-muted">
                                    Anda dapat melakukan backup dan restore data yang ada di website ini.
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
