@extends('layouts.app')
@section('title')
    profile
@stop
@section('content')
    <div class="container ">
        <div class="row justify-content-left mt-5">
            <div class="col-md-4">
                <div class="container">
                    <div class="amd-app">
                        <div class="amd-intro">
                            <h1 class="text-center"><i class="fas fa-chevron-left"></i> Settings</h1>
                            <hr>
                        </div>
                        <div class="amd-info text-center">
                            <h4>Name:</h4>
                            <p>Sara Miller</p>

                            <h4>Address:</h4>
                            <p>222 Laura Lane<br>
                                Atlanta, GA 30324</p>

                            <h4>Number:</h4>
                            <p>555-555-5555</p>

                            <h4>Email:</h4>
                            <p>sara.miller@email.co</p>
                            <div class="amd-action text-center">
                                <button class="btn btn-primary">Update Account</button></br>
                                <button class="btn btn-danger">Delete Account</button>
                            </div>

                        </div>

                    </div>
                </div>

                Resources
        </div>
    </div>
    </div>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
@endsection
