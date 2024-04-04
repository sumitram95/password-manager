@auth
    <div class="sticky">
        <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
        <div class="app-sidebar">
            <div class="side-header">
                <a class="header-brand1" href="index.html">
                    <img src="{{ asset('profile.png') }}" alt="" height="60px" width="60px">

                </a>
                <!-- LOGO -->
            </div>
            <div class="main-sidemenu">
                <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                        width="24" height="24" viewBox="0 0 24 24">
                        <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                    </svg></div>
                <ul class="side-menu">
                    <li class="slide">
                        <a href="{{ url('dashboard') }}"
                            class="side-menu__item has-link  @if (Route::is('dashboard.index')) active @endif"
                            data-bs-toggle="slide"><i class="side-menu__icon fa-solid fa-home"></i><span
                                class="side-menu__label" style="font-size: 18px;font-weight:bolder;">Dashboard</span></a>
                    </li>

                    <li class="slide" style="cursor:pointer;">
                        <a href="{{ url('dashboard/password') }}"
                            class="side-menu__item @if (Route::is('dashboard.password')) active @endif"
                            data-bs-toggle="slide"><i class="side-menu__icon fa-solid fa-key"></i><span
                                class="side-menu__label">
                                Password
                                Manager
                            </span>
                        </a>
                    </li>
                    @role('Admin')
                        <li class="slide @if (Request::is('user-lists*')) is-expanded  @endif" style="cursor:pointer;">
                            <a class="side-menu__item" data-bs-toggle="slide"><i class="side-menu__icon fe fe-users"></i><span
                                    class="side-menu__label">
                                    User</span><i class="angle fe fe-chevron-right"></i></a>
                            <ul class="slide-menu">
                                <li><a href="{{ route('show.user.lists') }}" class="slide-item @if (Route::is('show.user.lists')) active @endif">User List</a></li>
                                <li><a href="{{ route('create.user.index') }}" class="slide-item @if (Route::is('create.user.index')) active @endif">Create</a></li>
                            </ul>
                        </li>
                    @endrole
                </ul>
                <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                        width="24" height="24" viewBox="0 0 24 24">
                        <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                    </svg></div>
            </div>
        </div>
        <!--/APP-SIDEBAR-->
    </div>
@endauth
