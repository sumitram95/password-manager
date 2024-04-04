@extends('layouts.main')
@push('extra_css')
    <style>
        .form-control:focus {
            color: #6f6e6e;
            background-color: #fff;
            outline: 0;
            box-shadow: none;
            border-color: rgb(110, 64, 247);
        }

        option,
        select {
            padding: 10px;
            font-size: 16px;
        }
    </style>
@endpush
@section('content')
    {{-- sweet alert message --}}
    @if (session()->has('success'))
        @include('layouts.partials.sweet-alert-success')
    @endif
    @if (session()->has('error'))
        @include('layouts.partials.sweet-alert-error')
    @endif
    {{-- sweet alert mesage closed --}}
    <div class="page-header">
        <h1 class="page-title">Edit</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('show.user.lists') }}">User lists</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </div>
    </div>
    <!-- CONTAINER OPEN -->
    <div class="row">
        <div class="d-flex h-100 d-flex align-items-center justify-content-right m-2 p-0">
            <a href="{{ route('create.new.user') }}" class="btn btn-primary">Create New User</a>
        </div>
        <div class="card">
            <div class="card-header h-100 d-flex align-items-center justify-content-center">
                <h3 class="card-title">Edit User Data</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('user.edit', ['user_id' => $user->id]) }}" method="POST" class="needs-validation"
                    novalidate="">
                    @method('PUT')
                    @csrf
                    <div class="row">

                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">First Name <span class="text-red">*</span></label>
                                <input type="text" class="form-control" placeholder="First name" name="f_name"
                                    value="{{ old('f_name') ?? ($user->userInfo->f_name ?? '') }}" required>
                                @error('f_name')
                                    <span class="text-danlger">{{ $message }}</span>
                                @enderror
                                <div class="invalid-feedback m-0 p-0">
                                    Please fill first name.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Last Name <span class="text-red">*</span></label>
                                <input type="text" class="form-control" placeholder="Last name" name="l_name"
                                    value="{{ old('l_name') ?? ($user->userInfo->l_name ?? '') }}" required>
                                @error('l_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="invalid-feedback m-0 p-0">
                                    Please fill last name.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Email address <span class="text-red">*</span></label>
                                <input type="email" class="form-control" placeholder="Email" autocomplete="username"
                                    name="email" value="{{ old('email') ?? ($user->email ?? '') }}" required
                                    >
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="invalid-feedback m-0 p-0">
                                    Please fill valid eamil.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" placeholder="Password" name="password">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="invalid-feedback m-0 p-0">
                                    Please fill password.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Comfirm Password</label>
                                <input type="password" class="form-control" placeholder="Comfirm Password" name="cpassword">
                                @error('cpassword')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="invalid-feedback m-0 p-0">
                                    Please fill confirm password.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Role <span class="text-red">*</span></label>
                                <select class="form-control" name="role" id="" required>
                                    <option value="">Choose role</option>
                                    @foreach ($roles as $role)
                                        @if ($user->getRoleNames()->first() === $role->name)
                                            @php
                                                $selected = 'selected';
                                            @endphp
                                        @else
                                            @php
                                                $selected = '';
                                            @endphp
                                        @endif
                                        @if ($role->name === 'Admin' || $role->name === 'User')
                                            <option {{ $selected ?? '' }} value="{{ $role->id }}">{{ $role->name }}
                                            </option>
                                        @endif
                                    @endforeach

                                </select>

                                @error('role')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="invalid-feedback m-0 p-0">
                                    Please fill role.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Status<span class="text-red">*</span></label>
                                <select class="form-control" name="status" id="" required>
                                    <option value="">Choose Status</option>
                                    <option value="active" {{ $user->status == 'active' ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="inactive"{{ $user->status == 'inactive' ? 'selected' : '' }}>Inactive
                                    </option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="invalid-feedback m-0 p-0">
                                    Please fill status.
                                </div>
                            </div>
                        </div>
                        <div class="form-footer mt-2 h-100 d-flex align-items-center justify-content-center">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- CONTAINER CLOSED -->
@endsection
@include('layouts.scripts.sweet-alert')
@push('extra_scripts')
    <script>
        // user cannot update of email
        var elements = document.querySelectorAll('#remove_emial_input');

        // Loop through the elements and remove each one
        elements.forEach(function(element) {
            element.parentNode.removeChild(element);
        });
    </script>
    @include('layouts.scripts.select')
    @include('layouts.scripts.form-valivation')
@endpush
