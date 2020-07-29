@extends('layouts.app')
@section('title')
    profile
@stop
@section('content')
        <!-- Main content -->
        <section class="content mt-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="images/commenter1.png" alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center"> {{ Auth::user()->name }}</h3>

                                <p class="text-muted text-center">Client</p>

                                <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="/dashboard" class="nav-link text-dark">
                            <i class="nav-icon fas fa-tachometer-alt blue"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <router-link to="/subject" class="nav-link text-dark">
                            <i class="nav-icon fas fas fa-user-alt green"></i>
                            <p>
                                Profile
                            </p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/documents" class="nav-link text-dark">
                            <i class="nav-icon fas fa-file-invoice-dollar pink"></i>
                            <p>
                                Unpaid Orders
                            </p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/levels" class="nav-link text-dark">
                            <i class="nav-icon fas fa-pen cyan"></i>
                            <p>
                                Working Progress
                            </p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/orders" class="nav-link text-dark">
                            <i class="nav-icon fas fa-pen-square teal"></i>
                            <p>
                               Assigned work
                            </p>
                        </router-link>
                    </li>
                   
                    <li class="nav-item">
                        <router-link to="/AdminSample" class="nav-link text-dark">
                            <i class=" nav-icon fas fa-redo orange"></i>
                            <p>
                                Revision
                            </p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/logs" class="nav-link text-dark">
                            <i class=" nav-icon fas fa-file-word yellow"></i>
                            <p>
                                Completed
                            </p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/user" class="nav-link text-dark">
                            <i class=" nav-icon fas fa-exclamation-triangle text-red"></i>
                            <p>
                               Disputed
                            </p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/user" class="nav-link text-dark">
                            <i class=" nav-icon fas fa-money-check-alt  text-teal"></i>
                            <p>
                               Payments
                            </p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/user" class="nav-link text-dark">
                            <i class=" nav-icon fas fa-people-arrows text-purple"></i>
                            <p>
                               Refer A friend
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
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                    @yield('contents')
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
@endsection
