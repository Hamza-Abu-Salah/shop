

<!DOCTYPE html>

<html lang="en">

<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>@yield('title',env('APP_NAME'))</title>

    <!-- Mobile Specific Metas
  ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Construction Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Themefisher Constra HTML Template v1.0">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('webassets/images/favicon.png') }}" />

    <!-- Themefisher Icon font -->
    <link rel="stylesheet" href="{{ asset('webassets/plugins/themefisher-font/style.css') }}">
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="{{ asset('webassets/plugins/bootstrap/css/bootstrap.min.css') }}">

    <!-- Animate css -->
    <link rel="stylesheet" href="{{ asset('webassets/plugins/animate/animate.css') }}">
    <!-- Slick Carousel -->
    <link rel="stylesheet" href="{{ asset('webassets/plugins/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('webassets/plugins/slick/slick-theme.css') }}">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('webassets/css/style.css') }}">
@yield('style')
</head>

<body id="body">

    <!-- Start Top Header Bar -->
    @include('website.include.navbar')
    <!-- End Top Header Bar -->


    <!-- Main Menu Section -->


    @yield('content')


    @include('website.include.footer')

    <!--
    Essential Scripts
    =====================================-->

    <!-- Main jQuery -->
    <script src="{{ asset('webassets/plugins/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.1 -->
    <script src="{{ asset('webassets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- Bootstrap Touchpin -->
    <script src="{{ asset('webassets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') }}"></script>
    <!-- Instagram Feed Js -->
    <script src="{{ asset('webassets/plugins/instafeed/instafeed.min.js') }}"></script>
    <!-- Video Lightbox Plugin -->
    <script src="{{ asset('webassets/plugins/ekko-lightbox/dist/ekko-lightbox.min.js') }}"></script>
    <!-- Count Down Js -->
    <script src="{{ asset('webassets/plugins/syo-timer/build/jquery.syotimer.min.js') }}"></script>

    <!-- slick Carousel -->
    <script src="{{ asset('webassets/plugins/slick/slick.min.js') }}"></script>
    <script src="{{ asset('webassets/plugins/slick/slick-animation.min.js') }}"></script>

    <!-- Google Mapl -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
    <script type="text/javascript" src="{{ asset('webassets/plugins/google-map/gmap.js') }}"></script>

    <!-- Main Js File -->
    <script src="{{ asset('webassets/js/script.js') }}"></script>
    @yield('script')



</body>

</html>
