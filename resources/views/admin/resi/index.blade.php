@extends('layoutsadmin.app')

@section('content')
    <div class="container mt-4">
        <div class="row mb-0">
            <div class="col-lg-9 col-xl-6">
                <h4 class="mb-3">List Resi</h4>
            </div>
            <div class="col-lg-3 col-xl-6">
                <ul class="list-inline mb-0 float-end">
                    <li class="list-inline-item">
                        <a href="{{ route('resi.create') }}" class="btn btn-success">
                            <i class="bi bi-download me-1"></i> Create Resi
                        </a>
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
                        <th>No.</th>
                        <th>NamaPT</th>
                        <th>Tanggal</th>
                        <th>FotoResi</th>
                        <th>Diskon</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($resis as $resi)
                        <tr class="text-center">
                            <td>{{ $resi->id }}</td>
                            <td>{{ $resi->namapt }}</td>
                            <td>{{ $resi->tanggal }}</td>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#fullImageModal{{ $resi->id }}">
                                    <img src="{{ asset('storage/files/' . $resi->encrypted_filename) }}" alt="FotoResi" style="max-width: 100px;">
                                </a>
                            </td>
                            <td>{{ $resi->diskon }}%</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @foreach ($resis as $resi)
    <div class="modal fade" id="fullImageModal{{ $resi->id }}" tabindex="-1" aria-labelledby="fullImageModalLabel{{ $resi->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fullImageModalLabel{{ $resi->id }}">Full Image - {{ $resi->namapt }}</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('storage/files/' . $resi->encrypted_filename) }}" alt="FotoResi" style="width: 100%; max-width: 800px;">
                </div>
            </div>
        </div>
    </div>
@endforeach

@endsection
