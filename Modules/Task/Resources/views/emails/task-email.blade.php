
{{-- @extends('layouts.admin.master')
@section('content') --}}
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

        <!-- App css -->
        <link href="{{CustomAsset("admin/assets/css/bootstrap.min.css")}}" rel="stylesheet" type="text/css" />
        <link href="{{CustomAsset("admin/assets/css/jquery-ui.min.css")}}" rel="stylesheet">
        <link href="{{CustomAsset("admin/assets/css/icons.min.css")}}" rel="stylesheet" type="text/css" />
        <link href="{{CustomAsset("admin/assets/css/metisMenu.min.css")}}" rel="stylesheet" type="text/css" />
        <link href="{{CustomAsset("admin/assets/css/app.min.css")}}" rel="stylesheet" type="text/css" />

    </head>

    <body>
        <div class="page-wrapper">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="body-wrap" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: transparent; margin: 0;" bgcolor="transparent">
                                <tr>
                                    <td class="container" width="600" style=" display: block !important; max-width: 600px !important; clear: both !important; " valign="top">
                                        <div class="content" style="padding: 20px;">
                                            <table class="main" width="100%" cellpadding="0" cellspacing="0" style="border: 1px solid #e9e9e9;" bgcolor="#fff">

                                                <tr style="background: #1761fd;">
                                                    <td class="alert alert-primary border-0 bg-primary" style="padding: 20px; border-radius: 0;" align="center" valign="top">
                                                        <img src="{{CustomAsset("admin/assets/images/bell.png")}}" alt="" style="margin-left: auto; margin-right: auto; display:block;width: 60px;">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="alert alert-dark border-0" style="color:#ffffff; background-color: #212f56; padding: 20px; border-radius: 0;" align="center" valign="top">
                                                        Dear: {{$user->name}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="content-wrap" style="padding: 20px;" valign="top">
                                                        <table width="100%" cellpadding="0" cellspacing="0">
                                                            <tr>
                                                                <td class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; font-size: 14px; padding: 10px" valign="top">
                                                                    <strong style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">{{$task->name}}</strong>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; font-size: 14px; padding: 10px 10px 20px;" valign="top">
                                                                    {{$task->description}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; font-size: 14px; padding: 0 0 20px;" valign="top">
                                                                    <a href="{{route('task.index')}}" class="btn-gradient-primary" style=" font-size: 14px; text-decoration: none; line-height: 2em; font-weight: bold; text-align: center; cursor: pointer; display: block; border-radius: 5px; text-transform: capitalize; border: none; padding: 10px 20px; background: linear-gradient(14deg, #1761fd 0%, rgba(23,97,253,0.6)); color: #fff; box-shadow: 0 7px 14px 0 rgb(23 97 253 / 50%);">Show Tasks</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="content-block" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; font-size: 14px; text-align: center;" valign="top">
                                                                    <b>Deadline:</b> <small>{{$task->date_to}}</small>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                    <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
                                </tr>
                            </table><!--end table-->
                        </div><!--end col-->
                    </div><!--end row-->
                </div>
            </div>
        </div>
    </body>

</html>
{{-- @endsection --}}
