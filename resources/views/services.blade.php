@extends('layouts.app')
@section('title')
Our Services
@stop
@section('content')
	<!--breadcrumb area-->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
                    <div class="banner-title">
                        <h2>Services</h2>
                    </div>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li>Services</li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!--/breadcrumb area-->

    <!--services Area-->
    <section class="services-area section-padding-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 centered wow fadeInUp" data-wow-delay="0.3s">
                    <div class="section-title">
                        <h4>Our Services</h4>
                        <h2>We provide a wide range of services</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="single-service-2">
                        <div class="service-icon">
                            <i class="flaticon-chat"></i>
                        </div>
                        <div class="service-content">
                            <h4><a href="#">Academic paper writing help</a></h4>
                            <p>We specialize in custom academic papers for all levels of students.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="single-service-2">
                        <div class="service-icon">
                            <i class="flaticon-bluetooth"></i>
                        </div>
                        <div class="service-content">
                            <h4><a href="#">Term paper writing help</a></h4>
                            <p>Get an excellent grade on any custom term paper writing service. </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="single-service-2">
                        <div class="service-icon">
                            <i class="flaticon-box"></i>
                        </div>
                        <div class="service-content">
                            <h4><a href="#">Help with Thesis papers</a></h4>
                            <p>We offer a full service package which involves our experts writing your full thesis.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="single-service-2">
                        <div class="service-icon">
                            <i class="flaticon-book"></i>
                        </div>
                        <div class="service-content">
                            <h4><a href="#">Technical assignments</a></h4>
                            <p>We understand the importance and standard of knowledge required to write assignments on different technical areas.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="single-service-2">
                        <div class="service-icon">
                            <i class="flaticon-bell"></i>
                        </div>
                        <div class="service-content">
                            <h4><a href="#">Coursework</a></h4>
                            <p>Upwriters is here to do your coursework for you. Fill and submit the order form and wait.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="single-service-2">
                        <div class="service-icon">
                            <i class="flaticon-calculator"></i>
                        </div>
                        <div class="service-content">
                            <h4><a href="#">Professional paper writing help</a></h4>
                            <p>At Upwriters, you get 24-hour help with proffesional paper writing on any subject and any level.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/services Area-->

    <!-- Review Area -->
    <section class="review-area section-padding" style="background: url('images/testimonial-bg.jpg') no-repeat center / cover;">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="section-title">
                        <h2>testimonials</h2>
                        <p>What our esteemed clients say about us.</p>
                    </div>
                    <div class="testimonials owl-carousel">
                        <div class="single-review">
                            <div class="reviewer-thumb">
                                <h3>Erin Washington</h3>
                                <!-- <span>Co founder, Rocket agency</span> -->
                            </div>
                            <p>Perfect. I am so glad i decided to order from you. My essay was done perfectly.</p>
                        </div>
                        <div class="single-review">
                            <div class="reviewer-thumb">
                                <h3>Mario wagon</h3>
                                <!-- <span>Businessman</span> -->
                            </div>
                            <p>Timely and quality work. You are the best. Thank you.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Review Area -->
@endsection
