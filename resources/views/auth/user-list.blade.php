@extends('layouts.main')
@section('title', 'User Lists')
@push('extra_css')
    <style>
        #sweetbox,
        #sweetbluer {
            display: none;
        }
    </style>
@endpush
@section('content')
    <div class="row mt-5">
        <div class="d-flex h-100 d-flex align-items-center justify-content-right m-2 p-0">
            <a href="{{ route('create.new.user') }}" class="btn btn-primary">Create New User</a>
        </div>
        <div class="col-12 col-sm-12" style="width: 100%;">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title mb-0">Users List</h3>
                </div>
                <div class="card-body pt-4">
                    <div class="grid-margin">
                        <div class="">
                            <div class="panel panel-primary">
                                <div class="tab-menu-heading border-0 p-0">
                                    <div class="tabs-menu1">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs product-sale">

                                            <li><a href="#allUsers" class="active" data-bs-toggle="tab">All Users</a></li>
                                            <li><a href="#users" data-bs-toggle="tab" class="text-dark">General User</a>
                                            </li>
                                            <li><a href="#admins" data-bs-toggle="tab" class="text-dark">Admin user</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body border-0 pt-0">
                                    <div class="tab-content">
                                        {{-- All User --}}
                                        <div class="tab-pane active" id="allUsers">
                                            <div class="table-responsive">
                                                <table class="table table-bordered text-nowrap mb-0 datatable1"
                                                    style="width: 100%;">
                                                    <thead class="border-top">
                                                        <tr>
                                                            <th class="bg-transparent border-bottom-0" style="width: 5%;">
                                                                Id</th>
                                                            <th class="bg-transparent border-bottom-0">
                                                                Full Name</th>
                                                            <th class="bg-transparent border-bottom-0">
                                                                Email</th>
                                                            <th class="bg-transparent border-bottom-0">
                                                                Role</th>
                                                            <th class="bg-transparent border-bottom-0">
                                                                Status</th>
                                                            <th class="bg-transparent border-bottom-0" style="width: 5%;">
                                                                Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @foreach ($users ?? [] as $user)
                                                            @if ($user->id === Auth::user()->id)
                                                                @php
                                                                    $remove_tr = 'authTr';
                                                                @endphp
                                                            @else
                                                                @php
                                                                    $remove_tr = '';
                                                                @endphp
                                                            @endif
                                                            <tr class="border-bottom" id="{{ $remove_tr ?? '' }}">
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td class="text-center">
                                                                    <div class="mt-0 mt-sm-2 d-block">
                                                                        <h6 class="mb-0 fs-14 fw-semibold text-capitalize">
                                                                            {{ $user->userInfo->f_name . ' ' . $user->userInfo->l_name }}
                                                                        </h6>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    {{ $user->email }}
                                                                </td>

                                                                <td>
                                                                    @if ($user->getRoleNames()->first() === 'Admin')
                                                                        <button class="btn btn-sm btn-green"
                                                                            onclick="permission_changea();"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-original-title="Role">Admin
                                                                        </button>
                                                                    @else
                                                                        <button class="btn btn-sm btn-yellow"
                                                                            onclick="permission_changea();"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-original-title="Role">User
                                                                        </button>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <button
                                                                        class="btn btn-sm btn-{{ $user->status == 'active' ? 'green' : 'warning' }}">{{ $user->status ?? '' }}
                                                                        </a>
                                                                </td>
                                                                <td>
                                                                    <div class="g-2">
                                                                        <a href="{{ route('user.edit', ['user_id' => $user->id]) }}"
                                                                            class="btn text-primary btn-sm"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-original-title="Edit"><span
                                                                                class="fe fe-edit fs-14"></span></a>
                                                                        <a href="{{ route('delete.user.account', ['user_id' => $user->id]) }}"
                                                                            class="btn text-danger btn-sm"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-original-title="Delete"><span
                                                                                class="fe fe-trash-2 fs-14"></span></a>
                                                                        <a href="{{ route('show.user.single.data', ['user_id' => $user->id]) }}"
                                                                            class="btn text-success btn-sm"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-original-title="View"><span
                                                                                class="fe fe-eye fs-14"></span></a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        {{-- General User --}}
                                        <div class="tab-pane" id="users">
                                            <div class="table-responsive">
                                                <table class="table table-bordered text-nowrap mb-0">
                                                    <thead class="border-top">
                                                        <tr>
                                                            <th class="bg-transparent border-bottom-0" style="width: 5%;">
                                                                S.N</th>
                                                            <th class="bg-transparent border-bottom-0">
                                                                Full Name</th>
                                                            <th class="bg-transparent border-bottom-0">
                                                                Email</th>
                                                            <th class="bg-transparent border-bottom-0" style="width: 10%;">
                                                                Role</th>
                                                            <th class="bg-transparent border-bottom-0" style="width: 5%;">
                                                                Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($users ?? [] as $user)
                                                            @if ($user->id === Auth::user()->id)
                                                                @php
                                                                    $remove_tr = 'authTr';
                                                                @endphp
                                                            @else
                                                                @php
                                                                    $remove_tr = '';
                                                                @endphp
                                                            @endif

                                                            @if ($user->getRoleNames()->first() == 'User')
                                                                <tr class="border-bottom" id="{{ $remove_tr }}">
                                                                    <td class="text-center">
                                                                        <div class="mt-0 mt-sm-2 d-block">
                                                                            <h6 class="mb-0 fs-14 fw-semibold">
                                                                                {{ $loop->iteration }}</h6>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex">
                                                                            <div class="ms-3 mt-0 mt-sm-2 d-block">
                                                                                <h6 class="mb-0 fs-14 fw-semibold">
                                                                                    {{ $user->userInfo->f_name . ' ' . $user->userInfo->l_name }}
                                                                                </h6>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex">
                                                                            <div class="mt-0 mt-sm-3 d-block">
                                                                                <h6 class="mb-0 fs-14 fw-semibold">
                                                                                    {{ $user->email }}</h6>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <button class="btn btn-sm btn-yellow"
                                                                            onclick="permission_changea();"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-original-title="Role">
                                                                            User
                                                                        </button>
                                                                    </td>
                                                                    <td>
                                                                        <button
                                                                            class="btn btn-sm btn-{{ $user->status == 'active' ? 'green' : 'warning' }}">{{ $user->status ?? '' }}
                                                                        </button>
                                                                    </td>
                                                                    <td>
                                                                        <div class="g-2">
                                                                            <a href="{{ route('user.edit', ['user_id' => $user->id]) }}"
                                                                                class="btn text-primary btn-sm"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-original-title="Edit"><span
                                                                                    class="fe fe-edit fs-14"></span></a>
                                                                            <a href="{{ route('delete.user.account', ['user_id' => $user->id]) }}"
                                                                                class="btn text-danger btn-sm"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-original-title="Delete"><span
                                                                                    class="fe fe-trash-2 fs-14"></span></a>
                                                                            <a href="{{ route('show.user.single.data', ['user_id' => $user->id]) }}"
                                                                                class="btn text-success btn-sm"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-original-title="View"><span
                                                                                    class="fe fe-eye fs-14"></span></a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        {{-- - admin list - --}}

                                        <div class="tab-pane" id="admins">
                                            <div class="table-responsive">
                                                <table class="table table-bordered text-nowrap mb-0">
                                                    <thead class="border-top">
                                                        <tr>
                                                            <th class="bg-transparent border-bottom-0" style="width: 5%;">
                                                                S.N</th>
                                                            <th class="bg-transparent border-bottom-0">
                                                                Full Name</th>
                                                            <th class="bg-transparent border-bottom-0">
                                                                Email</th>
                                                            <th class="bg-transparent border-bottom-0"
                                                                style="width: 10%;">
                                                                Role</th>
                                                            <th class="bg-transparent border-bottom-0" style="width: 5%;">
                                                                Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($users ?? [] as $user)
                                                            @if ($user->id === Auth::user()->id)
                                                                @php
                                                                    $remove_tr = 'authTr';
                                                                @endphp
                                                            @else
                                                                @php
                                                                    $remove_tr = '';
                                                                @endphp
                                                            @endif
                                                            @if ($user->getRoleNames()->first() === 'Admin')
                                                                <tr class="border-bottom" id="{{ $remove_tr ?? '' }}">
                                                                    <td class="text-center">
                                                                        <div class="mt-0 mt-sm-2 d-block">
                                                                            <h6 class="mb-0 fs-14 fw-semibold">
                                                                                {{ $loop->iteration }}</h6>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex">
                                                                            <div class="ms-3 mt-0 mt-sm-2 d-block">
                                                                                <h6 class="mb-0 fs-14 fw-semibold">
                                                                                    {{ $user->userInfo->f_name . ' ' . $user->userInfo->l_name }}
                                                                                </h6>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex">
                                                                            <div class="mt-0 mt-sm-3 d-block">
                                                                                <h6 class="mb-0 fs-14 fw-semibold">
                                                                                    {{ $user->email }}</h6>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <button class="btn btn-sm btn-green"
                                                                            onclick="permission_changea();"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-original-title="Role">
                                                                            Admin
                                                                        </button>
                                                                    </td>
                                                                    <td>
                                                                        <button
                                                                            class="btn btn-sm btn-{{ $user->status == 'active' ? 'green' : 'warning' }}">{{ $user->status ?? '' }}
                                                                        </button>
                                                                    </td>
                                                                    <td>
                                                                        <div class="g-2">
                                                                            <a href="{{ route('user.edit', ['user_id' => $user->id]) }}"
                                                                                class="btn text-primary btn-sm"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-original-title="Edit"><span
                                                                                    class="fe fe-edit fs-14"></span></a>
                                                                            <a href="{{ route('delete.user.account', ['user_id' => $user->id]) }}"
                                                                                class="btn text-danger btn-sm"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-original-title="Delete"><span
                                                                                    class="fe fe-trash-2 fs-14"></span></a>
                                                                            <a href="{{ route('show.user.single.data', ['user_id' => $user->id]) }}"
                                                                                class="btn text-success btn-sm"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-original-title="View"><span
                                                                                    class="fe fe-eye fs-14"></span></a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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


    {{-- permission model --}}
    <div class="sweet-overlay" id="sweetbluer" tabindex="-1" style="opacity: 1.18;" onclick="fullbody();">
    </div>
    <div class="sweet-alert showSweetAlert visible" id="sweetbox" data-custom-class="" data-has-cancel-button="false"
        data-has-confirm-button="true" data-allow-outside-click="false" data-has-done-function="false"
        data-animation="pop" data-timer="null" style="margin-top: -170px;">
        <div class="sa-icon sa-info" style="display: none;"></div>


        <img src="{{ asset('user_permissioh_img.jpeg') }}" height="80px" width="80px" alt="">

        <p>Can You Change The Permission Of </p>
        <div class="sa-button-container">
            <div class="sa-confirm-container">

                <div class="form-group">
                    <label class="form-label">Role <span class="text-red">*</span></label>
                    <select name="role" id="" required>
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

                    @error('role')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="invalid-feedback m-0 p-0">
                        Please fill role.
                    </div>
                </div>

                <button class="confirm" tabindex="1" onclick="sweetalertoff()">Cancel</button>
                <div class="la-ball-fall">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('extra_scripts')
    <script>
        $(document).ready(function() {
            $('.datatable1').DataTable({
                responsive: true,
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    // lengthMenu: '_MENU_items/page',
                }
            });
        });
        // remove auth list from fronted table not from db
        var elements = document.querySelectorAll('#authTr');

        // Loop through the elements and remove each one
        elements.forEach(function(element) {
            element.parentNode.removeChild(element);
        });
    </script>
    {{-- sweet alert custom --}}
    @include('layouts.scripts.sweet-alert')
@endpush
