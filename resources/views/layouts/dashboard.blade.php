<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title></title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
</head>
<body class="hold-transition sidebar-mini">
<script
        src="https://www.paypal.com/sdk/js?client-id=AVR-206XMxlGClbAhWRS2Ycb2QlNKPflZNYoB37XBuH3JOCvawfmysN9p_ne5bDDxYhuYhPE-ziiLNEz"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
</script>
@can('isAdmin')
    <div class="wrapper" id="app">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- SEARCH FORM -->

            <div class="input-group input-group-sm col-md-4">
                <input class="form-control form-control-navbar" @keyup="searchit" v-model="search" type="search"
                       placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" @click="searchit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>


            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                {{--<notification :userid="{{auth()->user()->id}}" :unreads="{{auth()->user()->unreadNotifications}}"></notification>--}}
                <li class="nav-item dropdown" id="markasread"
                    onclick="markasread('{{count(auth()->user()->unreadNotifications)}}')">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="fas fa-bell fa-lg orange"></i> Notification <span
                                class="badge badge-warning navbar-badge">{{count(auth()->user()->unreadNotifications)}}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header"><i class="fa fa-envelope mr-2"></i>New Messages</span>
                        <div class="dropdown-divider"></div>
                        @forelse(auth()->user()->unreadNotifications as $notifications)
                            <a href="#" class="dropdown-item">
                                @include('layouts.notification.'.snake_case(class_basename($notifications->type)))
                                @empty
                                    <a href="#">No New message</a>
                            </a>
                        @endforelse

                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
            <span class="brand-text font-weight-light">

            </span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                    </div>
                    <div class="info text-dark">
                        <a href="#" class="d-block text-danger">{{ Auth::user()->name }}</a>
                        <p>
                            <a href="#" class="d-block">{{ Auth::user()->type }}</a>
                        </p>
                    </div>
                </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <router-link to="/dashboard" class="nav-link text-dark">
                            <i class="nav-icon fas fa-tachometer-alt blue"></i>
                            <p>
                                Dashboard
                            </p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/subject" class="nav-link text-dark">
                            <i class="nav-icon fas fa-book-open green"></i>
                            <p>
                                Subject
                            </p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/documents" class="nav-link text-dark">
                            <i class="nav-icon fas fa-file-word pink"></i>
                            <p>
                                Documents
                            </p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/levels" class="nav-link text-dark">
                            <i class="nav-icon fas fa-sort-amount-up-alt cyan"></i>
                            <p>
                                Levels
                            </p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/orders" class="nav-link text-dark">
                            <i class="nav-icon fas fa-book teal"></i>
                            <p>
                               Orders
                            </p>
                        </router-link>
                    </li>
                    <li class="nav-item has-treeview menu ">
                        <a href="#" class="nav-link ">
                            <i class="fa fa-calendar-week teal"></i>
                            <p style="color: rgba(0,0,0,0.8);">
                                Blog
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link to="/blog-admin" class="nav-link">
                                    <i class="fa fa-calendar-week teal"></i>
                                    <p style="color: rgba(0,0,0,0.8);">
                                        Create Story
                                    </p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/blog-categories" class="nav-link">
                                    <i class="fa fa-calendar-week teal"></i>
                                    <p style="color: rgba(0,0,0,0.8);">
                                        Blog Categories
                                    </p>
                                </router-link>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <router-link to="/AdminSample" class="nav-link text-dark">
                            <i class=" nav-icon fas fa-file-word orange"></i>
                            <p>
                                Paper Samples
                            </p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/logs" class="nav-link text-dark">
                            <i class=" nav-icon fas fa-clipboard-check yellow"></i>
                            <p>
                                System Logs
                            </p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/user" class="nav-link text-dark">
                            <i class=" nav-icon fas fa-users-cog  text-teal"></i>
                            <p>
                               User Management
                            </p>
                        </router-link>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-dark" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="nav-icon fa fa-power-off red"></i>
                                <p>
                                    {{ __('Logout') }}
                                </p>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->


            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <router-view :user="{{auth()->user()}}"></router-view>
                    <main class="py-4">
                        {{-- @yield('content') --}}
                    </main>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy;2019 - <?php echo date("Y"); ?> <a href="https://Twtechnologies.africa">Twtechnologies.africa</a>.</strong> All rights
            reserved.
        </footer>
    </div>
@endcan
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->

<!-- Bootstrap 4 -->

<!-- AdminLTE App -->

<!-- Scripts -->
@auth
    <script>
        window.user = @json(auth()->user())
    </script>
@endauth
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/main.js') }}" defer></script>
</body>
</html>

