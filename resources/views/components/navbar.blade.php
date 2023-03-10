<nav class="navbar navbar-expand-md sticky-top navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('/static') }}/AYANI.png" height="30" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('home') ? 'active' : '' }}" aria-current="page"
                        href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('data-pasien') ? 'active' : '' }}"
                        href="{{ route('data-pasien') }}">Pasien</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('medical-record') ? 'active' : '' }}"
                        href="{{ route('medical-record') }}">Medical History</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">{{ auth()->user()->name }}</a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="nav-link"
                            style="background-color: transparent; border: none;">Logout <i
                                class="bi bi-box-arrow-right"></i></button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
