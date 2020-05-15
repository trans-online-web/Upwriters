<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<script type="text/javascript">
    //<![CDATA[
    var tlJsHost = ((window.location.protocol == "https:") ? "https://secure.trust-provider.com/" : "http://www.trustlogo.com/");
    document.write(unescape("%3Cscript src='" + tlJsHost + "trustlogo/javascript/trustlogo.js' type='text/javascript'%3E%3C/script%3E"));
    //]]>
</script>

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-146138937-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-146138937-1');
    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Get the best quality academic paper, essay or thesis written by qualified professional writers. Upwriters are here to help.">
    <meta name="keywords" content="Writing, Essay, Academic, Professional, Thesis, Assignment, Homework, Writer help, Online Assignment, Finance Assignment, Online assignment help, Expert Assignment, Online writing, Law Assignments, Best Assignment service. ">
    <meta name="yandex-verification" content="9b568e26b1e48729" />
    <title>Upwriters.net - Hire Top-Quality Essay and Paper Writing Services</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script>--}}
    <script src="https://cdn.jsdelivr.net/momentjs/2.13.0/moment.min.js"></script>

    <link rel="canonical" href="https://upwriters.net/" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Main css -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<script language="JavaScript" type="text/javascript">
    TrustLogo("https://upwriters.net/", "SC5", "none");
</script>
<a href="https://www.instantssl.com/ssl-certificate.html" id="comodoTL">Gold SSL</a>

<body>
    <div id="app">
        @include('includes.nav')

        @yield('content')
        @include('includes.footer')
    </div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/jquery-migrate.js"></script>
    <script src="js/jquery-ui.js"></script>

    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>

    <script src="js/magnific-popup.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>

    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/scrollUp.min.js"></script>

    <script src="js/script.js"></script>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/5ddbc6a9d96992700fc91c1a/default';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
</body>

</html>