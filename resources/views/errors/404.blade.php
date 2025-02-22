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

    <!-- App css -->
    <link href="{{CustomAsset("admin/assets/css/bootstrap.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{CustomAsset("admin/assets/css/jquery-ui.min.css")}}" rel="stylesheet">
    <link href="{{CustomAsset("admin/assets/css/icons.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{CustomAsset("admin/assets/css/metisMenu.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{CustomAsset("admin/assets/css/app.min.css")}}" rel="stylesheet" type="text/css" />

</head>

<body class="account-body accountbg">

<!-- Log In page -->
<div class="container">
    <div class="row vh-100 ">
        <div class="col-12 align-self-center">
            <div class="auth-page">
                <div class="card auth-card shadow-lg">
                    <div class="card-body">
                        <div class="px-3">
                            <div class="auth-logo-box">
                                <a href="{{url('/home')}}" class="logo logo-admin"><img src="{{CustomAsset('front/assets/imgs/hmfs_logo_1.svg')}}" height="70" alt="logo" class="auth-logo"></a>
                            </div><!--end auth-logo-box-->
                            <img src="{{CustomAsset('admin/assets/images/404.jpg')}}" alt="" class="d-block mx-auto mt-4" height="250">
                            <div class="text-center auth-logo-text mb-4">
                                <h4 class="mt-0 mb-3 mt-5">Looks like you've got lost...</h4>
                                <a href="{{url('/home')}}" class="btn btn-sm btn-gradient-primary">Back to Dashboard</a>
                            </div> <!--end auth-logo-text-->
                        </div><!--end /div-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end auth-page-->
        </div><!--end col-->
    </div><!--end row-->
</div><!--end container-->




<!-- jQuery  -->
<script src="{{CustomAsset("admin/assets/js/jquery.min.js")}}"></script>
<script src="{{CustomAsset("admin/assets/js/bootstrap.bundle.min.js")}}"></script>
<script src="{{CustomAsset("admin/assets/js/metismenu.min.js")}}"></script>
<script src="{{CustomAsset("admin/assets/js/waves.js")}}"></script>
<script src="{{CustomAsset("admin/assets/js/feather.min.js")}}"></script>
<script src="{{CustomAsset("admin/assets/js/jquery.slimscroll.min.js")}}"></script>
<script src="{{CustomAsset("admin/assets/js/jquery-ui.min.js")}}"></script>


<!-- App js -->
<script src="{{CustomAsset('admin/assets/js/app.js')}}"></script>

</body>

</html>
