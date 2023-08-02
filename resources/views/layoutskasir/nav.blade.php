@php
    $currentRouteName = Route::currentRouteName();
@endphp

<nav class="navbar navbar-expand-md navbar-dark" style="background-color: #45B8A7">
    <div class="container">
        <a href=" {{ route('homekasir') }} " class="navbar-brand mb-0 h1"> <img src="{{ Vite::asset('resources/images/logotextnew.png') }}" width="75" height="40"></a>

        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <hr class="d-md-none text-white-50">

            {{-- <ul class="navbar-nav flex-row flex-wrap">
                <li class="nav-item col-2 col-md-auto"><a href="{{ route('cart') }}"
                        class="nav-link @if ($currentRouteName == 'cart') active @endif">Keranjang</a></li>
                <li class="nav-item col-2 col-md-auto"><a href="{{ route('pengguna.index') }}"
                        class="nav-link @if ($currentRouteName == 'pengguna.index') active @endif">Pengguna</a></li>
                <li class="nav-item col-2 col-md-auto"><a href="{{ route('laporanmasuk.index') }}"
                        class="nav-link @if ($currentRouteName == 'laporanmasuk.index') active @endif">Laporan Masuk</a></li>
                <li class="nav-item col-2 col-md-auto"><a href="{{ route('laporankeluar.index') }}"
                        class="nav-link @if ($currentRouteName == 'laporankeluar.index') active @endif">Laporan Keluar</a></li>
            </ul> --}}

            <hr class="d-md-none text-white-50">

            <li class="nav-item dropdown btn btn-success my-2 ms-md-auto">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <i class="bi bi-person-circle"></i>
                    @if (Auth::check())
                        {{ Auth::user()->name }}
                    @endif

                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    {{-- <a class="dropdown-item" href=""
                        onclick="event.preventDefault(); document.getElementById('my-profile').submit();">
                        <i class="bi bi-person-fill"></i>
                        {{ __('My Profil') }}
                    </a>

                    <form id="my-profile" action="" method="POST" class="d-none">
                        @csrf
                    </form> --}}

                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red"
                            class="bi bi-lock-fill" viewBox="0 0 16 16">
                            <path
                                d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
                        </svg>
                        <span style="color: red;">{{ __('Logout') }}</span>
                    </a>


                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </div>
    </div>
</nav>



{{--
{{ route('profile') }}
{{ route('profile') }} --}}
