<!--
=========================================================
* Material Dashboard 2 - v3.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img') }}/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('img') }}/logo.png">
    <title>
        Barber Dashboard
    </title>
    <!-- Fonts and icons -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('css') }}/nucleo-icons.css" rel="stylesheet" />
    <link href="{{ asset('css') }}/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/623f5e8dbe.js" crossorigin="anonymous"></script>

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('css') }}/material-dashboard.css" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-200">

    <!-- SideNavbar -->
    <aside
        class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="{{ route('dashboard.index') }}">
                <img src="{{ asset('img') }}/logo.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold text-white">Barber Dashboard</span>
            </a>
        </div>
        <hr class="horizontal light mt-0 mb-2">


        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                {{-- sidenav item for admin  --}}
                @if(auth()->user()->status == "admin")
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->is('dashboard/user*') ? 'active bg-gradient-warning' : '' }}"
                            href="{{ route('dashboard.users') }}">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-users"></i>
                            </div>
                            <span class="nav-link-text ms-1">Users</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->is('dashboard/barber*') ? 'active bg-gradient-warning' : '' }}"
                            href="{{ route('dashboard.barber') }}">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-circle-user"></i>
                            </div>
                            <span class="nav-link-text ms-1">Barber</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->is('dashboard/queue*') ? 'active bg-gradient-warning' : '' }}"
                            href="{{ route('dashboard.queue') }}">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-bars"></i>
                            </div>
                            <span class="nav-link-text ms-1">Queue</span>
                        </a>
                    </li>
                {{-- sidenav item for barber --}}
                @elseif(auth()->user()->status == "barber")
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->is('dashboard/queue*') ? 'active bg-gradient-warning' : '' }}"
                            href="{{ route('dashboard.queue') }}">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-bars"></i>
                            </div>
                            <span class="nav-link-text ms-1">Queue</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->is('dashboard/calendar*') ? 'active bg-gradient-warning' : '' }}"
                            href="{{ route('calendar') }}">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-bars"></i>
                            </div>
                            <span class="nav-link-text ms-1">Calendar</span>
                        </a>
                    </li>
                @endif

            </ul>
        </div>



    </aside>
    <!-- End SideNav -->

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            data-scroll="true">
            <div class="container-fluid py-1 px-3">
                {{-- <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="#">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Users</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Users</h6>
        </nav> --}}



                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <ul class="navbar-nav ms-md-auto pe-md-3 justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <a href="#" class="nav-link text-body font-weight-bold px-0">
                                <i class="fa fa-user me-sm-1"></i>
                                <span class="d-sm-inline d-none">{{ Auth::user()->username }}</span>
                            </a>
                        </li>

                        <li class="nav-item px-2 d-flex align-items-center">
                            <a href="#" class="nav-link text-body p-0">
                                <i class="fa fa-cog fixed-plugin-button-nav"></i>
                            </a>
                        </li>
                        <li class="nav-item px-2 d-flex align-items-center">
                            <a href="#" class="nav-link text-body p-0">
                                <i class="fa fa-bell"></i>
                            </a>
                        </li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <div class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                this.closest('form').submit(); "
                                    role="button">
                                    <i class="fas fa-sign-out-alt"></i>

                                    {{ __('Log Out') }}
                                </a>
                            </div>
                        </form>
                    </ul>


                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-4">



            @yield('content')



            <footer class="footer py-4  ">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">

                        </div>
                    </div>
            </footer>
        </div>
    </main>



    <!-- Core js -->
    <script src="{{ asset('js') }}/core/popper.min.js"></script>
    <script src="{{ asset('js') }}/core/bootstrap.min.js"></script>

    <!-- Plugin js -->
    <script src="{{ asset('js') }}/core/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('js') }}/core/smooth-scrollbar.min.js"></script>



    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('js') }}/material-dashboard.min.js?v=3.0.4"></script>
</body>

</html>
