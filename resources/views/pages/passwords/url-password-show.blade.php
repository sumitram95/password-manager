@extends('layouts.main')
@section('title', 'Url Password Show')
@section('content')
    <div class="container">
        <div class="card mt-5 p-5">
            <div class="content">
                <a href=""> <img src="{{ asset('web-icon.png') }}" alt="" width="25px" height="25px">
                    {{ $urls->urls ?? '' }}</a><br><br>
                <div class="center" style="width: 800px;height:300px;padding:10px;">
                    <br><br>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="username">Username</label>
                            <input type="text" class="form-control form-control-sm" value="{{ $urls->username ?? '' }}"
                                id="username" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="sites">Sites</label>
                            <a href="{{ $urls->urls ?? '' }}" class="form-control form-control-sm border-0"
                                id="sites">{{ $urls->urls ?? '' }}</a>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="password">password</label>
                            <input type="password" class="form-control form-control-sm " id="password"
                                value="{{ $urls->password ?? '' }}" id="password" disabled>
                            {{-- <input type="password" class="form-control form-control-sm " id="password"
                                    value=" " id="password" placeholder="*********" disabled> --}}

                            <i class="fa-solid fa-eye-slash" id="show"
                                style="position: relative;top:-20px;right:6px;float:right;"></i>
                        </div>
                        <div class="col-md-6">
                            <label for="notes">Notes</label>
                            <input type="text" class="form-control form-control-sm" value="{{ $urls->notes ?? '' }}"
                                id="notes" disabled>
                        </div>
                    </div>
                    @if (
                        $urls->user_id === auth()->user()->id ||
                            auth()->user()->getRoleNames()->first() === 'Admin')
                        <button href="{{ route('url.update', ['url_id' => $urls->id]) }}" class="btn btn-primary"
                            data-bs-toggle="modal" data-bs-target="#url_create">Edit</button>
                        <a href="{{ route('url.id.delete', ['url_id' => $urls->id]) }}"
                            class="btn btn-danger m-2">Delete</a>
                    @endif

                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->

    <div class="modal fade" id="url_create" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="h-100 d-flex align-items-center justify-content-left m-2 p-0">
                        <h5 class="modal-title float-right">Update Url</h5>
                    </div>

                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('url.update', ['url_id' => $urls->id]) }}" method="POST"
                        class="needs-validation" novalidate="">
                        @csrf
                        @method('Put')
                        <label for="url">Url or site name</label>
                        <input class="form-control mb-2" type="text" placeholder="Url or Site Name" name="url"
                            aria-label="Search" id="url" value="{{ old('url') ?? ($urls->urls ?? '') }}"
                            id="url" required>
                        @error('url')
                            <span class="text text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                        <label for="user">Account Name Or Username</label>
                        <input class="form-control mb-2" type="text" placeholder="Username" name="username"
                            aria-label="Search" value="{{ old('username') ?? ($urls->username ?? '') }}" id="user"
                            required>
                        @error('username')
                            <span class="text text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                        <label for="pass">Account Password</label>
                        <input class="form-control mb-2" type="text" placeholder="Password" name="password"
                            aria-label="Search" value="{{ decrypt($urls->password ?? '') }}" id="pass" required>
                        @error('password')
                            <span class="text text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                        <label for="cpassword">Comfirm Account Password</label>
                        <input class="form-control mb-2" type="text" placeholder="Password" name="cpassword"
                            aria-label="Search" value="{{ decrypt($urls->password ?? '') }}" id="cpassword" required>
                        @error('cpassword')
                            <span class="text text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                        <label for="cpassword">Visibility Of Website</label>
                        <select class="form-control mb-2" name="role" id="" required>
                            <option value="">Choose Visibility</option>
                            @foreach ($roles as $role)
                                @if ($role->name == 'Public' || $role->name == 'Private')
                                    <option value="{{ $role->id }}"
                                        {{ $urls->visibility == $role->name ? 'selected' : '' }}>{{ $role->name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        @error('role')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <textarea class="form-control mb-2" type="text" placeholder="Write about your url" rows="5" name="notes"
                            aria-label="Search" value="{{ old('notes') }}" required></textarea>
                        @error('notes')
                            <span class="text text-danger">
                                {{ $message }}
                            </span>
                        @enderror

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update Url</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {

        var x = document.getElementById('password')

        var y = document.getElementById('show');

        y.addEventListener("click", function() {
            if (x.type === "password") {
                var z = x.type = "text";
                if (z) {
                    y.setAttribute("class", "fa-solid fa-eye");
                    x.setAttribute("value", "{{ decrypt($urls->password ?? '') }}")
                }
            }
        });
    });
</script>
