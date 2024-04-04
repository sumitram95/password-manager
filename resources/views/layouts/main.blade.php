<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sash – Bootstrap 5  Admin & Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('profile.png') }}" />

    <!-- TITLE -->
    <title>@yield('title')</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/dark-style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/transparent-style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/skin-modes.css') }}" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all"
        href="{{ asset('assets/colors/color1.css') }}" />

    @stack('extra_css')
    <style>
        .log {
            color: red;
        }

        .log:hover {
            background: rgb(237, 236, 236);
            /* border: 0.5px solid rgb(110, 64, 247); */
        }
    </style>
</head>

<body class="app sidebar-mini ltr light-mode">

    <!-- GLOBAL-LOADER -->
    <div id="global-loader">
        <img src="{{ asset('assets/images/loader.svg') }}" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOBAL-LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            <!-- app-Header -->
            @include('layouts.partials.header')
            <!-- /app-Header -->

            <!--APP-SIDEBAR-->
            @include('layouts.partials.sidebar')
            <!-- /APP-SIDEBAR-->

            <!--app-content open-->
            <div class="main-content app-content mt-0">
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">


                        <!-- ROW-1 -->
                        @yield('content')
                    </div>
                </div>
            </div>


            <!-- CONTAINER END -->


            <!--app-content close-->

        </div>

        <!-- Sidebar-right -->
        <div class="sidebar sidebar-right sidebar-animate">
            <div class="panel panel-primary card mb-0 shadow-none border-0">
                <div class="tab-menu-heading border-0 d-flex p-3">
                    <div class="card-title mb-0"><i class="fe fe-bell me-2"></i><span
                            class=" pulse"></span>Notifications</div>
                    <div class="card-options ms-auto">
                        <a href="javascript:void(0);" class="sidebar-icon text-end float-end me-3 mb-1"
                            data-bs-toggle="sidebar-right" data-target=".sidebar-right"><i
                                class="fe fe-x text-white"></i></a>
                    </div>
                </div>
                <div class="panel-body tabs-menu-body latest-tasks p-0 border-0">
                    <div class="tabs-menu border-bottom">
                        <!-- Tabs -->
                        <ul class="nav panel-tabs">
                            <li><a href="#side2" data-bs-toggle="tab"><i class="fe fe-message-circle"></i> Chat</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="side1">
                            <div class="tab-pane" id="side2">
                                <div class="list-group list-group-flush">
                                    <div class="pt-3 fw-semibold ps-5">Today</div>
                                    <div class="list-group-item d-flex align-items-center">
                                        <div class="me-2">
                                            <span class="avatar avatar-md brround cover-image"
                                                data-bs-image-src="{{ asset('assets/images/users/2.jpg') }}"></span>
                                        </div>
                                        <div class="">
                                            <a href="chat.html">
                                                <div class="fw-semibold text-dark" data-bs-toggle="modal"
                                                    data-target="#chatmodel">Addie Minstra</div>
                                                <p class="mb-0 fs-12 text-muted"> Hey! there I' am available.... </p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="list-group-item d-flex align-items-center">
                                        <div class="me-2">
                                            <span class="avatar avatar-md brround cover-image"
                                                data-bs-image-src="{{ asset('assets/images/users/11.jpg') }}"><span
                                                    class="avatar-status bg-success"></span></span>
                                        </div>
                                        <div class="">
                                            <a href="chat.html">
                                                <div class="fw-semibold text-dark" data-bs-toggle="modal"
                                                    data-target="#chatmodel">Rose Bush</div>
                                                <p class="mb-0 fs-12 text-muted"> Okay...I will be waiting for you</p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="pt-3 fw-semibold ps-5">Yesterday</div>
                                    <div class="list-group-item d-flex align-items-center">
                                        <div class="me-2">
                                            <span class="avatar avatar-md brround cover-image"
                                                data-bs-image-src="{{ asset('assets/images/users/4.jpg') }}"><span
                                                    class="avatar-status bg-success"></span></span>
                                        </div>
                                        <div class="">
                                            <a href="chat.html">
                                                <div class="fw-semibold text-dark" data-bs-toggle="modal"
                                                    data-target="#chatmodel">Cherry Blossom</div>
                                                <p class="mb-0 fs-12 text-muted">cherryblossom@gmail.com</p>
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
        <!--/Sidebar-right-->

        <!-- FOOTER -->

        {{-- @include('layouts.partials.footer') --}}
        @stack('footer')

        <!-- FOOTER END -->

    </div>

    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!-- JQUERY JS -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- SIDE-MENU JS -->
    <script src="{{ asset('assets/plugins/sidemenu/sidemenu.js') }}"></script>

    <!-- TypeHead js -->
    <script src="{{ asset('assets/plugins/bootstrap5-typehead/autocomplete.js') }}"></script>
    <script src="{{ asset('assets/js/typehead.js') }}"></script>

    <!-- INTERNAL Data tables js-->
    <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>


    <!-- SIDEBAR JS -->
    <script src="{{ asset('assets/plugins/sidebar/sidebar.js') }}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{ asset('assets/plugins/p-scroll/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/plugins/p-scroll/pscroll.js') }}"></script>
    <script src="{{ asset('assets/plugins/p-scroll/pscroll-1.js') }}"></script>
    <script src="{{ asset('assets/plugins/p-scroll/pscroll-2.js') }}"></script>

    <!-- Color Theme js -->
    <script src="{{ asset('assets/js/themeColors.js') }}"></script>

    <!-- Sticky js -->
    <script src="{{ asset('assets/js/sticky.js') }}"></script>

    <!-- CUSTOM JS -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>


    @stack('extra_scripts')



</body>

</html>
