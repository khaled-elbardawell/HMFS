@extends('layouts.admin.master')


@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('admin.Home')}}</a></li>
                        <li class="breadcrumb-item active">{{__('admin.Organizations')}}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{__('admin.Organizations')}}</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    @can('organization.create')
                        <div class="mt-0 header-title">
                            <a href="{{route('organization.create')}}" class="btn btn-primary">New <i class="mdi mdi-plus"></i></a>
                        </div>
                    @endcan

                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{__('Admin.Name')}}</th>
                                <th>{{__('Admin.Status')}}</th>
                                <th>{{__('admin.Action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($organizations as $organization)
                                <tr>
                                    <td>{{$start_counter}}</td>
                                    <td>{{$organization->name}}</td>
                                    <td><span class="badge badge-{{$organization->status == 1 ? "success" : "danger" }}">{{$organization->status == 1 ? "Active" : "Not Active" }}</span></td>
                                    <td>
                                        @can('organization.edit')
                                          <a href="{{route('organization.edit',$organization->id)}}" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                        @endcan

                                       @can('organization.delete')
                                             <form name="delete" method="POST" action="{{route('organization.destroy',$organization->id)}}" style="display:inline-block;">
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
                {{$organizations->render()}}

            </div><!--end card-->
        </div> <!-- end col -->
    </div> <!-- end row -->

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
    </script>
@endsection


