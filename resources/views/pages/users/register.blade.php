@extends('auth.layout.main')
@push('extra_css')
    <style>
        .form-control:focus {
            color: #6f6e6e;
            background-color: #fff;
            outline: 0;
            box-shadow: none;
            border-color: rgb(110, 64, 247);
        }
    </style>
@endpush

@section('tittle', 'Register')
@section('content')
    <!-- CONTAINER OPEN -->

    <div class="container">
        <div class="wrap-login100 p-6 m-0">
            <div class="mt-0" style="float: left;">
                <img src="{{ asset('login-svg.png') }}" class="header-brand-img m-0" alt="">
            </div>
            <form class="login100-form validate-form col-md-6" style="position: relative;float: right;"
                action="{{ route('register.post') }}" method="POST" class="needs-validation" novalidate="">
                @csrf
                <span class="login100-form-title">
                    Create New Account
                </span>
                @if (session()->has('error'))
                    <span class="text text-sm text-danger">
                        {{ session()->get('error') }}
                    </span>
                @endif

                @error('f_name')
                    <span class="text text-danger">
                        {{ $message }}
                    </span>
                @enderror

                <div class="wrap-input100 validate-input input-group"
                    data-bs-validate="Valid email is required: ex@abc.xyz">
                    <span class="input-group-text bg-white text-muted">
                        <i class="fe fe-user" aria-hidden="true"></i>
                    </span>
                    <input class="input100 border-start-0 ms-0 form-control" type="text" value="{{ old('f_name') }}"
                        name="f_name" placeholder="First Name" required>
                </div>
                @error('l_name')
                    <span class="text text-danger">
                        {{ $message }}
                    </span>
                @enderror

                <div class="wrap-input100 validate-input input-group"
                    data-bs-validate="Valid email is required: ex@abc.xyz">
                    <span class="input-group-text bg-white text-muted">
                        <i class="fe fe-user" aria-hidden="true"></i>
                    </span>
                    <input class="input100 border-start-0 ms-0 form-control" type="text" value="{{ old('l_name') }}"
                        name="l_name" placeholder="Last Name" required>
                </div>
                @error('email')
                    <span class="text text-danger">
                        {{ $message }}
                    </span>
                @enderror

                <div class="wrap-input100 validate-input input-group"
                    data-bs-validate="Valid email is required: ex@abc.xyz">
                    <span class="input-group-text bg-white text-muted">
                        <i class="zmdi zmdi-email" aria-hidden="true"></i>
                    </span>
                    <input class="input100 border-start-0 ms-0 form-control" type="text" value="{{ old('email') }}"
                        name="email" placeholder="Email" required>
                </div>
                @error('password')
                    <span class="text text-danger">
                        {{ $message }}
                    </span>
                @enderror
                <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                    <span class="input-group-text bg-white text-muted">
                        <i class="zmdi zmdi-eye" aria-hidden="true"></i>
                    </span>
                    <input class="input100 border-start-0 ms-0 p-5 form-control" type="password" name="password"
                        placeholder="Password" required>
                </div>
                @error('password_confirmation')
                    <span class="text text-danger">
                        {{ $message }}
                    </span>
                @enderror
                <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                    <span class="input-group-text bg-white text-muted">
                        <i class="zmdi zmdi-eye" aria-hidden="true"></i>
                    </span>
                    <input class="input100 border-start-0 ms-0 form-control" type="password" name="password_confirmation"
                        placeholder="Confirm Password" required>
                </div>
                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn btn-primary">
                        create
                    </button>
                    <a href="{{ route('login.index') }}">
                        Have already register then ? Login
                    </a>
                </div>

            </form>
        </div>
    </div>

    <!-- CONTAINER CLOSED -->
@endsection
@push('ext_js')
    @include('layouts.scripts.select')
    @include('layouts.scripts.form-valivation')
@endpush
