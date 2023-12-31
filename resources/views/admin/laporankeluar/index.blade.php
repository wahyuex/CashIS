@extends('layoutsadmin.app')

@section('content')
    <div class="container mt-4">
        <div class="row mb-0">
            <div class="col-lg-9 col-xl-6">
                <h4 class="mb-3">Laporan Keluar</h4>
            </div>
            <div class="col-lg-3 col-xl-6">
                <ul class="list-inline mb-0 float-end">
                    <li class="list-inline-item">
                        <a href="{{ route('laporankeluar.exportExcel') }}" class="btn btn-outline-success">
                            <i class="bi bi-download me-1"></i> to Excel
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="{{ route('laporankeluar.exportPDF') }}" class="btn btn-outline-danger">
                            <i class="bi bi-download me-1"></i> to PDF
                        </a>
                    </li>
                    <li class="list-inline-item"></li>
                    <li class="list-inline-item">
                        {{-- <a href="{{ route('admin.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle me-1"></i> Create Employee
                        </a> --}}
                    </li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="table-responsive border p-3 rounded-3 mb-5">
            <table class="table table-bordered table-hover table-striped mb-0 bg-white datatable" id="employeeTable">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>tanggal</th>
                        <th>kode_produk</th>
                        <th>nama_produk</th>
                        <th>harga_satuan</th>
                        <th>satuan_obat</th>
                        <th>jumlah_keluar</th>
                        {{-- <th>pemasok</th> --}}
                        <th>total_harga</th>
                        <th></th>
                    </tr>
                    <tbody>
                        @foreach ($reportouts as $reportin)
                            <tr class="text-center">
                                <td>{{ $reportin->id }}</td>
                                <td>{{ $reportin->tanggal }}</td>
                                <td>{{ $reportin->kode_produk }}</td>
                                <td>{{ $reportin->nama_produk }}</td>
                                <td>{{ $reportin->harga_satuan }}</td>
                                <td>{{ $reportin->satuan->name_satuan}}</td>
                                <td>-{{ $reportin->jumlah_keluar }}</td>
                                {{-- <td>{{ $reportin->pemasok }}</td> --}}
                                <td>{{ $reportin->total_harga }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </thead>
            </table>
        </div>
    </div>
@endsection