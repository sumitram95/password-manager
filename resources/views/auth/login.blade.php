@extends('auth.layout.main')

@section('tittle', 'Login')
@section('content')
    <!-- CONTAINER OPEN -->

    <div class="container">
        {{-- sweet alert message --}}
        @if (session()->has('success'))
            @include('layouts.partials.sweet-alert-success')
        @endif
        @if (session()->has('error'))
            @include('layouts.partials.sweet-alert-error')
        @endif
        {{-- sweet alert message closed --}}

        <div class="wrap-login100 p-12 m-0">

            <div class="mt-0" style="float: left;">

                <img src="{{ asset('login-svg.png') }}" class="header-brand-img m-0" alt="">

            </div>

            <form class="login100-form validate-form col-md-6" style="position: relative;float: right;"
                action="{{ route('login') }}" method="POST">

                @csrf
                <span class="login100-form-title">
                    Login
                </span>
                @if (session()->has('error'))
                    <span class="text text-sm text-danger">
                        {{ session()->get('error') }}
                    </span>
                @endif

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
                        name="email" placeholder="Email">
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
                    <input class="input100 border-start-0 ms-0 form-control" type="password" name="password"
                        placeholder="Password">
                </div>
                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn btn-primary">
                        Login
                    </button>
                </div>
                <div class="container-login100-form-btn">
                    <a href="{{ route('register.index') }}" class="login100-form-btn btn-primary">
                        Register
                    </a>
                </div>
            </form>
        </div>
    </div>
    <!-- CONTAINER CLOSED -->
@endsection
@push('extra_scripts')
    {{-- sweet alert custom --}}
    @include('layouts.scripts.sweet-alert')
@endpush
