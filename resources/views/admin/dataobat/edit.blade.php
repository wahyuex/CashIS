@extends('layouts.app')

@section('content')
    <div class="container-sm mt-5">
        <form action="{{ route('dataobat.update', $listobat->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row justify-content-center">
                <div class="p-5 bg-light rounded-3 border col-xl-6">
                    <div class="mb-3 text-center">
                        <i class="bi-person-circle fs-1"></i>
                        <h4>Edit Obat</h4>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="code" class="form-label">Kode Obat</label>
                            <input class="form-control @error('code') is-invalid @enderror" type="text" name="code" id="code" value="{{ $errors->any() ? old('code') : $listobat->code }}" placeholder="Enter Kode Obat">
                            @error('firstName')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="satuan" class="form-label">satuan</label>
                            <select name="satuan" id="satuan" class="form-select">
                                @foreach ($satuans as $satuan)
                                    <option value="{{ $satuan->id }}"
                                        {{ old('satuan', $listobat->satuan_id) == $satuan->id ? 'selected' : '' }}>
                                        {{ $satuan->name_satuan }}</option>
                                @endforeach
                            </select>
                            @error('position')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ $errors->any() ? old('name') : $listobat->name }}" placeholder="Enter Harga Jual">
                            @error('name')
                                <div class="text-danger"><small>{{ $message }}</small></div>

                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="harga" class="form-label">Nama</label>
                            <input class="form-control @error('harga') is-invalid @enderror" type="number" name="harga" id="harga" value="{{ $errors->any() ? old('harga') : $listobat->harga }}" placeholder="Enter Harga Jual">
                            @error('harga')
                                <div class="text-danger"><small>{{ $message }}</small></div>

                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="stock" class="form-label">Nama</label>
                            <input class="form-control @error('stock') is-invalid @enderror" type="text" name="stock" id="stock" value="{{ $errors->any() ? old('stock') : $listobat->stock }}" placeholder="Enter Harga Jual">
                            @error('stock')
                                <div class="text-danger"><small>{{ $message }}</small></div>

                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="kategori" class="form-label">Nama</label>
                            <input class="form-control @error('kategori') is-invalid @enderror" type="text" name="kategori" id="kategori" value="{{ $errors->any() ? old('kategori') : $listobat->kategori }}" placeholder="Enter Harga Jual">
                            @error('kategori')
                                <div class="text-danger"><small>{{ $message }}</small></div>

                            @enderror
                        </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 d-grid">
                            <a href="#" class="btn btn-outline-dark btn-lg mt-3"><i
                                    class="bi-arrow-left-circle me-2"></i> Cancel</a>
                        </div>
                        <div class="col-md-6 d-grid">
                            <button type="submit" class="btn btn-dark btn-lg mt-3"><i class="bi-check-circle me-2"></i>
                                Edit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
