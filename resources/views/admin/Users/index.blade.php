@extends('layouts.admin.master')


@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('admin.Home')}}</a></li>
                        <li class="breadcrumb-item active">{{__('admin.Users')}}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{__('admin.Users')}}</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    @can('users.create')
                        <button type="button" class="btn btn-primary" data-href="{{route('users.create',['organization_id' => request()->organization_id])}}" data-toggle="modal" data-target="#checkEmailModalCenter">
                            New <i class="mdi mdi-plus"></i>
                        </button>
                    @endcan

                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{__('Admin.Name')}}</th>
                                <th>{{__('Admin.Email')}}</th>
                                <th>{{__('Admin.Phone')}}</th>
                                <th>{{__('Admin.Status')}}</th>
                                <th>{{__('Admin.Last Login')}}</th>
                                <th>{{__('Admin.Registered_at')}}</th>
                                <th>{{__('admin.Action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$start_counter}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td><span class="badge badge-{{$user->status == 1 ? "success" : "danger" }}">{{$user->status == 1 ? "Active" : "Not Active" }}</span></td>
                                    <td><span class="badge badge-secondary">{{$user->last_login}}</span></td>
                                    <td><span class="badge badge-dark">{{$user->registered_at}}</span></td>
                                    <td>
                                        @can('users.edit')
                                          <a href="{{route('users.edit',[$user->id,'organization_id' => $user->organization_id])}}" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                        @endcan

                                       @can('users.delete')
                                             <form name="delete" method="POST" action="{{route('users.destroy',[$user->id,'organization_id' => $user->organization_id])}}" style="display:inline-block;">
                                               @csrf
                                               @method('delete')
                                                <button class="btn btn-sm btn-outline-none btn-table delete-btn"><i class="fas fa-trash-alt text-danger font-16"></i> </button>
                                             </form>
                                       @endcan
                                    </td>
                                </tr>
                                @php ++$start_counter; @endphp
                            @endforeach
                            </tbody>
                        </table><!--end /table-->
                    </div><!--end /tableresponsive-->
                </div><!--end card-body-->
                {!! $users->appends(request()->all())->links()!!}

            </div><!--end card-->
        </div> <!-- end col -->
    </div> <!-- end row -->




    <!-- Modal -->
    <div class="modal fade" id="checkEmailModalCenter" tabindex="-1" role="dialog" aria-labelledby="checkEmailModalCenter" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="email" class="text-right">{{__('admin.Email')}}</label>
                        <div>
                            <input name="email" class="form-control" type="email" placeholder="{{__('admin.Email')}}" id="email">
                            <span  class="invalid-feedback d-none email-validate-message" role="alert">
                                    <strong></strong>
                             </span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="check-email-btn" type="button" class="btn btn-primary">Check Email</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    @include('components.alert-action')

    <script>
        //custom html alert
        $('.delete-btn').click(function (event) {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                // text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    $(this).parent('form').submit();
                }
            })
        });

        // check email modal
        var lock = false;
        function checkEmail(){
            if(lock){ return; }
            let btn = $('#check-email-btn')
            btn.text('loading..')
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            let email = $("input[type='email']").val();

            lock = true
            $.ajax({
                type:'POST',
                url:"{{ route('users.check.email',['organization_id' => request()->organization_id]) }}",
                data:{email:email},
                success:function(data){
                    if(data.status == "success"){
                        $(".email-validate-message").addClass('d-none');
                        window.location.replace(data.redirect);
                        lock = false
                    }else{
                        lock = false
                        btn.text('Check Email')
                        $(".email-validate-message").removeClass('d-none');
                        $(".email-validate-message").addClass('d-block');
                        $(".email-validate-message strong").text(data.message);
                    }
                }
            });
        }
        $("#check-email-btn").click(function (event) {event.preventDefault();checkEmail()})

        $("input[type='email']").keypress(function (e) {if(e.which == 13) { checkEmail()}})
    </script>
@endsection


