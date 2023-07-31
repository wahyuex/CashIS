@extends('layouts.app')

@section('content')
    <div class="container-sm mt-5">
        {{-- <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') --}}
            <div class="row justify-content-center">
                <div class="p-5 bg-light rounded-3 border col-xl-6">

                    {{-- @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show">
                               {{ $error }}
                               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endforeach
                    @endif --}}
                    <div class="mb-3 text-center">
                        <i class="bi-person-circle fs-1"></i>
                        <h4>Edit Obat</h4>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="kodeBarang" class="form-label">Kode Barang</label>
                            <input class="form-control @error('kodeBarang') is-invalid @enderror" type="text" name="kodeBarang" id="kodeBarang" value="{{ $errors->any() ? old('kodeBarang') : $listobat->kodeBarang }}" placeholder="Enter Kode Barang">
                            @error('firstName')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="listobat" class="form-label">Nama Barang</label>
                            <select name="listobat" id="listobat" class="form-select">
                                @foreach ($listobats as $listobat)
                                    <option value="{{ $listobat->id }}"
                                        {{ $listobat->listobat->id == $listobat->id ? 'selected' : '' }}>
                                        {{ $listobat->code . ' - ' . $listobat->name }}</option>
                                @endforeach
                            </select>
                            @error('listobat')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="hargaJual" class="form-label">Harga Jual</label>
                            <input class="form-control @error('hargaJual') is-invalid @enderror" type="text" name="hargaJual" id="hargaJual" value="{{ $errors->any() ? old('hargaJual') : $listobat->hargaJual }}" placeholder="Enter Harga Jual">
                            @error('hargaJual')
                                <div class="text-danger"><small>{{ $message }}</small></div>

                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="satuan" class="form-label">Satuan</label>
                            <select name="satuan" id="satuan" class="form-select">
                                @foreach ($satuans as $satuans)
                                    <option value="{{ $satuans->id }}"
                                        {{ $listobat->satuan->id == $satuan->id ? 'selected' : '' }}>
                                        {{ $satuan->code . ' - ' . $satuan->name }}</option>
                                @endforeach
                            </select>
                            @error('satuan')
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
{{-- @section('content')
    <div class="container-sm mt-5">
<form action="{{ route('admin.dataobat.update', ['dataobat' => $dataobat->id]) }}"
 method="POST">
    @csrf
    @method('put')
    <div class="row justify-content-center">
        <div class="p-5 bg-light rounded-3 col-xl-6">
            <div class="mb-3 text-center">
                <i class="bi-person-circle fs-1"></i>
                <h4>Edit list obat</h4>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="kodeBarang" class="form-label">Kode Barang</label>
                    <input class="form-control @error('kodeBarang') is-invalid @enderror" type="text" name="kodeBarang" id="kodeBarang" value="{{ $errors->any() ? old('kodeBarang') : $listobat->kodeBarang }}" placeholder="Enter Kode Barang">
                    @error('firstName')
                        <div class="text-danger"><small>{{ $message }}</small></div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="namaBarang" class="form-label">Nama Barang</label>
                    <input class="form-control @error('namaBarang') is-invalid @enderror" type="text" name="namaBarang" id="namaBarang" value="{{ $errors->any() ? old('namaBarang') : $listobat->namaBarang }}" placeholder="Enter Nama Barang">
                    @error('namaBarang')
                        <div class="text-danger"><small>{{ $message }}</small></div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="hargaJual" class="form-label">Harga Jual</label>
                    <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" id="email" value="{{ $errors->any() ? old('email') : $satuan->email }}" placeholder="Enter Email">
                    @error('email')
                        <div class="text-danger"><small>{{ $message }}</small></div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="satuan" class="form-label">Satuan</label>
                    <input class="form-control @error('age') is-invalid @enderror" type="text" name="age" id="age" value="{{ $errors->any() ? old('age') : $satuan->age }}" placeholder="Enter Age">
                    @error('age')
                        <div class="text-danger"><small>{{ $message }}</small></div>
                    @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label for="position" class="form-label">Position</label>
                    <select name="position" id="position" class="form-select">
                        @php
                            $selected = "";
                            if ($errors->any())
                                $selected = old('position');
                            else
                                $selected = $satuan->position_id;
                        @endphp
                        @foreach ($positions as $position)
                            <option value="{{ $position->id }}" {{ $selected == $position->id ? 'selected' : '' }}>{{ $position->code.' - '.$position->name }}</option>
                        @endforeach
                    </select>
                    @error('position')
                        <div class="text-danger"><small>{{ $message }}</small></div>
                    @enderror
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6 d-grid">
                    <a href="#" class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Cancel</a>
                </div>
                <div class="col-md-6 d-grid">
                    <button type="submit" class="btn btn-dark btn-lg mt-3"><i class="bi-check-circle me-2"></i> Edit</button>
                </div>
            </div>
        </div>
    </div>
</form>
    </div>
@endsection --}}
