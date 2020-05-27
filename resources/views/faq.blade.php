@extends('layouts.app')
@section('title')
About Us
@stop
@section('content')

<!--breadcrumb area-->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
                    <div class="banner-title">
                        <h2>Faqs</h2>
                    </div>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li>Faqs</li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!--/breadcrumb area-->

<section class="cd-faq js-cd-faq container max-width-md margin-top-lg margin-bottom-lg">
    <ul class="cd-faq__categories">
        <li><a class="cd-faq__category cd-faq__category-selected truncate" href="#basics">Basics</a></li>
        <li><a class="cd-faq__category truncate" href="#mobile">Services</a></li>
        <li><a class="cd-faq__category truncate" href="#account">More on Orders</a></li>
    </ul> <!-- cd-faq__categories -->

    <div class="cd-faq__items">
        <ul id="basics" class="cd-faq__group">
            <li class="cd-faq__title"><h2>Basics</h2></li>
            <li class="cd-faq__item">
                <a class="cd-faq__trigger" href="#0"><span>How do I order an essay?</span></a>
                <div class="cd-faq__content">
          <div class="text-component">
            <h5>Ordering an essay is very simple. Just <a href="/login">click here </a>to visit our login
             page create a free account verify your email and get access to the orders tab inside your account.
             Please make sure to include your valid contact information to reach you if there are any issues with
             your order.</h5>
          </div>
                </div> <!-- cd-faq__content -->
            </li>

            <li class="cd-faq__item">
                <a class="cd-faq__trigger" href="#0"><span>How long does it take to complete my order?</span></a>
                <div class="cd-faq__content">
          <div class="text-component">
            <h5>we encourage users to place orders as soon as possible to the writers. This gives the writes enough
            time to do an excellent job. Based on our efficiency, we normally deliver most orders within 48
             hours.</h5>
          </div>
                </div> <!-- cd-faq__content -->
            </li>

            <li class="cd-faq__item">
                <a class="cd-faq__trigger" href="#0"><span>How will my order be delivered to me?</span></a>
                <div class="cd-faq__content">
          <div class="text-component">
            <h5>You can either download the completed paper from your profile page on our website or request it to
           be mailed to you.</h5>
          </div>
                </div> <!-- cd-faq__content -->
            </li>

            <li class="cd-faq__item">
                <a class="cd-faq__trigger" href="#0"><span>How do you protect my privacy?</span></a>
                <div class="cd-faq__content">
          <div class="text-component">
            <h5>Upwriters.net is fully committed to protecting your privacy. Under no circumstances shall we
            disclose your personal information or share with any third party.</h5>
          </div>
                </div> <!-- cd-faq__content -->
            </li>
        </ul> <!-- cd-faq__group -->

        <ul id="mobile" class="cd-faq__group">
            <li class="cd-faq__title"><h2>Mobile</h2></li>
            <li class="cd-faq__item">
                <a class="cd-faq__trigger" href="#0"><span>Can I communicate with the writers during my project?</span></a>
                <div class="cd-faq__content">
          <div class="text-component">
            <h5>Yes. We have a quality assurance team that directly communicates to you regarding the quality and
            in some cases link you to the writers directly. We also offer 24/7 live customer support service.</h5>
          </div>
                </div> <!-- cd-faq__content -->
            </li>

            <li class="cd-faq__item">
                <a class="cd-faq__trigger" href="#0"><span>What services do you offer and at what price?</span></a>
                <div class="cd-faq__content">
          <div class="text-component">
            <h5>Upwriters main mission is to provide professional academic assistance to students of all academic
levels. We allow our clients to get direct assistance from professional writers who have knowledge
and experience to custom craft your assignments in order to acquire quality work. Prices range
according to the work at hand after your assignment submission which is communicated to you
before the work commences.</h5>
          </div>
                </div> <!-- cd-faq__content -->
            </li>

            <li class="cd-faq__item">
                <a class="cd-faq__trigger" href="#0"><span>Are your services guaranteed?</span></a>
                <div class="cd-faq__content">
          <div class="text-component">
            <h5>Our client satisfaction is our top priority. We guarantee it.</h5>
          </div>
                </div> <!-- cd-faq__content -->
            </li>
        </ul> <!-- cd-faq__group -->

        <ul id="account" class="cd-faq__group">
            <li class="cd-faq__title"><h2>Account</h2></li>
            <li class="cd-faq__item">
                <a class="cd-faq__trigger" href="#0"><span>What if I am not happy with my paper and how it has been done?</span></a>
                <div class="cd-faq__content">
          <div class="text-component">
            <h5>We always do whatever it takes to keep our users satisfied. We also have a money back policy in
case your order specifications have not been met.</h5>
          </div>
                </div> <!-- cd-faq__content -->
            </li>

            <li class="cd-faq__item">
                <a class="cd-faq__trigger" href="#0"><span>Can I place large orders with short deadlines?</span></a>
                <div class="cd-faq__content">
          <div class="text-component">
            <h5>Some large and complex projects simply cannot be completed within a short period. We normally
encourage our clients to submit them immediately. After assessment, we give the time frame
required to deliver accurate work.</h5>
          </div>
                </div> <!-- cd-faq__content -->
            </li>

            <li class="cd-faq__item">
                <a class="cd-faq__trigger" href="#0"><span>Do you offer promotions or discounts?</span></a>
                <div class="cd-faq__content">
          <div class="text-component">
            <h5>Yes. Promotions are usually advertised on the main<a href="/login">Home page</a></h5>
          </div>
                </div> <!-- cd-faq__content -->
            </li>

            <li class="cd-faq__item">
                <a class="cd-faq__trigger" href="#0"><span>Why choose upwriters?</span></a>
                <div class="cd-faq__content">
          <div class="text-component">
            <h5>We are committed to provide the best academic writing service online. We always deliver 100%
plagiarism free content. We also offer 24/7 live customer support, so someone is always available to
take care of you. Our writers are among the best in the industry and they are all professionals.</h5>
          </div>
                </div> <!-- cd-faq__content -->
            </li>
        </ul> <!-- cd-faq__group -->

       
                </div> <!-- cd-faq__content -->
            </li>
        </ul> <!-- cd-faq__group -->
    </div> <!-- cd-faq__items -->

    <a href="#0" class="cd-faq__close-panel text-replace">Close</a>
  
  <div class="cd-faq__overlay" aria-hidden="true"></div>
</section> <!-- cd-faq -->
@endsection