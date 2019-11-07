@extends('layouts.app')

@section('content')
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
                    <div class="banner-title">
                        <h2>Blog List</h2>
                    </div>
                    <ul>
                        <li><a href="">Home</a></li>
                        <li>Blog</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="container-fluid" style="margin-top: 100px;">
        <blog-user></blog-user>
    </div>
@endsection
