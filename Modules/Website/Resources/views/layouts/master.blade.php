<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <title>Jobhub</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/theme/favicon.svg" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{CustomAsset('front/assets/css/plugins/animate.min.css')}}" />
    <link rel="stylesheet" href="{{CustomAsset('front/assets/css/main.css?v=1.0')}}" />

</head>

<body>

    @include('website::layouts.header')

    <main class="main">

        @yield('content')

    </main>

    @include('website::layouts.footer')

    <!-- Vendor JS-->
    <script src="{{CustomAsset('front/assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
    <script src="{{CustomAsset('front/assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <script src="{{CustomAsset('front/assets/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
    <script src="{{CustomAsset('front/assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{CustomAsset('front/assets/js/plugins/waypoints.js')}}"></script>
    <script src="{{CustomAsset('front/assets/js/plugins/wow.js')}}"></script>
    <script src="{{CustomAsset('front/assets/js/plugins/magnific-popup.js')}}"></script>
    <script src="{{CustomAsset('front/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
    <script src="{{CustomAsset('front/assets/js/plugins/select2.min.js')}}"></script>
    <script src="{{CustomAsset('front/assets/js/plugins/isotope.js')}}"></script>
    <script src="{{CustomAsset('front/assets/js/plugins/scrollup.js')}}"></script>
    <script src="{{CustomAsset('front/assets/js/plugins/swiper-bundle.min.js')}}"></script>
    <!-- Template  JS -->
    <script src="{{CustomAsset('front/assets/js/main.js?v=1.0')}}"></script>

</body>

</html>
