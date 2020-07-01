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
                                          @auth
                                            <div class="alert alert-primary">
                                         Your Referral link is  <span> {{ url('/') . '/?ref=' . Auth::user()->id }} </span>
                                            </div>
                                            @endauth
                                        <div class="hero-left">
                                            <!-- <h4>Creative</h4> -->
                                            <br>
                                            <h2>In Need of a Quality Assignment or Paper Help?</h2>
                                            <p>Our company provides customized paper writing help that will enable you
                                                to get the paper according to your needs. The customized papers will be
                                                written professionally and will be quality as well as affordable. </p>
                                                @if (Auth::guest())
                                             <a href="/register" class="bttn-mid btn-fill-2 radius-50" style="float: centre;">Join Us!</a><br>
                                            @else
                                             <a href="/task" class="bttn-mid btn-fill-2 radius-50" style="float: centre;">ORDER NOW!</a><br>
                                             @endif
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
                            <img src="images/writing78.jpeg" alt="">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="single-about">
                            <div class="section-title mb-10">
                                <!-- <h4>About us</h4> -->
                                <h2>Online Assignment Help from Best Assignment Writing Service Website</h2>
                                <p>                                    If you are here, probably Upwriters isn't your first academic assistance agency. Many students who come to our websites tell us they have been coned or scammed, and they have been referred here. A referral is enough social proof that we are indeed doing a good job. Also, we are possibly the best academic writing service that you can find online today. Actions speak louder than words, and our actions prove that we deliver on quality any day at any time.
                                    Whether it's a weekly course work assignment, term papers, research paper, essays or writing a dissertation, and many more, we have delivered for over a decade. </p>
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
        </section><!--/About Section-->

        <!-- Call to action -->
        <section class="section-padding dark-light-overlay"
                 style="background: url('images/cta.jpg') no-repeat center / cover;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 centered">
                        <div class="section-title mb-10 cl-white">
                            <h2>Round the Clock Quality Assignment or Paper Help</h2>
                        </div>
                        @if (Auth::guest())
                            <a href="/register" class="bttn-mid btn-fill">Sign up</a>
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
                            <p>Are you dissatisfied with any paper you've received? Well, you can place a free paper revision. Did you inadvertently omit some instructions on your assignment order? Don't worry, talk to support, and have the writer work on your assignment to assist you. Don't worry if the paper is already completed. All revisions attract a zero fee</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="single-feature">
                            <i class="fa fa-align-center cl-instagram"></i>
                            <h4>Originality</h4>
                            <p>We strive to maintain a professional level of communication. Expect your work to be well proofread, grammatically error-free, and free from plagiarism. Our writers have the best writing tools to check for grammar and plagiarism checkers such as Turnitin to among others, to detect any plagiarism. We deliver 100% original papers with 0% plagiarism.</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="single-feature">
                            <i class="fa fa-trophy cl-yellow"></i>
                            <h4>Compliance</h4>
                            <p>Your work will be delivered on time and will pass through an editor to ensure that the assigned writers have met all instructions provided. All research papers will have accurate citations and proper formatting. We follow customers’ instructions to the letter. Writers’ suggested proofing language,
                                format, content, and vocabulary level are prioritized.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section><!--/feature Area-->
    </div>

@endsection
