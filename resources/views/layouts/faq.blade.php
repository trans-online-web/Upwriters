<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<script type="text/javascript">//<![CDATA[
    var tlJsHost = ((window.location.protocol == "https:") ? "https://secure.trust-provider.com/" : "http://www.trustlogo.com/");
    document.write(unescape("%3Cscript src='" + tlJsHost + "trustlogo/javascript/trustlogo.js' type='text/javascript'%3E%3C/script%3E"));
    //]]>
</script>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Getting professional paper writing is not easy. Paper writing requires knowledge and a high level of English to produce a satisfactory paper. If you need help, we are here to help you with your paper.">

    <title>Upwriters || @yield('title')</title>

    <!-- Scripts -->
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}
    <script src="https://cdn.jsdelivr.net/momentjs/2.13.0/moment.min.js"></script>

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

   
     <script src="assets/js/util.js"></script> <!-- util functions included in the CodyHouse framework -->
    <script src="assets/js/main1.js"></script> 


 
    <!--End of Tawk.to Script-->
    @auth
        <script>
            window.user = @json(auth()->user())
        </script>
    @endauth
</body>
</html>
