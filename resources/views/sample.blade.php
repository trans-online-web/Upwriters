@extends('layouts.app')
@section('title')
    Sample
@stop
@section('content')
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
                    <div class="banner-title">
                        <h2>Sample Papers</h2>
                    </div>
                    <ul>
                        <li><a href="">Home</a></li>
                        <li>Samples</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="container-fluid" style="margin-top: 100px;">
        <sample-client></sample-client>
    </div>
@endsection
