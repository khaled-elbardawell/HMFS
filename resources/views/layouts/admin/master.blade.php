<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Crovex - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{CustomAsset("admin/assets/images/favicon.ico")}}">

    <!-- jvectormap -->
    <link href="{{CustomAsset("admin/plugins/jvectormap/jquery-jvectormap-2.0.2.css")}}" rel="stylesheet">

    <!-- App css -->
    <link href="{{CustomAsset("admin/assets/css/bootstrap.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{CustomAsset("admin/assets/css/jquery-ui.min.css")}}" rel="stylesheet">
    <link href="{{CustomAsset("admin/assets/css/icons.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{CustomAsset("admin/assets/css/metisMenu.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{CustomAsset("admin/assets/css/app.min.css")}}" rel="stylesheet" type="text/css" />

    <!-- Sweet Alert -->
    <link href="{{CustomAsset("admin/plugins/sweet-alert2/sweetalert2.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{CustomAsset("admin/plugins/animate/animate.css")}}" rel="stylesheet" type="text/css" />
    <!-- Dragula -->
    <link href="{{CustomAsset("admin/assets/css/dragula.min.css")}}" rel="stylesheet" type="text/css" />

    <!-- Own Style -->
    <link href="{{CustomAsset("admin/assets/css/style.css")}}" rel="stylesheet" type="text/css" />

    @yield('css')
</head>

<body>

@include('layouts.admin.includes.__header')

@include('layouts.admin.includes.__sidebar')


<div class="page-wrapper">
    <!-- Page Content-->
    <div class="page-content">

        <div class="container-fluid">
            @yield('content')
        </div><!-- container -->

       @include('layouts.admin.includes.__footer')
    </div>
    <!-- end page content -->
</div>
<!-- end page-wrapper -->




<!-- jQuery  -->
<script src="{{CustomAsset("admin/assets/js/jquery.min.js")}}"></script>
<script src="{{CustomAsset("admin/assets/js/bootstrap.bundle.min.js")}}"></script>
<script src="{{CustomAsset("admin/assets/js/metismenu.min.js")}}"></script>
<script src="{{CustomAsset("admin/assets/js/waves.js")}}"></script>
<script src="{{CustomAsset("admin/assets/js/feather.min.js")}}"></script>
<script src="{{CustomAsset("admin/assets/js/jquery.slimscroll.min.js")}}"></script>
<script src="{{CustomAsset("admin/assets/js/jquery-ui.min.js")}}"></script>

<script src="{{CustomAsset("admin/plugins/apexcharts/apexcharts.min.js")}}"></script>
<script src="{{CustomAsset("admin/plugins/moment/moment.js")}}"></script>
<script src="{{CustomAsset("admin/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js")}}"></script>
<script src="{{CustomAsset("admin/plugins/jvectormap/jquery-jvectormap-us-aea-en.js")}}"></script>
<script src="{{CustomAsset("admin/assets/pages/jquery.analytics_dashboard.init.js")}}"></script>

<!-- Sweet-Alert  -->
<script src="{{CustomAsset("admin/plugins/sweet-alert2/sweetalert2.min.js")}}"></script>
<script src="{{CustomAsset("admin/assets/pages/jquery.sweet-alert.init.js")}}"></script>

<!-- Dragula  -->
<script src="{{CustomAsset("admin/assets/js/dragula.min.js")}}"></script>
<script src="{{CustomAsset("admin/assets/js/jquery.dragula.init.js")}}"></script>

<!-- App js -->
<script src="{{CustomAsset('admin/assets/js/app.js')}}"></script>

@yield('js')



</body>

</html>
