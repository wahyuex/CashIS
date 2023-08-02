@extends('layoutsadmin.app')

@section('content')
    <div class="container-sm my-5 ">
        <form action="{{ route('dataobat.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-center ">
                <div class="p-5 bg-light rounded-3 border col-xl-9 ">
                    <hr>
                    <div class="row ">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Nama Obat</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                                id="name" value="{{ old('name') }}" placeholder="Enter Name">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="code" class="form-label">Kode Obat</label>
                            <input class="form-control @error('code') is-invalid @enderror" type="text" name="code"
                                id="code" value="{{ old('code') }}" placeholder="Enter Code">
                            @error('code')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input class="form-control @error('harga') is-invalid @enderror" type="number"
                                name="harga" id="harga" value="{{ old('harga') }}" placeholder="Enter Harga">
                            @error('harga')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <input class="form-control @error('kategori') is-invalid @enderror" type="text"
                                name="kategori" id="kategori" value="{{ old('kategori') }}" placeholder="Enter password">
                            @error('kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="stock" class="form-label">stock</label>
                            <input class="form-control @error('stock') is-invalid @enderror" type="hidden" value="0"
                                name="stock" id="stock" value="{{ old('stock') }}" placeholder="Enter password">
                            @error('stock')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="satuan_id" class="form-label">Satuan</label>
                            <select name="satuan_id" id="satuan_id" class="form-select">
                                @foreach ($satuan as $role)
                                    <option value="{{ $role->id }}" {{ old('satuan_id') == $role->id ? 'selected' : '' }}>
                                        {{ $role->name_satuan }}</option>
                                @endforeach
                            </select>
                            @error('role')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-md-6 d-grid">
                            <a href="{{ route('dataobat.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i
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
