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

        .card-header:hover {
            background: rgb(245, 245, 245);
            /* border: 1px solid rgb(110, 64, 247); */
            box-shadow: 1px 1px 15px gray;
        }
    </style>
@endpush
@section('title', 'Dashboard')
@section('content')
    {{-- Breadcrumb --}}
    <div class="page-header">
        <h1 class="page-title">Password Manager
        </h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li> /
                <li class="breadcrumb-item active" aria-current="page"> WebSite Lists</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="d-flex h-100 d-flex align-items-center justify-content-right m-2 p-0">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#url_create">Add Website/Service</button>
        </div>
        <div class="col-12 col-sm-12">
            <div class="card">
                @forelse ($urls as $url)
                    <div class="card-header" style="cursor: pointer;">
                        <a href="{{ route('url.password.show', ['url_id' => $url->id]) }}" class="card-title mb-0"
                            style="width: 100%;"><i class="fa-solid fa-globe"></i>
                            {{ $url->urls }} <div style="float: right;">
                                <span style="color: gray;font-size:15px;margin-right:40px;"> Added By
                                    @if (auth()->user()->id === $url->userInfoes->user_id)
                                        You
                                    @else
                                        {{ $url->userInfoes->f_name ?? '' }} {{ $url->userInfoes->l_name ?? '' }}
                                    @endif

                                </span><i class="fe fe-eye"></i>
                            </div>
                        </a>

                    </div>
                @empty
                    <div class="card-header" style="cursor: pointer;">
                        <a href="{{ url('/') }}" class="card-title mb-0" style="width: 100%;">
                            Not Any Url Saved Yet </a>

                    </div>
                @endforelse
            </div>
        </div>
    </div>

    {{-- sweet alert message --}}
    @if (session()->has('success'))
        @include('layouts.partials.sweet-alert-success')
    @endif
    @if (session()->has('error'))
        @include('layouts.partials.sweet-alert-error')
    @endif
    {{-- sweet alert message closed --}}

    <!-- Modal -->
    <div class="modal fade" id="url_create" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="h-100 d-flex align-items-center justify-content-left m-2 p-0">
                        <h5 class="modal-title float-right">Add New URL Or WebSite Link</h5>
                    </div>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('url.password.create') }}" method="POST" class="needs-validation"
                        novalidate="">
                        @csrf
                        <input class="form-control mb-2" type="url" placeholder="e.g. https://www.example.com"
                            name="url" aria-label="Search" id="url" value="{{ old('url') }}" required>
                        @error('url')
                            <span class="text text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                        <input class="form-control mb-2" type="text" placeholder="Account Name or Username"
                            name="username" aria-label="Search" value="{{ old('username') }}" required>
                        @error('username')
                            <span class="text text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                        <select name="role" class="form-control mb-2" id="" required>
                            <option value="">Choose Visibility</option>
                            @foreach ($roles ?? [] as $role)
                                @if ($role->name === 'Public' || $role->name === 'Private')
                                    <option value="{{ $role->id }}">{{ $role->name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        @error('role')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        {{-- <div class="invalid-feedback m-0 p-0">
                            Please fill role.
                        </div> --}}
                        <input class="form-control mb-2" type="password" placeholder="Account Password" name="password"
                            aria-label="Search" required>
                        @error('password')
                            <span class="text text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                        <input class="form-control mb-2" type="password" placeholder="Confirm Account Password"
                            name="cpassword" aria-label="Search" required>
                        @error('cpassword')
                            <span class="text text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                        <textarea class="form-control mb-2" type="text" placeholder="Write about your URL" rows="5" name="notes"
                            aria-label="Search" value="{{ old('notes') }}" required></textarea>
                        @error('notes')
                            <span class="text text-danger">
                                {{ $message }}
                            </span>
                        @enderror

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Url</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@include('layouts.scripts.sweet-alert')
@push('extra_scripts')
    <script>
        setTimeout(() => {
            // const box = document.getElementById('box');
            const a = document.getElementById("sweetbox");
            const b = document.getElementById("sweetbluer");

            // 👇️ removes element from DOM
            a.style.display = 'none';
            b.style.display = 'none';

            // 👇️ hides element (still takes up space on page)
            // box.style.visibility = 'hidden';
        }, 3000); // 👈️ time in milliseconds
    </script>
    @include('layouts.scripts.select')
    @include('layouts.scripts.form-valivation')
@endpush
