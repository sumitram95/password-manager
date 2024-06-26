@auth
    <div class="app-header header sticky">
        <div class="container-fluid main-container">
            <div class="d-flex">
                <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar" href="javascript:void(0)"></a>
                <!-- sidebar-toggle-->
                <a class="logo-horizontal" href="index.html">
                    <img src="{{ asset('assets/images/brand/logo.png') }}" class="header-brand-img desktop-logo"
                        alt="logo">
                    <img src="{{ asset('assets/images/brand/logo-3.png') }}" class="header-brand-img light-logo1"
                        alt="logo">
                </a>
                <!-- LOGO -->
                <div class="main-header-center ms-3 d-none d-lg-block">
                    <input type="text" class="form-control" id="typehead" placeholder="Search for results...">
                    <button class="btn px-0 pt-2"><i class="fe fe-search" aria-hidden="true"></i></button>
                </div>
                <div class="d-flex order-lg-2 ms-auto header-right-icons">
                    <!-- SEARCH -->
                    <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button"
                        data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4" {{-- data-bs-toggle="collapse" data-bs-target="ram" --}}
                        aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon fe fe-more-vertical"></span>
                    </button>
                    <div class="navbar navbar-collapse responsive-navbar p-0">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                            <div class="d-flex order-lg-2">
                                <div class="dropdown d-lg-none d-flex">
                                    <a href="javascript:void(0)" class="nav-link icon" data-bs-toggle="dropdown">
                                        <i class="fe fe-search"></i>
                                    </a>
                                    <div class="dropdown-menu header-search dropdown-menu-start">
                                        <div class="input-group w-100 p-2">
                                            <input type="text" class="form-control" placeholder="Search....">
                                            <div class="input-group-text btn btn-primary">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                {{-- <div class="dropdown  d-flex notifications">
                                    <a class="nav-link icon" data-bs-toggle="dropdown"><i class="fe fe-bell"></i><span
                                            class=" pulse"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <div class="drop-heading border-bottom">
                                            <div class="d-flex">
                                                <h6 class="mt-1 mb-0 fs-16 fw-semibold text-dark">Notifications
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="notifications-menu" style="height: fit-content;">
                                            <a class="dropdown-item d-flex" href="notify-list.html">
                                                <div class="me-2 notifyimg  bg-primary brround box-shadow-primary">
                                                    <img src="{{ asset('web-icon.png') }}" alt="">
                                                </div>
                                                <div class="mt-1 wd-80p">
                                                    <h5 class="notification-label mb-1">New Application received
                                                    </h5>
                                                    <span class="notification-subtext">3 days ago</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="dropdown-divider m-0"></div>
                                        <a href="notify-list.html" class="dropdown-item text-center p-3 text-muted">View all
                                            Notification</a>
                                    </div>
                                </div> --}}

                                <!-- SIDE-MENU -->
                                <div class="dropdown d-flex profile-1">
                                    <a data-bs-toggle="dropdown" class="nav-link leading-none d-flex">
                                        <img src="{{ asset('avatar.jpg') }}" alt="profile-user"
                                            class="avatar profile-user brround cover-image">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <div class="drop-heading">
                                            <div class="text-center">
                                                <img src="{{ asset('avatar.jpg') }}" alt="profile-user"
                                                    class="avatar profile-user brround cover-image">
                                                <h5 class="text-dark mb-0 fs-14 fw-semibold">{{ $name->f_name ?? 'Note' }}
                                                    {{ $name->l_name ?? 'Note' }}</h5>
                                                @if (Auth::user()->getRoleNames()->first() === 'Admin')
                                                    <small class="text-muted">Super Admin</small>
                                                @else
                                                    <small class="text-muted">User</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="dropdown-divider m-0"></div>
                                        <a class="dropdown-item log" href="{{ url('logout') }}">
                                            <i class="dropdown-icon fe fe-alert-circle"></i> Log Out
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endauth
