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
                        <a href="{{ url('mydashboard') }}" class="nav-link text-dark {{ Request::path() ==  'mydashboard' ? 'active' : ''  }}">
                            <i class="nav-icon fas fa-tachometer-alt blue"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    
                    <li class="nav-item " >
                        <a href="{{ url('unpaid') }}" class="nav-link text-dark {{ Request::path() ==  'unpaid' ? 'active' : ''  }}">
                            <i class="nav-icon fas fa-file-invoice-dollar pink"></i>
                            <p>
                                Unpaid Orders
                            </p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ url('onprogress') }}" class="nav-link text-dark {{ Request::path() ==  'onprogress' ? 'active' : ''  }}">
                            <i class="nav-icon fas fa-pen cyan"></i>
                            <p>
                                Assigned work
                            </p>
                        </a>
                    </li>
                    
                   
                    <li class="nav-item ">
                        <a href="{{ url('revision') }}" class="nav-link text-dark {{ Request::path() ==  'revision' ? 'active' : ''  }}">
                            <i class=" nav-icon fas fa-redo orange"></i>
                            <p>
                                Revision
                            </p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ url('completed') }}" class="nav-link text-dark {{ Request::path() ==  'completed' ? 'active' : ''  }}">
                            <i class=" nav-icon fas fa-file-word yellow"></i>
                            <p>
                                Completed
                            </p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ url('disputed') }}" class="nav-link text-dark {{ Request::path() ==  'disputed' ? 'active' : ''  }}">
                            <i class=" nav-icon fas fa-exclamation-triangle text-red"></i>
                            <p>
                               Disputed
                            </p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ url('payment') }}" class="nav-link text-dark {{ Request::path() ==  'payment' ? 'active' : ''  }}">
                            <i class=" nav-icon fas fa-money-check-alt  text-teal"></i>
                            <p>
                               Payments
                            </p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ url('refaral') }}" class="nav-link text-dark {{ Request::path() ==  'refaral' ? 'active' : ''  }}">
                            <i class=" nav-icon fas fa-people-arrows text-purple"></i>
                            <p>
                               Refer A friend
                            </p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ url('myProfile') }}" class="nav-link text-dark {{ Request::path() ==  'myProfile' ? 'active' : ''  }}">
                            <i class="nav-icon fas fas fa-user-alt green"></i>
                            <p>
                                Profile
                            </p>
                        </a>
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
