<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from mannatthemes.com/dastone/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Jul 2021 09:02:56 GMT -->

<head>
    <meta charset="utf-8" />
    <title>Dorocabs- Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('theme/assets/images/dora_cabs1.png') }}" height="35"  width="45">

    <!-- App css -->
    <link href="{{ asset('theme/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/metisMenu.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
     <!-- Modal ppopup -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    @stack('css-links')
</head>

<body>
    @guest
    @else
    <!-- Left Sidenav -->
    <div class="left-sidenav">
        <!-- LOGO -->
        <div class="brand">
            <a href="#" class="logo">
                <span>
                    <img src="{{ asset('theme/assets/images/dora_cabs1.png') }}" alt="logo-small" class="safar-logo-sm" height="35"  width="45">
                </span>
                <span>
                <strong>DoraCabs</strong>
                </span>
            </a>
        </div>
        <!--end logo-->
        <div class="menu-content h-100" data-simplebar>
            <ul class="metismenu left-sidenav-menu">
                <li>
                    <a href="{{ route('dashboard') }}"> <i
                            class="fas fa-chart-area"></i><span>Dashboard</span></a>
                </li>
                <li>
                    <a href="{{ route('cars.index') }}"> <i
                            class="fas fa-car "></i><span>Vehicles</span></a>
                </li>
                <li>
                    <a href="{{ route('booked-trips.index') }}"> <i
                            class="far fa-list-alt"></i><span>Bookings</span></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- end left-sidenav-->


    <div class="page-wrapper">
        <!-- Top Bar Start -->

        <div class="topbar">
            <!-- Navbar -->
            <nav class="navbar-custom">
                <ul class="list-unstyled topbar-nav float-end mb-0">
                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-bs-toggle="dropdown"
                            href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <span class="ms-1 nav-user-name hidden-sm">{{ Auth::user()->name }}</span>
                            <img src="{{ asset('theme/assets/images/users/user-5.jpg') }}" alt="profile-user"
                                class="rounded-circle thumb-xs" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#"><i data-feather="user"
                                    class="align-self-center icon-xs icon-dual me-1"></i> Profile</a>
                            <div class="dropdown-divider mb-0"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                    data-feather="power" class="align-self-center icon-xs icon-dual me-1"></i>
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
                <!--end topbar-nav-->

                <ul class="list-unstyled topbar-nav mb-0">
                    <li>
                        <button class="nav-link button-menu-mobile">
                            <i data-feather="menu" class="align-self-center topbar-icon"></i>
                        </button>
                    </li>
                </ul>
            </nav>
            <!-- end navbar-->
        </div>
        <!-- Top Bar End -->
        <!-- Page Content-->
        @yield('content')
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->
    @endguest
    @yield('content-full-bg')
    <!-- jQuery  -->
    <script src="{{ asset('theme/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('theme/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('theme/assets/js/metismenu.min.js') }}"></script>
    <script src="{{ asset('theme/assets/js/waves.js') }}"></script>
    <script src="{{ asset('theme/assets/js/feather.min.js') }}"></script>
    <script src="{{ asset('theme/assets/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('theme/assets/js/moment.js') }}"></script>
    <script src="{{ asset('theme/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('theme/plugins/apex-charts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('theme/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('theme/plugins/jvectormap/jquery-jvectormap-us-aea-en.js') }}"></script>
    <script src="{{ asset('theme/assets/pages/jquery.analytics_dashboard.init.js') }}"></script>
    <!-- App js -->
    <script src="{{ asset('theme/assets/js/app.js') }}"></script>
    @stack('js-links')
    @yield('js-content')
</body>


<!-- Mirrored from mannatthemes.com/dastone/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Jul 2021 09:03:37 GMT -->

</html>