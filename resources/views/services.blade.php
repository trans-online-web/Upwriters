@extends('layouts.app')

@section('content')
	<!--breadcrumb area-->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
                    <div class="banner-title">
                        <h2>Services 2</h2>
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
                        <h2>We Will Provide Lot of Services</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="single-service-2">
                        <div class="service-icon">
                            <i class="flaticon-file-2"></i>
                        </div>
                        <div class="service-content">
                            <h4><a href="#">Content Marketing</a></h4>
                            <p>Lose away off why half led have near bed. At engage simple father of period others except</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="single-service-2">
                        <div class="service-icon">
                            <i class="flaticon-credit-card"></i>
                        </div>
                        <div class="service-content">
                            <h4><a href="#">Saving Investment</a></h4>
                            <p>Lose away off why half led have near bed. At engage simple father of period others except</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="single-service-2">
                        <div class="service-icon">
                            <i class="flaticon-megaphone"></i>
                        </div>
                        <div class="service-content">
                            <h4><a href="#">Media Marketing</a></h4>
                            <p>Lose away off why half led have near bed. At engage simple father of period others except</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="single-service-2">
                        <div class="service-icon">
                            <i class="flaticon-book"></i>
                        </div>
                        <div class="service-content">
                            <h4><a href="#">Detail Report</a></h4>
                            <p>Lose away off why half led have near bed. At engage simple father of period others except</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="single-service-2">
                        <div class="service-icon">
                            <i class="flaticon-inbox"></i>
                        </div>
                        <div class="service-content">
                            <h4><a href="#">Finance Analysis</a></h4>
                            <p>Lose away off why half led have near bed. At engage simple father of period others except</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="single-service-2">
                        <div class="service-icon">
                            <i class="flaticon-flag"></i>
                        </div>
                        <div class="service-content">
                            <h4><a href="#">Investment Plan</a></h4>
                            <p>Lose away off why half led have near bed. At engage simple father of period others except</p>
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
                        <p>Lose away off why half led have near bed. At engage simple father of period others except</p>
                    </div>
                    <div class="testimonials owl-carousel">
                        <div class="single-review">
                            <div class="reviewer-thumb">
                                <h3>Erin Washington</h3>
                                <span>Co founder, Rocket agency</span>
                            </div>
                            <p>Entire any had depend and figure winter. Change stairs and men likely wisdom new happen piqued six. Now taken him timed world get. Enjoyed married an feeling</p>
                        </div>
                        <div class="single-review">
                            <div class="reviewer-thumb">
                                <h3>Mario wagon</h3>
                                <span>Businessman</span>
                            </div>
                            <p>Change stairs and men likely wisdom new happen piqued six. Now taken him timed world get. Enjoyed married an feeling delight pursuit as offered. Change stairs</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Review Area -->
    @include('includes.footer')
@endsection