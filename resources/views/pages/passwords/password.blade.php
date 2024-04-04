@extends('dashboard-layout')
@section('abc')
    <div class="content">
        <strong>Passwords</strong><button type="button" class="btn btn-primary" style="margin-left: 150px"
            data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add
        </button><br>
        <span>Create, save, and manage your passwords so you can easily sign in to sites and apps.</span><br><br>
        <div class="center">
            @forelse ($urls as $url)
                <div class="url_a">
                    <a href="{{ url('url-password-show') }}/{{$url->id}}"> <img src="{{asset('web-icon.png')}}" alt="" width="25px" height="25px">
                        {{ $url->urls }}</a>
                </div>
            @empty
                Not Any Urls Password Saved yet ?
                <span type="button" data-bs-toggle="modal"
                    data-bs-target="#exampleModal" style="color:blue;">
                    Add
                </span>
            @endforelse
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="0" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Save Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('password') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input class="form-control" type="url" placeholder="Url or Site Name" name="urls"
                            aria-label="Search">
                        @error('urls')
                            <span class="text text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                        <input class="form-control" type="text" placeholder="Username" name="username"
                            aria-label="Search">
                        @error('username')
                            <span class="text text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                        <input class="form-control" type="password" placeholder="Password" name="password"
                            aria-label="Search">
                        @error('password')
                            <span class="text text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                        <input class="form-control" type="text" placeholder="Note" name="notes" aria-label="Search">
                        @error('notes')
                            <span class="text text-danger">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn"
                            style="background-color: rgb(31, 78, 121);color:white;">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@if (session()->has('success'))
    <script>
        alert("{{ session()->get('success') }}");
    </script>
@endif
