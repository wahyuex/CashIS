@extends('layouts.app')

@section('content')
    <div class="container-sm my-5">
        <form action="{{ route('resi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-center">
                <div class="p-5 bg-light rounded-3 border col-xl-6">
                    <div class="mb-3 text-center">
                        <i class="bi-person-circle fs-1"></i>
                        <h4>Create Resi</h4>
                    </div>
                    <hr>
                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label for="firstName" class="form-label">Name Perusahaan</label>
                            <input class="form-control @error('firstName') is-invalid @enderror" type="text"
                                name="namapt" id="firstName" value="{{ old('namapt') }}"
                                placeholder="Enter Name Nama Perusahaan">
                            @error('namapt')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName" class="form-label">harga</label>
                            <input class="form-control @error('lastName') is-invalid @enderror" type="number"
                                name="harga" id="lastName" value="{{ old('lastName') }}" placeholder="harga">
                            @error('lastName')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="age" class="form-label">diskon</label>
                            <input class="form-control @error('age') is-invalid @enderror" type="number" name="diskon"
                                id="age" value="{{ old('age') }}" placeholder="Enter diskon">
                            @error('age')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="cv" class="form-label">Foto Resi</label>
                        <input type="file" class="form-control" name="fotoresi" id="cv">
                    </div>


                    <hr>
                    <div class="row">
                        <div class="col-md-6 d-grid">
                            <a href="{{ route('resi.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i
                                    class="bi-arrow-left-circle me-2"></i> Cancel</a>
                        </div>
                        <div class="col-md-6 d-grid">
                            <button type="submit" class="btn btn-dark btn-lg mt-3"><i class="bi-check-circle me-2"></i>
                                Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
