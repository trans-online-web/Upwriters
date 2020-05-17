@extends('layouts.app')
@section('title')
Home
@stop
@section('content')
<div>
    @include('includes.nav')
    <!--Hero Area-->
    <section class="hero-section">
        <div class="hero-area-1">
            <div class="single-hero" style="background: url('images/hero-5.jpg') no-repeat center / cover;">
                <div class="container">
                    <div class="row ml-3 pl-5 justify-content-center">
                        <div class="col-xl-7 centered">
                            <div class="hero-sub">
                                <div class="table-cell">
                                    <div class="hero-left">
                                        <!-- <h4>Creative</h4> -->
                                        <br>
                                        <h2>In need of a top quality essay writing help?</h2>
                                        <p>Upwriters.net provides quality plagiarism free essays and assignment solutions done by top rated professional writers that will enable you attain higher test scores at an affordable price. </p>
                                        <a href="/task" class="bttn-mid btn-fill radius-50">Order Now!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/Hero Area-->

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
                            <!-- <h4>About us</h4> -->
                            <h2>Customer–Centered All Academic Paper Writing Help</h2>
                            <p>Our team is available all-round the clock with the sole objective of helping our valued clients in all their paper needs. In case of a question about a particular order, you can ask and our online live support will get back to you instantly. <br><br>
                                We value you. In case of any inquiries or clarification on any order information, don’t hesitate to contact us. Our replies are instant. This platform consists of one-stop solution for all students who need professional paper writing services. Our wide range of academic paper services will always come to rescue when in need of higher grade-level content. So be sure to reach us, we are looking forward to hearing from you. </p>
                        </div>
                        <div class="counting">
                            <b><span class="count">4054</span>Completed Orders</b>
                            <b><span class="count">759</span>Happy Clients</b>
                            <b><span class="count">102</span>Award Winning</b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/About Section-->

    <!-- Call to action -->
    <section class="section-padding dark-light-overlay" style="background: url('images/cta.jpg') no-repeat center / cover;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 centered">
                    <div class="section-title mb-10 cl-white">
                        <h2>Customer-centered paper writing help</h2>
                    </div>
                    @if (Auth::guest())
                    <a href="/register" class="bttn-mid btn-fill">Get Started</a>
                    @else
                    <a href="/task" class="bttn-mid btn-fill">Get Started</a>
                    @endif
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
                        <i class="fa fa-money cl-primary"></i>
                        <h4>Money-back guarantee</h4>
                        <p>Obtain a refund when the delivered paper does not either meet the requirements or is
                            canceled by the school.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="single-feature">
                        <i class="fa fa-pie-chart cl-mint"></i>
                        <h4>Quality Guarantee</h4>
                        <p>All papers are assessed and evaluated by the quality assurance department before
                            delivery.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="single-feature">
                        <i class="fa fa-key cl-green"></i>
                        <h4>Privacy and Confidentiality</h4>
                        <p>When you request to write your thesis statement service, we neither share nor disclose
                            clients’ data.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="single-feature">
                        <i class="fa fa-file-word-o cl-blue"></i>
                        <h4>Free Revision Guarantee</h4>
                        <p>The quality assurance department might request writers to undertake revisions to correct
                            flaws in the paper’s format and content before submission.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="single-feature">
                        <i class="fa fa-align-center cl-instagram"></i>
                        <h4>Originality</h4>
                        <p>We deliver 100% original papers with 0% plagiarism.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="single-feature">
                        <i class="fa fa-trophy cl-yellow"></i>
                        <h4>Compliance</h4>
                        <p>We follow customers’ instructions to the letter. Writers’ suggested proofing language,
                            format, content, and vocabulary level are prioritized.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/feature Area-->
</div>

@endsection