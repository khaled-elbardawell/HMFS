<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>HMFS - Health Management & Follow-up System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{CustomAsset("front/assets/imgs/hmfs_logo_1.svg")}}">

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

<!-- Sweet-Alert  -->
<script src="{{CustomAsset("admin/plugins/sweet-alert2/sweetalert2.min.js")}}"></script>
<script src="{{CustomAsset("admin/assets/pages/jquery.sweet-alert.init.js")}}"></script>


<!-- App js -->
<script src="{{CustomAsset('admin/assets/js/app.js')}}"></script>
<script src="{{CustomAsset('js/app.js')}}"></script>

<script>
    function organizationMenu() {
        var el_current_organization =$(`[data-current-organization='true']`)
        if(el_current_organization){
            el_current_organization.css('background-color','#f0eded')
            var header_current_organization = $('.header-current-organization');
            header_current_organization.attr('href',el_current_organization.attr('href'))
            header_current_organization.html($(`[data-current-organization='true'] span`).text() + header_current_organization.html())
        }
    }

    organizationMenu()



    Echo.join('online')
        .here(users => {
            if( window.chats){
                window.chats.forEach((chat) => {
                    users.forEach((user) => {
                        if(chat.user_id == user.id){
                            $(`[data-user-id =  ${user.id}] .bg-success`).removeClass('d-none')
                        }
                    })
                })
            }


            @if(request()->has('chat_id') && request()->chat_id)
                setChatHeaderStatus()
            @endif
        })
        .joining(user => {
            if( window.chats) {
                window.chats.forEach((chat) => {
                    if (chat.user_id == user.id) {
                        $(`[data-user-id =  ${user.id}] .bg-success`).removeClass('d-none')
                    }
                })
            }

            @if(request()->has('chat_id') && request()->chat_id)
            setChatHeaderStatus()
            @endif
        })
        .leaving(user => {
            if( window.chats) {
                window.chats.forEach((chat) => {
                    if (chat.user_id == user.id) {
                        $(`[data-user-id =  ${user.id}] .bg-success`).addClass('d-none')
                    }
                })
            }

            @if(request()->has('chat_id') && request()->chat_id)
            setChatHeaderStatus()
            @endif
        });




    Echo.join('user.{{auth()->id()}}')
        .listen('.UserChatNotifyEvent', (e) => {
            var chat_box = $(`[data-user-id =  ${e.message.sender_id}]`)
            if(chat_box[0]) {
                sortChats(e.message.sender_id)
            }

         @if(!((request()->has('chat_id') && request()->chat_id)))
                const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        onOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })

                Toast.fire({
                    icon: 'success',
                    title: `New Message from ${e.message.sender.name}`
                })
          @endif

        });

</script>

@yield('js')



</body>

</html>
