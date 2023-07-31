<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    @vite('resources/sass/app.scss')
</head>

<body>
    {{-- navbar --}}
    <nav class="navbar bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img href="#" class="fw-bold"><img src="{{ Vite::asset('resources/images/logo.png') }}"
                    alt="image" width=100px>
            </a>
            <a class="nav-link active fs-3 fw-bold" aria-current="page" href="{{ route('login') }}"><i
                    class="bi bi-box-arrow-in-right fs-2"></i> Login</a>
        </div>
    </nav>
    {{-- deskripsi singkat aplikasi --}}
    <section id="welcome" class="text-center">
        <div class="container py-5">
            <div class="row text-center">
                <div class="col-md-5">
                    <h1 class="mt-4 display-3">CashIS</h1>
                    <p class="fs-4 mt-3">Aplikasi Point Of Sales yang dapat membantu laporan penjualan anda</p>
                </div>
                <div class="col-md-6">
                    <img class="img-fluid" src="{{ Vite::asset('resources/images/welcome.png') }}" alt="main welcome"
                        width="100%">
                </div>
            </div>
        </div>
    </section>
    <section class="p-5 "style="background-color: black">
        <div class="container text-center">
            <div class="row text-center g-4">
                <div class="col-md">
                    <div class="card">
                        <div class="card-body text-center">
                            <img src="{{ Vite::asset('resources/images/kasir.png') }}" alt="kasir" width="100px">
                            <h3 class="card-title mb-3">Kasir</h3>
                            <p class="card-text">Kasir sendiri fitur untuk terhubung ke customer agar bisa menjalani
                                proses pembayaran lebih efisiensi</p>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <div class="card-body text-center">
                            <img src="{{ Vite::asset('resources/images/income.png') }}" alt="kasir" width="100px">
                            <h3 class="card-title mb-3">Laporan Masuk</h3>
                            <p class="card-text">Laporan masuk dalam aplikasi CashIS merupakan ketika ada barang masuk
                                maka akan muncul dalam history laporan masuk</p>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <div class="card-body text-center">
                            <img src="{{ Vite::asset('resources/images/outcome.png') }}" alt="kasir" width="100px">
                            <h3 class="card-title mb-3">Laporan Keluar</h3>
                            <p class="card-text">Laporan Keluar aplikasi CashIS merupakan ketika si kasir melakukan
                                CheckOut maka akan muncul history laporan keluar</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @vite('resources/js/app.js')
</body>

</html>
