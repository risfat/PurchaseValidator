<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Risfat" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/images/favicon.ico') }}">



    <!-- App css -->
    <link href="{{ asset('admin/css/config/material/bootstrap.min.css') }}" rel="stylesheet" type="text/css"
        id="bs-default-stylesheet" />
    <link href="{{ asset('admin/css/config/material/app.min.css') }}" rel="stylesheet" type="text/css"
        id="app-default-stylesheet" />

    <link href="{{ asset('admin/css/config/material/bootstrap-dark.min.css') }}" rel="stylesheet" type="text/css"
        id="bs-dark-stylesheet" />
    <link href="{{ asset('admin/css/config/material/app-dark.min.css') }}" rel="stylesheet" type="text/css"
        id="app-dark-stylesheet" />

    <!-- icons -->
    <link href="{{ asset('admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- third party css -->
    @stack('styles')

    <!-- Live Wire -->

    @livewireStyles

</head>

@php
$user = Auth::user();
@endphp



<!-- body start -->

<body class="loading"
    data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <div class="navbar-custom">
            <div class="container-fluid">
                <ul class="list-unstyled topnav-menu float-end mb-0">

                    <li class="d-none d-lg-block">
                        <form class="app-search">
                            <div class="app-search-box dropdown">
                                <div class="input-group">
                                    <input type="search" class="form-control" placeholder="Search..." id="top-search">
                                    <button class="btn input-group-text" type="submit">
                                        <i class="fe-search"></i>
                                    </button>
                                </div>
                                <div class="dropdown-menu dropdown-lg" id="search-dropdown">
                                    <!-- item-->
                                    <div class="dropdown-header noti-title">
                                        <h5 class="text-overflow mb-2">Your Search Results</h5>
                                    </div>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fe-home me-1"></i>
                                        <span>Analytics Report</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fe-aperture me-1"></i>
                                        <span>How can I help you?</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fe-settings me-1"></i>
                                        <span>User profile settings</span>
                                    </a>

                                    <!-- item-->
                                    <div class="dropdown-header noti-title">
                                        <h6 class="text-overflow mb-2 text-uppercase">Users</h6>
                                    </div>

                                    <div class="notification-list">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="d-flex align-items-start">
                                                <img class="d-flex me-2 rounded-circle"
                                                    src="{{ asset('admin/images/users/user-2.jpg') }}"
                                                    alt="Generic placeholder image" height="32">
                                                <div class="w-100">
                                                    <h5 class="m-0 font-14">Erwin E. Brown</h5>
                                                    <span class="font-12 mb-0">UI Designer</span>
                                                </div>
                                            </div>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="d-flex align-items-start">
                                                <img class="d-flex me-2 rounded-circle"
                                                    src="{{ asset('admin/images/users/user-5.jpg') }}"
                                                    alt="Generic placeholder image" height="32">
                                                <div class="w-100">
                                                    <h5 class="m-0 font-14">Jacob Deo</h5>
                                                    <span class="font-12 mb-0">Developer</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </li>

                    <li class="dropdown d-inline-block d-lg-none">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light"
                            data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                            aria-expanded="false">
                            <i class="fe-search noti-icon"></i>
                        </a>
                        <div class="dropdown-menu dropdown-lg dropdown-menu-end p-0">
                            <form class="p-3">
                                <input type="text" class="form-control" placeholder="Search ..."
                                    aria-label="Recipient's username">
                            </form>
                        </div>
                    </li>

                    <li class="dropdown d-none d-lg-inline-block">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="fullscreen"
                            href="#">
                            <i class="fe-maximize noti-icon"></i>
                        </a>
                    </li>

                    <li class="dropdown d-none d-lg-inline-block topbar-dropdown">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light"
                            data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                            aria-expanded="false">
                            <i class="fe-grid noti-icon"></i>
                        </a>
                        <div class="dropdown-menu dropdown-lg dropdown-menu-end">

                            <div class="p-lg-1">
                                <div class="row g-0">
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#">
                                            <img src="{{ asset('admin/images/brands/slack.png') }}" alt="slack">
                                            <span>Slack</span>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#">
                                            <img src="{{ asset('admin/images/brands/github.png') }}" alt="Github">
                                            <span>GitHub</span>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#">
                                            <img src="{{ asset('admin/images/brands/dribbble.png') }}" alt="dribbble">
                                            <span>Dribbble</span>
                                        </a>
                                    </div>
                                </div>

                                <div class="row g-0">
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#">
                                            <img src="{{ asset('admin/images/brands/bitbucket.png') }}"
                                                alt="bitbucket">
                                            <span>Bitbucket</span>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#">
                                            <img src="{{ asset('admin/images/brands/dropbox.png') }}" alt="dropbox">
                                            <span>Dropbox</span>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#">
                                            <img src="{{ asset('admin/images/brands/g-suite.png') }}" alt="G Suite">
                                            <span>G Suite</span>
                                        </a>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </li>

                    <li class="dropdown d-none d-lg-inline-block topbar-dropdown">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light"
                            data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                            aria-expanded="false">
                            <img src="{{ asset('admin/images/flags/us.jpg') }}" alt="user-image" height="16">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                <img src="{{ asset('admin/images/flags/germany.jpg') }}" alt="user-image"
                                    class="me-1" height="12"> <span class="align-middle">German</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                <img src="{{ asset('admin/images/flags/italy.jpg') }}" alt="user-image"
                                    class="me-1" height="12"> <span class="align-middle">Italian</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                <img src="{{ asset('admin/images/flags/spain.jpg') }}" alt="user-image"
                                    class="me-1" height="12"> <span class="align-middle">Spanish</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                <img src="{{ asset('admin/images/flags/russia.jpg') }}" alt="user-image"
                                    class="me-1" height="12"> <span class="align-middle">Russian</span>
                            </a>

                        </div>
                    </li>

                    {{-- @include('admin.partials.notifications') --}}

                    <li class="dropdown notification-list topbar-dropdown">
                        <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light"
                            data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                            aria-expanded="false">
                            <img src="{{ url('uploads/images/profiles/' . $user->image) }}" alt="user-image"
                                class="rounded-circle">
                            <span class="pro-user-name ms-1">
                                {{ $user->name }} <i class="mdi mdi-chevron-down"></i>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome {{ $user->name }}!</h6>
                            </div>

                            <!-- item-->
                            <a href="{{ route('admin.profile') }}" class="dropdown-item notify-item">
                                <i class="fe-user"></i>
                                <span>My Account</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item right-bar-toggle">
                                <i class="fe-settings"></i>
                                <span>Settings</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-lock"></i>
                                <span>Lock Screen</span>
                            </a>

                            <div class="dropdown-divider"></div>

                            <!-- item-->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" class="dropdown-item notify-item" onclick="event.preventDefault();
                                this.closest('form').submit();">
                                    <i class="fe-log-out"></i>
                                    <span>Logout</span>
                                </a>
                            </form>

                        </div>
                    </li>

                    <li class="dropdown notification-list">
                        <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                            <i class="fe-settings noti-icon"></i>
                        </a>
                    </li>

                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="{{ route('admin.dashboard') }}" class="logo logo-dark text-center">
                        <span class="logo-sm">
                            <img src="{{ asset('images/logo_light.png') }}" alt="" height="30"
                                width="80">
                            {{-- <span class="logo-lg-text-light">{{ $site_name }}</span> --}}
                        </span>
                        <span class="logo-lg">
                            <img src="{{ asset('images/logo_light.png') }}" alt="" height="26">
                            {{-- <span class="logo-lg-text-light">{{ $site_name }}</span> --}}
                        </span>
                    </a>

                    <a href="{{ route('admin.dashboard') }}" class="logo logo-light text-center">
                        <span class="logo-sm">
                            <img src="{{ asset('images/logo_light.png') }}" alt="" height="42"
                                width="80">
                            {{-- <span class="logo-lg-text-light">{{ $site_name }}</span> --}}
                        </span>
                        <span class="logo-lg">
                            <img src="{{ asset('images/logo_light.png') }}" alt="" height="48">
                            {{-- <span class="logo-lg-text-light">{{ $site_name }}</span> --}}
                        </span>
                    </a>
                </div>

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile waves-effect waves-light">
                            <i class="fe-menu"></i>
                        </button>
                    </li>

                    <li>
                        <!-- Mobile menu toggle (Horizontal Layout)-->
                        <a class="navbar-toggle nav-link" data-bs-toggle="collapse"
                            data-bs-target="#topnav-menu-content">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>

                    <li class="dropdown d-none d-xl-block">
                        <a class="nav-link dropdown-toggle waves-effect waves-light" data-bs-toggle="dropdown" href="#"
                            role="button" aria-haspopup="false" aria-expanded="false">
                            Add New
                            <i class="mdi mdi-chevron-down"></i>
                        </a>
                        <div class="dropdown-menu">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="fe-briefcase me-1"></i>
                                <span>Create Product</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="fe-user me-1"></i>
                                <span>Create User</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="fe-bar-chart-line- me-1"></i>
                                <span>Create Deposit</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="fe-alert-circle me-1"></i>
                                <span>Create Ticket</span>
                            </a>

                            <div class="dropdown-divider"></div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="fe-headphones me-1"></i>
                                <span>Help & Support</span>
                            </a>

                        </div>
                    </li>

                    <li class="dropdown d-none d-xl-block">
                        <a class="nav-link dropdown-toggle waves-effect waves-light" href="{{ route('home') }}"
                            role="button" aria-haspopup="true" aria-expanded="false" target="_blank">
                            Visit Site
                            <i class="mdi mdi-webhook"></i>
                        </a>
                    </li>

                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">

            <div class="h-100" data-simplebar>

                <!-- User box -->
                <div class="user-box text-center">
                    <img src="{{ url('uploads/images/profiles/' . $user->image) }}" alt="user-img"
                        title="{{ $user->name }}" class="rounded-circle avatar-md">
                    <div class="dropdown">
                        <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                            data-bs-toggle="dropdown">{{ $user->name }}</a>
                        <div class="dropdown-menu user-pro-dropdown">

                            <!-- item-->
                            <a href="{{ route('admin.profile') }}" class="dropdown-item notify-item">
                                <i class="fe-user me-1"></i>
                                <span>My Account</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item right-bar-toggle">
                                <i class="fe-settings me-1"></i>
                                <span>Settings</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-lock me-1"></i>
                                <span>Lock Screen</span>
                            </a>

                            <!-- item-->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" class="dropdown-item notify-item" onclick="event.preventDefault();
                                this.closest('form').submit();">
                                    <i class="fe-log-out"></i>
                                    <span>Logout</span>
                                </a>
                            </form>

                        </div>
                    </div>
                    <p class="text-muted">{{ Auth::user()->roles->first()->display_name }}</p>
                </div>

                <!--- Sidemenu -->
                <div id="sidebar-menu">

                    <ul id="side-menu">

                        <li class="menu-title">Navigation</li>

                        <li>
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="mdi mdi-view-dashboard-outline"></i>
                                <span class="badge bg-success rounded-pill float-end">New</span>
                                <span> Dashboard </span>
                            </a>

                        </li>


                        <li class="menu-title mt-2">Licenses</li>



                        <li>
                            <a href="#sidebarLicenses" data-bs-toggle="collapse">
                                <i class="mdi mdi-clipboard-text-outline"></i>
                                <span> Licenses </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarLicenses">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="{{ route('admin.license') }}">All Licenses</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('active.license') }}">Expired Licenses</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('expired.license') }}">Active Licenses</a>
                                    </li>
                               </ul>
                            </div>
                        </li>


                        <li>
                            <a href="#sidebarProducts" data-bs-toggle="collapse">
                                <i class="mdi mdi-cart-outline"></i>
                                <span> Products </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarProducts">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="{{ route('products.create') }}">Add Product</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('products.index') }}">Products List</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <a href="#sidebarDeposits" data-bs-toggle="collapse">
                                <i class="mdi mdi-account-cash-outline"></i>
                                <span> Deposits </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarDeposits">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="{{ route('deposit.index') }}">All Deposit</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('deposit.pending') }}">Pending Deposit</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('deposit.processing') }}">Processing Deposit</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('deposit.completed') }}">Completed Deposit</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('deposit.cancelled') }}">Declined Deposit</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <a href="#sidebarCustomers" data-bs-toggle="collapse">
                                <i class="mdi mdi-account-multiple-outline"></i>
                                <span> Customers </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarCustomers">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="{{ route('customer.create') }}">Add Customer</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('customer.index') }}">Customers List</a>
                                    </li>

                                </ul>
                            </div>
                        </li>



                        <li class="menu-title mt-2">Apps</li>


                        <li>
                            <a href="{{ route('admin.calendar') }}">
                                <i class="mdi mdi-calendar"></i>
                                <span> Calendar </span>
                            </a>
                        </li>



                        <li>
                            <a href="#sidebarTasks" data-bs-toggle="collapse">
                                <i class="mdi mdi-clipboard-multiple-outline"></i>
                                <span> Tasks </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarTasks">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="task-list.html">List</a>
                                    </li>
                                    <li>
                                        <a href="task-details.html">Details</a>
                                    </li>
                                    <li>
                                        <a href="task-kanban-board.html">Kanban Board</a>
                                    </li>
                                </ul>
                            </div>
                        </li>


                        <li>
                            <a href="#sidebarTickets" data-bs-toggle="collapse">
                                <i class="mdi mdi-lifebuoy"></i>
                                <span> Support Tickets </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarTickets">
                                <ul class="nav-second-level">
                                    {{-- <li>
                                        <a href="{{ route('ticket.create') }}">Create Ticket</a>
                                    </li> --}}
                                    <li>
                                        <a href="{{ route('ticket.index') }}">Tickets List</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('ticket.serving') }}">Serving Tickets</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('ticket.served') }}">Served Tickets</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>

                </div>
                <!-- End Sidebar -->

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->



        @yield('content')




        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> &copy; {{ $site_name }} Admin-Panel by <a
                            href="https://devetech365.com">DevTech365.Com</a>
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-end footer-links d-none d-sm-block">
                            <a href="javascript:void(0);">About Us</a>
                            <a href="javascript:void(0);">Help</a>
                            <a href="javascript:void(0);">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->


        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    <div class="right-bar">
        <div data-simplebar class="h-100">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-bordered nav-justified" role="tablist">
                <li class="nav-item">
                    <a class="nav-link py-2" data-bs-toggle="tab" href="#chat-tab" role="tab">
                        <i class="mdi mdi-message-text d-block font-22 my-1"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link py-2" data-bs-toggle="tab" href="#tasks-tab" role="tab">
                        <i class="mdi mdi-format-list-checkbox d-block font-22 my-1"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link py-2 active" data-bs-toggle="tab" href="#settings-tab" role="tab">
                        <i class="mdi mdi-cog-outline d-block font-22 my-1"></i>
                    </a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content pt-0">
                <div class="tab-pane" id="chat-tab" role="tabpanel">

                    <form class="search-bar p-3">
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="mdi mdi-magnify"></span>
                        </div>
                    </form>

                    <h6 class="fw-medium px-3 mt-2 text-uppercase">Group Chats</h6>

                    <div class="p-2">
                        <a href="javascript: void(0);" class="text-reset notification-item ps-3 mb-2 d-block">
                            <i class="mdi mdi-checkbox-blank-circle-outline me-1 text-success"></i>
                            <span class="mb-0 mt-1">App Development</span>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item ps-3 mb-2 d-block">
                            <i class="mdi mdi-checkbox-blank-circle-outline me-1 text-warning"></i>
                            <span class="mb-0 mt-1">Office Work</span>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item ps-3 mb-2 d-block">
                            <i class="mdi mdi-checkbox-blank-circle-outline me-1 text-danger"></i>
                            <span class="mb-0 mt-1">Personal Group</span>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item ps-3 d-block">
                            <i class="mdi mdi-checkbox-blank-circle-outline me-1"></i>
                            <span class="mb-0 mt-1">Freelance</span>
                        </a>
                    </div>

                    <h6 class="fw-medium px-3 mt-3 text-uppercase">Favourites <a href="javascript: void(0);"
                            class="font-18 text-danger"><i class="float-end mdi mdi-plus-circle"></i></a></h6>

                    <div class="p-2">
                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="d-flex align-items-start noti-user-item">
                                <div class="position-relative me-2">
                                    <img src="{{ asset('admin/images/users/user-10.jpg') }}"
                                        class="rounded-circle avatar-sm" alt="user-pic">
                                    <i class="mdi mdi-circle user-status online"></i>
                                </div>
                                <div class="overflow-hidden">
                                    <h6 class="mt-0 mb-1 font-14">Andrew Mackie</h6>
                                    <div class="font-13 text-muted">
                                        <p class="mb-0 text-truncate">It will seem like simplified English.</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="d-flex align-items-start noti-user-item">
                                <div class="position-relative me-2">
                                    <img src="{{ asset('admin/images/users/user-1.jpg') }}"
                                        class="rounded-circle avatar-sm" alt="user-pic">
                                    <i class="mdi mdi-circle user-status away"></i>
                                </div>
                                <div class="overflow-hidden">
                                    <h6 class="mt-0 mb-1 font-14">Rory Dalyell</h6>
                                    <div class="font-13 text-muted">
                                        <p class="mb-0 text-truncate">To an English person, it will seem like
                                            simplified</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="d-flex align-items-start noti-user-item">
                                <div class="position-relative me-2">
                                    <img src="{{ asset('admin/images/users/user-9.jpg') }}"
                                        class="rounded-circle avatar-sm" alt="user-pic">
                                    <i class="mdi mdi-circle user-status busy"></i>
                                </div>
                                <div class="overflow-hidden">
                                    <h6 class="mt-0 mb-1 font-14">Jaxon Dunhill</h6>
                                    <div class="font-13 text-muted">
                                        <p class="mb-0 text-truncate">To achieve this, it would be necessary.</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <h6 class="fw-medium px-3 mt-3 text-uppercase">Other Chats <a href="javascript: void(0);"
                            class="font-18 text-danger"><i class="float-end mdi mdi-plus-circle"></i></a></h6>

                    <div class="p-2 pb-4">
                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="d-flex align-items-start noti-user-item">
                                <div class="position-relative me-2">
                                    <img src="{{ asset('admin/images/users/user-2.jpg') }}"
                                        class="rounded-circle avatar-sm" alt="user-pic">
                                    <i class="mdi mdi-circle user-status online"></i>
                                </div>
                                <div class="overflow-hidden">
                                    <h6 class="mt-0 mb-1 font-14">Jackson Therry</h6>
                                    <div class="font-13 text-muted">
                                        <p class="mb-0 text-truncate">Everyone realizes why a new common language.</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="d-flex align-items-start noti-user-item">
                                <div class="position-relative me-2">
                                    <img src="{{ asset('admin/images/users/user-4.jpg') }}"
                                        class="rounded-circle avatar-sm" alt="user-pic">
                                    <i class="mdi mdi-circle user-status away"></i>
                                </div>
                                <div class="overflow-hidden">
                                    <h6 class="mt-0 mb-1 font-14">Charles Deakin</h6>
                                    <div class="font-13 text-muted">
                                        <p class="mb-0 text-truncate">The languages only differ in their grammar.</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="d-flex align-items-start noti-user-item">
                                <div class="position-relative me-2">
                                    <img src="{{ asset('admin/images/users/user-5.jpg') }}"
                                        class="rounded-circle avatar-sm" alt="user-pic">
                                    <i class="mdi mdi-circle user-status online"></i>
                                </div>
                                <div class="overflow-hidden">
                                    <h6 class="mt-0 mb-1 font-14">Ryan Salting</h6>
                                    <div class="font-13 text-muted">
                                        <p class="mb-0 text-truncate">If several languages coalesce the grammar of the
                                            resulting.</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="d-flex align-items-start noti-user-item">
                                <div class="position-relative me-2">
                                    <img src="{{ asset('admin/images/users/user-6.jpg') }}"
                                        class="rounded-circle avatar-sm" alt="user-pic">
                                    <i class="mdi mdi-circle user-status online"></i>
                                </div>
                                <div class="overflow-hidden">
                                    <h6 class="mt-0 mb-1 font-14">Sean Howse</h6>
                                    <div class="font-13 text-muted">
                                        <p class="mb-0 text-truncate">It will seem like simplified English.</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="d-flex align-items-start noti-user-item">
                                <div class="position-relative me-2">
                                    <img src="{{ asset('admin/images/users/user-7.jpg') }}"
                                        class="rounded-circle avatar-sm" alt="user-pic">
                                    <i class="mdi mdi-circle user-status busy"></i>
                                </div>
                                <div class="overflow-hidden">
                                    <h6 class="mt-0 mb-1 font-14">Dean Coward</h6>
                                    <div class="font-13 text-muted">
                                        <p class="mb-0 text-truncate">The new common language will be more simple.</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="d-flex align-items-start noti-user-item">
                                <div class="position-relative me-2">
                                    <img src="{{ asset('admin/images/users/user-8.jpg') }}"
                                        class="rounded-circle avatar-sm" alt="user-pic">
                                    <i class="mdi mdi-circle user-status away"></i>
                                </div>
                                <div class="overflow-hidden">
                                    <h6 class="mt-0 mb-1 font-14">Hayley East</h6>
                                    <div class="font-13 text-muted">
                                        <p class="mb-0 text-truncate">One could refuse to pay expensive translators.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <div class="text-center mt-3">
                            <a href="javascript:void(0);" class="btn btn-sm btn-white">
                                <i class="mdi mdi-spin mdi-loading me-2"></i>
                                Load more
                            </a>
                        </div>
                    </div>

                </div>

                <div class="tab-pane" id="tasks-tab" role="tabpanel">
                    <h6 class="fw-medium p-3 m-0 text-uppercase">Working Tasks</h6>
                    <div class="px-2">
                        <a href="javascript: void(0);" class="text-reset item-hovered d-block p-2">
                            <p class="text-muted mb-0">App Development<span class="float-end">75%</span></p>
                            <div class="progress mt-2" style="height: 4px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 75%"
                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset item-hovered d-block p-2">
                            <p class="text-muted mb-0">Database Repair<span class="float-end">37%</span></p>
                            <div class="progress mt-2" style="height: 4px;">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 37%"
                                    aria-valuenow="37" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset item-hovered d-block p-2">
                            <p class="text-muted mb-0">Backup Create<span class="float-end">52%</span></p>
                            <div class="progress mt-2" style="height: 4px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 52%"
                                    aria-valuenow="52" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </a>
                    </div>

                    <h6 class="fw-medium px-3 mb-0 mt-4 text-uppercase">Upcoming Tasks</h6>

                    <div class="p-2">
                        <a href="javascript: void(0);" class="text-reset item-hovered d-block p-2">
                            <p class="text-muted mb-0">Sales Reporting<span class="float-end">12%</span></p>
                            <div class="progress mt-2" style="height: 4px;">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 12%"
                                    aria-valuenow="12" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset item-hovered d-block p-2">
                            <p class="text-muted mb-0">Redesign Website<span class="float-end">67%</span></p>
                            <div class="progress mt-2" style="height: 4px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 67%"
                                    aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset item-hovered d-block p-2">
                            <p class="text-muted mb-0">New Admin Design<span class="float-end">84%</span></p>
                            <div class="progress mt-2" style="height: 4px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 84%"
                                    aria-valuenow="84" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </a>
                    </div>

                    <div class="p-3 mt-2 d-grid">
                        <a href="javascript: void(0);" class="btn btn-success waves-effect waves-light">Create Task</a>
                    </div>

                </div>
                <div class="tab-pane active" id="settings-tab" role="tabpanel">
                    <h6 class="fw-medium px-3 m-0 py-2 font-13 text-uppercase bg-light">
                        <span class="d-block py-1">Theme Settings</span>
                    </h6>

                    <div class="p-3">
                        <div class="alert alert-warning" role="alert">
                            <strong>Customize </strong> the overall color scheme, sidebar menu, etc.
                        </div>

                        <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Color Scheme</h6>
                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="color-scheme-mode" value="light"
                                id="light-mode-check" checked />
                            <label class="form-check-label" for="light-mode-check">Light Mode</label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="color-scheme-mode" value="dark"
                                id="dark-mode-check" />
                            <label class="form-check-label" for="dark-mode-check">Dark Mode</label>
                        </div>

                        <!-- Width -->
                        <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Width</h6>
                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="width" value="fluid" id="fluid-check"
                                checked />
                            <label class="form-check-label" for="fluid-check">Fluid</label>
                        </div>
                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="width" value="boxed"
                                id="boxed-check" />
                            <label class="form-check-label" for="boxed-check">Boxed</label>
                        </div>

                        <!-- Menu positions -->
                        <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Menus (Leftsidebar and Topbar) Positon</h6>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="menus-position" value="fixed"
                                id="fixed-check" checked />
                            <label class="form-check-label" for="fixed-check">Fixed</label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="menus-position" value="scrollable"
                                id="scrollable-check" />
                            <label class="form-check-label" for="scrollable-check">Scrollable</label>
                        </div>

                        <!-- Left Sidebar-->
                        <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Left Sidebar Color</h6>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="leftsidebar-color" value="light"
                                id="light-check" />
                            <label class="form-check-label" for="light-check">Light</label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="leftsidebar-color" value="dark"
                                id="dark-check" checked />
                            <label class="form-check-label" for="dark-check">Dark</label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="leftsidebar-color" value="brand"
                                id="brand-check" />
                            <label class="form-check-label" for="brand-check">Brand</label>
                        </div>

                        <div class="form-check form-switch mb-3">
                            <input type="checkbox" class="form-check-input" name="leftsidebar-color" value="gradient"
                                id="gradient-check" />
                            <label class="form-check-label" for="gradient-check">Gradient</label>
                        </div>

                        <!-- size -->
                        <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Left Sidebar Size</h6>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="leftsidebar-size" value="default"
                                id="default-size-check" checked />
                            <label class="form-check-label" for="default-size-check">Default</label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="leftsidebar-size" value="condensed"
                                id="condensed-check" />
                            <label class="form-check-label" for="condensed-check">Condensed <small>(Extra Small
                                    size)</small></label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="leftsidebar-size" value="compact"
                                id="compact-check" />
                            <label class="form-check-label" for="compact-check">Compact <small>(Small
                                    size)</small></label>
                        </div>

                        <!-- User info -->
                        <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Sidebar User Info</h6>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="leftsidebar-user" value="fixed"
                                id="sidebaruser-check" />
                            <label class="form-check-label" for="sidebaruser-check">Enable</label>
                        </div>


                        <!-- Topbar -->
                        <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Topbar</h6>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="topbar-color" value="dark"
                                id="darktopbar-check" checked />
                            <label class="form-check-label" for="darktopbar-check">Dark</label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="topbar-color" value="light"
                                id="lighttopbar-check" />
                            <label class="form-check-label" for="lighttopbar-check">Light</label>
                        </div>


                        <div class="d-grid mt-4">
                            <button class="btn btn-primary" id="resetBtn">Reset to Default</button>
                        </div>

                    </div>

                </div>
            </div>

        </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- Vendor js -->
    <script src="{{ asset('admin/js/vendor.min.js') }}"></script>


    <!--- third party js --->

    @stack('scripts')

    <!-- App js -->
    <script src="{{ asset('admin/js/app.min.js') }}"></script>

    <!--- Live Wire Js --->

    @livewireScripts

</body>

</html>
