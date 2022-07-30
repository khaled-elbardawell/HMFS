<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>HMFS - Health Management & Follow-up System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />


    <!-- App favicon -->
    <link rel="shortcut icon" href="{{CustomAsset("front/assets/imgs/hmfs_logo_1.svg")}}">



    <!-- App css -->
    <link href="{{CustomAsset("admin/assets/css/bootstrap.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{CustomAsset("admin/assets/css/jquery-ui.min.css")}}" rel="stylesheet">
    <link href="{{CustomAsset("admin/assets/css/icons.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{CustomAsset("admin/assets/css/metisMenu.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{CustomAsset("admin/assets/css/app.min.css")}}" rel="stylesheet" type="text/css" />


    @yield('css')
</head>

<body class="account-body accountbg">


@yield('content')




<!-- jQuery  -->
<script src="{{CustomAsset("admin/assets/js/jquery.min.js")}}"></script>
<script src="{{CustomAsset("admin/assets/js/jquery-ui.min.js")}}"></script>
<script src="{{CustomAsset("admin/assets/js/bootstrap.bundle.min.js")}}"></script>
<script src="{{CustomAsset("admin/assets/js/metismenu.min.js")}}"></script>
<script src="{{CustomAsset("admin/assets/js/waves.js")}}"></script>
<script src="{{CustomAsset("admin/assets/js/feather.min.js")}}"></script>
<script src="{{CustomAsset("admin/assets/js/jquery.slimscroll.min.js")}}"></script>


<!-- App js -->
<script src="{{CustomAsset('admin/assets/js/app.js')}}"></script>
<script src="{{CustomAsset('js/app.js')}}"></script>


@yield('js')



</body>

</html>
