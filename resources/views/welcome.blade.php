@extends('layouts.app')

@section('content')
<div>
    @include('includes.nav')
    <!--Hero Area-->
    <section class="hero-section">
        <div class="hero-area-1">
            <div class="single-hero" style="background: url('images/hero-5.jpg') no-repeat center / cover;">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-7 centered">
                            <div class="hero-sub">
                                <div class="table-cell">
                                    <div class="hero-left">
                                        <h4>Creative</h4>
                                        <h1>Branding Agency</h1>
                                        <p>Eat imagine you chiefly few end ferrars compass. Be visitor females am ferrars inquiryremark thrown.</p>
                                        <a href="contact.html" class="bttn-mid btn-fill radius-50">Get free consultation</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/Hero Area-->

    <!--About Section-->
    <section class="about-area section-padding-2">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="single-about mb-30">
                        <img src="images/about-4.jpg" alt="">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="single-about">
                        <div class="section-title mb-10">
                            <h4>About us</h4>
                            <h2>We Started Our <br> Business in 2009</h2>
                            <p>Considered discovered ye sentiments projecting entreaties of melancholy is. In expression an solicitude principles in do. Hard do me sigh with west same lady. Their saved linen downs tears son add music. Expression alteration entreaties mrs can terminated estimating.</p>
                        </div>
                        <div class="counting">
                            <b><span class="count">4054</span>Services Sales</b>
                            <b><span class="count">759</span>Happy Clients</b>
                            <b><span class="count">102</span>Award Winning</b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/About Section-->

    <!-- Call to action -->
    <section class="section-padding dark-light-overlay" style="background: url('images/cta.jpg') no-repeat center / cover;">
         <div class="container">
             <div class="row justify-content-center">
                 <div class="col-xl-6 centered">
                    <div class="section-title mb-10 cl-white">
                        <h2>Growth is Important  In Business</h2>
                    </div>
                    <a href="#" class="bttn-mid btn-fill">Get Started</a>
                 </div>
             </div>
         </div>
    </section><!-- /Call to action -->

    <!--feature Area-->
    <section class="feature-area section-padding-2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="single-feature">
                        <i class="fas fa-user-friends cl-primary"></i>
                        <h4>Business Consulting</h4>
                        <p>Lose away off why half led have near bed. At engage simple father of period others except giving do summer</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="single-feature">
                        <i class="fas fa-chart-pie cl-mint"></i>
                        <h4>Market Research</h4>
                        <p>Lose away off why half led have near bed. At engage simple father of period others except giving do summer</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="single-feature">
                        <i class="fas fa-trophy cl-yellow"></i>
                        <h4>Become Successful</h4>
                        <p>Lose away off why half led have near bed. At engage simple father of period others except giving do summer</p>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/feature Area-->
     @include('includes.footer')
</div>

@endsection