@extends('layouts.admin.master')


@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('admin.Home')}}</a></li>
                        <li class="breadcrumb-item active">{{__('admin.Departments')}}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{__('admin.Departments')}}</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    @can('departments.create')
                        <div class="mt-0 header-title">
                            <a href="{{route('departments.create')}}" class="btn btn-primary">New <i class="mdi mdi-plus"></i></a>
                        </div>
                    @endcan

                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{__('Admin.Name')}}</th>
                                <th>{{__('admin.Action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($departments as $department)
                                <tr>
                                    <td>{{$start_counter}}</td>
                                    <td>{{$department->name}}</td>
                                    <td>
                                        @can('departments.edit')
                                          <a href="{{route('departments.edit',$department->id)}}" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                        @endcan

                                       @can('departments.delete')
                                             <form name="delete" method="POST" action="{{route('departments.destroy',$department->id)}}" style="display:inline-block;">
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
                {{$departments->render()}}

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


