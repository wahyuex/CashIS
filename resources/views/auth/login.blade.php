@extends('layouts.app')

@section('content')
<div style="background-color: #45B8A7; width: 350px; height: 450px; margin: 0 auto ; border-radius: 5px">
    <div style="padding-top: 80px">
        <div style="justify-content: center; align-items: center; display: flex;">
            <img src="{{ Vite::asset('resources/images/logonew.png') }}" width="125" height="125" fill="blue" class="bi bi-hexagon-fill"
                viewBox="0 0 16 16">

        </div>
    </div>
    <div style="padding-top: 20px; width: 80%; margin: 0 auto">
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group my-2" style="background-color: #FFFFFF">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" style="--bs-bg-opacity: .2;"
                            name="email" value="{{ old('email') }}" placeholder="Enter Your Email" required
                            autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group" style="background-color: #FFFFFF">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" style="--bs-bg-opacity: .2 ;" name="password"
                            placeholder="Enter Your Password" autocomplete="current-password" >
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <br>
                    <div style="padding-top: 30px; width: 80%; margin: 0 auto">
                    <div class="row mb-0">
                        <div class="col-md-12 d-flex justify-content-center align-items-center">

                            <button type="submit" class="btn btn-success col-md-12 py-2">
                                <i class="bi bi-box-arrow-in-right" style="font-size: 1.5em;"></i>
                                <span style="font-size: 1.2em; padding-left: 8px">{{ __('Log In') }}</span>
                              </button>

                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>
@endsection
