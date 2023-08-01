@extends('layoutsadmin.app')

@section('content')
    <div class="container-sm my-5 edit">
        <form action="{{ route('pengguna.update', ['pengguna' => $users->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row justify-content-center">
                <div class="p-5 bg-light rounded-3 col-xl-6 grad">
                    <div class="mb-3 text-center">
                        <img src="{{ Vite::asset('images/main.png') }}" alt="image" width=20%>
                        <h4>Edit Barang</h4>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Kode Barang</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text"
                                name="name" id="name"
                                value="{{ $errors->any() ? old('name') : $users->name }}"
                                placeholder="Enter Kode Barang">
                            @error('name')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Nama Barang</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="text"
                                name="email" id="email"
                                value="{{$errors->any() ? old('email') : $users->email }}"
                                placeholder="Enter Nama Barang">
                            @error('email')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label">Harga Barang</label>
                            <input class="form-control @error('password') is-invalid @enderror" type="text"
                                name="password" id="password"
                                value="{{$errors->any() ? old('password') : $users->password }}"
                                placeholder="Enter Harga Barang">
                            @error('password')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="satuan" class="form-label">satuan</label>
                            <select name="role" id="role" class="form-select">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}"
                                        {{ old('role', $users->role_id) == $role->id ? 'selected' : '' }}>
                                        {{ $role->nama_role }}</option>
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
                            <a href="{{ route('pengguna.index') }}" class="btn btn-outline-dark btn-cancel btn-lg mt-3">
                                <i class="bi-arrow-left-circle me-2"></i> Cancel</a>
                        </div>
                        <div class="col-md-6 d-grid">
                            <button type="submit" class="btn btn-light btn-lg mt-3"><i class="bi-check-circle me-2"></i>
                                Edit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
