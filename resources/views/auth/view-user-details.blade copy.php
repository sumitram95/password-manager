@extends('layouts.main')
@push('extra_css')
    <style>
        option,
        select {
            padding: 10px;
            font-size: 16px;
        }
    </style>
@endpush
@section('content')
    <div class="page-header">
        <h1 class="page-title">User Details</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('show.user.lists') }}">User lists</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Details</li>
            </ol>
        </div>
    </div>
    <!-- CONTAINER OPEN -->
    <div class="row">
        <div class="card">
            <div class="card-header h-100 d-flex align-items-center justify-content-center">
                <h3 class="card-title">Details of User</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('user.edit', ['user_id' => $user->id]) }}" method="POST" class="needs-validation"
                    novalidate="">
                    @csrf
                    <div class="row">

                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control" placeholder="First name" name="f_name"
                                    value="{{ old('f_name') ?? ($user->userInfo->f_name ?? '') }}" required disabled>

                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control" placeholder="Last name" name="l_name"
                                    value="{{ old('l_name') ?? ($user->userInfo->l_name ?? '') }}" required disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Email address</label>
                                <input type="email" class="form-control" placeholder="Email" autocomplete="username"
                                    name="email" value="{{ old('email') ?? ($user->email ?? '') }}" required disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Role</label>
                                <select name="role" id="" required disabled>
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
                                        <option {{ $selected ?? '' }} value="{{ $role->id }}">{{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- CONTAINER CLOSED -->
@endsection
