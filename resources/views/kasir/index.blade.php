@extends('layoutskasir.app')

@section('content')
    <div class="container text-center" style="margin-top: 50px">
        <div class="row">
            <div class="col">
                <!-- Kolom pencarian -->
                <div class="button-container">
                    <table class="table table-bordered table-hover table-striped mb-0 bg-white" style="width: 700px"
                        id="employeeTable">
                        <thead>
                            <tr>
                                <th>Nama Obat</th>
                                <th>Harga</th>
                                <th>Stock</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listobats as $listobat)
                                <tr>
                                    <td>{{ $listobat->name }}</td>
                                    <td>Rp{{ $listobat->harga }},.</td>
                                    <td>{{ $listobat->stock }}</td>
                                    <td>
                                        <form action="{{ route('add-to-cart') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $listobat->id }}">
                                            <button type="submit" class="btn btn-outline-dark btn-rounded"
                                                data-mdb-ripple-color="dark"><svg width="35" height="36"
                                                    viewBox="0 0 35 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M15.1084 31.5C16.3004 31.5 17.2668 30.4926 17.2668 29.25C17.2668 28.0074 16.3004 27 15.1084 27C13.9164 27 12.9501 28.0074 12.9501 29.25C12.9501 30.4926 13.9164 31.5 15.1084 31.5Z"
                                                        fill="#32AB3E" />
                                                    <path
                                                        d="M25.1807 31.5C26.3727 31.5 27.339 30.4926 27.339 29.25C27.339 28.0074 26.3727 27 25.1807 27C23.9887 27 23.0223 28.0074 23.0223 29.25C23.0223 30.4926 23.9887 31.5 25.1807 31.5Z"
                                                        fill="#32AB3E" />
                                                    <path
                                                        d="M30.2168 10.5H10.5529L8.89239 6.34501C8.67442 5.79772 8.30549 5.33022 7.83235 5.00176C7.35922 4.6733 6.8032 4.49867 6.23475 4.50001H2.87781V7.50001H6.23619L13.0609 24.5775C13.2839 25.1355 13.8091 25.5 14.389 25.5H25.9001C26.5002 25.5 27.0369 25.1115 27.2484 24.528L31.5651 12.528C31.6459 12.3009 31.673 12.0568 31.6439 11.8164C31.6149 11.5761 31.5306 11.3466 31.3982 11.1475C31.2659 10.9484 31.0893 10.7856 30.8837 10.6728C30.678 10.5601 30.4492 10.5008 30.2168 10.5ZM24.4612 19.5H21.5835V22.5H18.7057V19.5H15.8279V16.5H18.7057V13.5H21.5835V16.5H24.4612V19.5Z"
                                                        fill="#32AB3E" />
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col">
                <div style="display: flex ; margin-top: 20px;">
                    <img src="{{ Vite::asset('resources\images\logo.png') }}" alt="image">
                    <h5 style="margin-left: 120px">Apotik Aasiyah <br>Jl. Mojoroto</h5>
                </div>
                <div style="display: flex ; justify-content: space-between; margin-top: ">
                    <div>
                        {{-- <div>bu</div>
                        <div>tanggal</div> --}}
                    </div>
                    <div>
                        <div
                            style="box-shadow: 0px 4px 4px 0px #00000040; width: 145px;
                        height: 25px;
                        top: 108px;
                        left: 421px;
                        border-radius: 5px;
                        ">
                            ID Kasir :</div>
                        <div
                            style="margin-top: 10px; box-shadow: 0px 4px 4px 0px #00000040; width: 145px;
                        height: 25px;
                        top: 108px;
                        left: 421px;
                        border-radius: 5px;">
                            Nama Kasir :</div>
                    </div>
                </div>
                <form action="{{ route('checkout') }}" id="checkoutForm" method="POST">
                    @csrf
                    <table style="margin-top: 20px"
                        class="table table-bordered table-hover table-striped mb-0 bg-white datatable" id="employeeTable">
                        <thead>
                            <tr>
                                <th>Barang</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>SubTotal</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody class="cart-items">
                            @foreach ($cartItems as $cartItem)
                                <tr class="text-center">
                                    <td>{{ $cartItem->name }}</td>
                                    <td>
                                        {{ $cartItem->harga }}
                                        <input type="hidden" data-harga="{{ $cartItem->harga }}"
                                            name="harga_produk_{{ $cartItem->id }}">
                                    </td>
                                    <td>
                                        <input type="number" class="quantity-input" id="jumlah_keluar_{{ $cartItem->id }}"
                                            name="jumlah_keluar_{{ $cartItem->id }}">
                                        <input type="hidden" name="kode_produk_{{ $cartItem->id }}"
                                            value="{{ $cartItem->code }}">
                                    </td>
                                    <td class="subtotal"></td>
                                    <td><a style="color: black;text-decoration: none;"
                                            href="{{ URL::to('Kasirdestroy/' . $cartItem->id) }}">X</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div style="display: flex; justify-content: space-between">
                        <div style="text-align: left;">
                            <label for="bayar">Bayar :</label>
                            <input type="number" id="bayarInput"><br>
                            <h5 id="Total">Total : </h5>
                            <hr>
                            <h5 id="kembalian">Kembalian : </h5>

                            <!-- Existing input fields -->

                        </div>
                        <div style="display: inline-block; font-family: Arial, sans-serif; font-size: 18px; font-weight: 700; text-decoration: none; padding: 12px 24px; background-color: #758BFF; color: #ffffff; border-radius: 8px; transition: background-color 0.2s ease-in-out;">
                            <svg width="104" height="104" viewBox="0 0 104 104" fill="none"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <rect width="104" height="104" fill="url(#pattern0)" />
                                <defs>
                                    <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1"
                                        height="1">
                                        <use xlink:href="#image0_134_263" transform="scale(0.0111111)" />
                                    </pattern>
                                    <image id="image0_134_263" width="90" height="90"
                                        xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABaCAYAAAA4qEECAAAACXBIWXMAAAsTAAALEwEAmpwYAAACrUlEQVR4nO2dzY5MURRGrx4wIHgK+glE/LwACe8gjElPDEwMm4cw8BRtgIHwCIgBBtrPE2Cgl9zkiE5139al9rdrn117JTWp5J7zrS/3nnurKjk1DEVRFEVRFEVRFNkBjgIPgM/kZRvYHF2XWfQYYFXYXGbRmc/kWb4ss+iVYqiifaiiV7XooXOI5hUuUFavcIGyeoULlNUrXKCsXuECZfUKFyirV7hAWb3CBcrqtUgg5jwWI9ReEjxlMELtJcFTBiPUXhI8ZTBC7SXBUwYj1F4SPGUwQu0lIVygrF7hAmX1Chcoq1e4QFm9wgXK6hUuUFavRQIx57EYofaS4CmDEWovCZ4yGKH2kuApgxFqLwmeMhih9pLgKYMRai8J4QJl9QoXKKtXuEBZvcIFyuoVLlBWr3CBsnotEog5j8UItZcETxmMUHtJ8JTBCLWXBE8ZjFB7SfCUwQi1lwRPGYxQe0kIFyirV7hAWb3CBcrqFS5QVq9wgbJ6hQuU1StcoKxe4QJl9QoXqEevjnYA27bexWtqIqvxe98BbNPQfV+sxp+dLPqZLNvFiwmsxp+d7Cf9ccLA++TE2D9smt074Tf644yB91nXfe+AV/THDQPvWxNjv7Bpdu+ED+mPLQPvJ65bZgIX6ZNLCzhfPmDc87YN/510bVyX6I/XwKn/8D0NvJ0Yc3wCW5MU3SbfoE+ezlN2K/nZAePdlpXcAhwDPtAnbw6zjLTlYupMHnk/9iAtugW5DuzQL1vATWAdON5e6+29qRvfH34BV+Ul7yr7PqvJPbeSW9FHgMesFo9Gb9eid5V9t11OmdlpV7B/yTOFX+v4Bvkv3gFXhii0p5GNTp+z9+MjcGep/0xxiA81F9rH9ZfA1w6+9fsOfAKetx82zi19mSiKoiiKoiiKohic+Q3luscY+1orIAAAAABJRU5ErkJggg==" />
                                </defs>
                            </svg>
                            {{-- <button type="submit" class="btn btn-outline-light btn-sm me-2 btn-delete" data-name="{{ $user->email }}"><svg --}}
                            <button id="cetakStrukButton"
                                style="display: block font-family: Inter;
                            font-size: 24px;
                            font-weight: 700;
                            line-height: 29px;
                            letter-spacing: 0em;
                            text-align: left;border: none;background: #758BFF;color: #ffffff;"
                                type="submit" class="btn-delete" data-name="Cetak Struk">Check Out</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('search')
    <script type="module">
        $(document).ready(function() {
            $('#employeeTable').DataTable();
            $(".datatable").on("click", ".btn-delete", function(e) {
                e.preventDefault();

                var form = $(this).closest("form");
                var name = $(this).data("name");

                Swal.fire({
                    title: "Are you sure want to delete\n" + name + "?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "bg-primary",
                    confirmButtonText: "Yes, delete it!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endpush

{{-- @push('struk')
<script>
    // Function to generate the PDF

  </script>

@endpush --}}
