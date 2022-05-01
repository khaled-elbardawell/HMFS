<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Crovex - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

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

<!-- App js -->
<script src="{{CustomAsset('admin/assets/js/app.js')}}"></script>

@yield('js')



</body>

</html>
