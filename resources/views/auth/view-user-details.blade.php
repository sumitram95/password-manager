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
        <div class="d-flex h-100 d-flex align-items-center justify-content-right m-2 p-0">
            <a href="{{ route('create.new.user') }}" class="btn btn-primary">Create New User</a>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Details of User</h3>
            </div>
            <div class="card-body">
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="fs-6">
                        <tr class="mb-2">
                            <td class="text-bold">Name : </td>
                            <td class="fw-bolder"> {{ $user->userInfo->f_name . $user->userInfo->l_name }}</td>
                        </tr>
                        <tr class="mb-2">
                            <td class="text-bold">Email : </td>
                            <td class="fw-bolder"> {{ $user->email }}</td>
                        </tr>
                        <tr class="mb-2">
                            <td class="text-bold">Email : </td>
                            <td class="fw-bolder"> {{ $user->email }}</td>
                        </tr>
                        <tr class="mb-5">
                            <td class="text-bold">Role : </td>
                            <td>
                                <div class="badge bg-warning">{{ $user->getRoleNames()->first() }}</div>
                            </td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td>
                                <a href="{{route('show.user.lists')}}" class="btn btn-primary mt-5">Go Back</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- CONTAINER CLOSED -->
@endsection
