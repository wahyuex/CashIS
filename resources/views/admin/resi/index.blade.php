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
                        <a href="{{ route('resi.create') }}" class="btn btn-outline-success">
                            <i class="bi bi-plus-square-fill"></i></i> Create Resi
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
                                <a href="#" data-bs-toggle="modal"
                                    data-bs-target="#fullImageModal{{ $resi->id }}">
                                    <img src="{{ asset('storage/files/' . $resi->encrypted_filename) }}" alt="FotoResi"
                                        style="max-width: 100px;">
                                </a>
                            </td>
                            <td>{{ $resi->diskon }}%</td>
                            <td class="text-center">
                                <div class="d-flex text-center">
                                    <a href="" class="btn btn-outline-light border border-primary btn-sm me-2"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black"
                                            class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path
                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd"
                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg></a>

                                    <div>
                                        <form action="" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-outline-light btn-sm me-2"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="black" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path
                                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                                    <path
                                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                                </svg></button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @foreach ($resis as $resi)
        <div class="modal fade" id="fullImageModal{{ $resi->id }}" tabindex="-1"
            aria-labelledby="fullImageModalLabel{{ $resi->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="fullImageModalLabel{{ $resi->id }}">Full Image -
                            {{ $resi->namapt }}</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ asset('storage/files/' . $resi->encrypted_filename) }}" alt="FotoResi"
                            style="width: 100%; max-width: 800px;">
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
