<!-- resources/views/tambah_stock.blade.php -->
@extends('layoutsadmin.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h4 class="mb-3">Tambah Stok Obat</h4>
                <form action="{{ route('laporanmasuk.store') }}" method="POST">
                    @csrf
                    <div class='mb-2'>
                        {{-- <label> Tambah Stock</label> --}}
                        <div class="control-group">
                            <label for="select-beast">Beast:</label>
                            <select id="select-beast" required class="demo-default"
                                placeholder="Select a person..." name="kode_produk">
                                @foreach ($obat as $satuans)
                                    <option value="{{ $satuans->id }}"
                                        {{ old('code') == $satuans->id ? 'selected' : '' }}>
                                        {{ $satuans->name }}</option>
                                @endforeach
                            </select>
                            {{-- <button type="submit">Submit</button> --}}
                        </div>
                        {{-- <select id="selectProv" class="form-select" name="kode_produk" aria-label="Default select example">
                            
                        </select> --}}
                    </div>
                    {{-- <div class="mb-3">
                    <label for="kode_produk" class="form-label">Kode Produk</label>
                    <input type="text" class="form-control" id="kode_produk" name="kode_produk" required>
                </div> --}}
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
                                <option value="{{ $satuans->id }}"
                                    {{ old('satuan_id') == $satuans->id ? 'selected' : '' }}>
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
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
        integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('#select-beast').selectize({
            create: true,
            sortField: {
                field: 'text',
                direction: 'asc'
            }
        });

        // $(document).ready(function(){

        //     $("#selectProv").select2({
        //         placeholder:'Pilih Obat',
        //         ajax: {
        //             url: "{{ route('tambahstock.index') }}",
        //             processResults: function({data}){
        //                 return {
        //                     results: $.map(data, function(item){
        //                         return {
        //                             id: item.id,
        //                             text: item.name
        //                         }
        //                     })
        //                 }
        //             }
        //         }
        //     }); 

        // });
    </script>
@endpush
