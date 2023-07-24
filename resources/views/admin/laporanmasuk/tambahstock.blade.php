<!-- resources/views/tambah_stock.blade.php -->
@extends('layoutsadmin.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h4 class="mb-3">Tambah Stok Obat</h4>
            <form action="{{ route('laporanmasuk.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="kode_produk" class="form-label">Kode Produk</label>
                    <input type="text" class="form-control" id="kode_produk" name="kode_produk" required>
                </div>
                <div class="mb-3">
                    <label for="jumlah_masuk" class="form-label">Jumlah Masuk</label>
                    <input type="number" class="form-control" id="jumlah_masuk" name="jumlah_masuk" required>
                </div>
                <div class="mb-3">
                    <label for="pemasok" class="form-label">Nama Pemasok</label>
                    <input type="text" class="form-control" id="pemasok" name="pemasok" required>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="satuan_id" class="form-label">Satuan</label>
                    <select name="satuan_id" id="satuan_id" class="form-select">
                        @foreach ($satuan as $satuans)
                            <option value="{{ $satuans->id }}" {{ old('satuan_id') == $satuans->id ? 'selected' : '' }}>
                                {{ $satuans->name_satuan }}</option>
                        @endforeach
                    </select>
                    @error('role')
                        <div class="text-danger"><small>{{ $message }}</small></div>
                    @enderror
                </div>
                {{-- <div class="col-md-12 mb-3">
                    <label for="role_id" class="form-label">Role</label>
                    <select name="role_id" id="role_id" class="form-select">
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                                {{ $role->nama_role }}</option>
                        @endforeach
                    </select>
                    @error('role')
                        <div class="text-danger"><small>{{ $message }}</small></div>
                    @enderror
                </div> --}}
                <button type="submit" class="btn btn-primary">Tambah Stok</button>
            </form>
        </div>
    </div>
</div>
@endsection
