@extends('layoutskasir.app')

@section('content')
    <div class="container mt-4">
        <div class="row mb-0">
            <div class="col-lg-9 col-xl-6">
                <h4 class="mb-3">List Obat</h4>
            </div>
            <div class="col-lg-3 col-xl-6">
                <ul class="list-inline mb-0 float-end">
                    <li class="list-inline-item">
                        {{-- <a href="{{ route('admin.exportExcel') }}" class="btn btn-outline-success">
                            <i class="bi bi-download me-1"></i> to Excel
                        </a> --}}
                    </li>
                    <li class="list-inline-item">
                        {{-- <a href="{{ route('admin.exportPdf') }}" class="btn btn-outline-danger">
                            <i class="bi bi-download me-1"></i> to PDF
                        </a> --}}
                    </li>
                    <li class="list-inline-item">|</li>
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
                        {{-- <td>code</td> --}}
                        <th>Name</th>
                        <th>harga</th>
                        <th>stock</th>
                        <th>kategori</th>
                        {{-- <th>quantity</th> --}}
                        <th>satuan</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listobats as $listobat)
                        <tr class="text-center">
                            {{-- <td>{{ $listobat->code }}</td> --}}
                            <td>{{ $listobat->name }}</td>
                            <td>{{ $listobat->harga }}</td>
                            <td>{{ $listobat->stock }}</td>
                            <td>{{ $listobat->kategori }}</td>
                            {{-- <td><input type="number" class="form-control" id="jumlah_keluar" name="jumlah_keluar" required></td> --}}
                            <td>{{ $listobat->satuan->name_satuan }}</td>
                            <td><form action="{{ route('add-to-cart') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $listobat->id }}">
                                <button type="submit">Tambah ke Cart</button>
                            </form></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
