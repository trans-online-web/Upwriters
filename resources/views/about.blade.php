@extends('layouts.app')

@section('content')

<!--breadcrumb area-->
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
                <div class="banner-title">
                    <h2>About</h2>
                </div>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li>About</li>
                </ul>
            </div>
        </div>
    </div>
</section><!--/breadcrumb area-->

<!--About Section-->
<section class="about-area">
    <div class="about-left dark-light-overlay wow fadeInUp" data-wow-delay="0.4s" style="background: url('images/about-2.jpg') no-repeat center / cover;">
        
    </div>
    <div class="about-content mid-bg-gray wow fadeInUp" data-wow-delay="0.4s">
        <div class="about-content-inner">
            <div class="section-title mb-10">
                <h2>About us & Our Business Policy</h2>
            </div>
            <p>
            We provide all types of academic paper help services; we have qualified experts in each field with years of experience. You can be assured of a quality paper, free of plagiarism custom written to suit all your requirements. Our company has policies that protect our clients and assures them quality service.<br>
            It is normal for a student to be given assignments and at times multiple assignments. Many students get stuck between meeting the deadlines of their assignments and concentrating on their studies. Assignments are time-consuming and leave students with less time to concentrate on their studies. That is where our skillful and professional writing services come in handy. Our experts can handle your assignment and present a top-notch quality paper. Thus, our paper writing help leaves students with maximum time to concentrate on their studies.<br>
            Our quality writers possess good qualifications and have undergone systematic screening to produce quality and plagiarism free papers. Our writers also understand that writing academic paper reports, dissertations, and research papers requires expertise and skillful research on the given task. As a writing service provider, we observe students’ deadlines and adhere to it strictly, which makes us one of the best services providers in paper writing help.</p>                
            <!-- <h5 class="mb-1">Petey Cruiser.</h5> -->
            <!-- <p class="cl-green m-0">CEO/CO-FOUNDER</p> -->
        </div>
    </div>
</section><!--/About Section-->

<!--Mission Vission Area-->
<section class="section-padding-2 gray-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="single-mission-vission">
                    <h4>Available 24/7 </h4>
                    <p>You can order for your paper at any time, and it can be completed at the set time-frame by following various writing styles, formats, and guidelines.</p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="single-mission-vission">
                    <h4>Experienced Writers</h4>
                    <p>We have a team of experts comprising of professional, skillful and top-notch writers who are accustomed to writing papers.</p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="single-mission-vission">
                    <h4>Quality work</h4>
                    <p>You are guaranteed of a paper that is outstanding and meets the standard requirements. Quality is what distinguishes our work.</p>
                </div>
            </div>
        </div>
    </div>
</section><!--/Mission Vission Area-->

@include('includes.footer')
@endsection