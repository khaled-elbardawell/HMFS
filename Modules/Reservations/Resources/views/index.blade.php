@extends('layouts.admin.master')


@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('admin.Home')}}</a></li>
                        <li class="breadcrumb-item active">{{__('reservations::admin.Reservations')}}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{__('reservations::admin.Reservations')}}</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    @can('reservation.create')
                        <div class="mt-0 header-title">
                            <a href="{{route('reservations.create')}}" class="btn btn-primary">New <i class="mdi mdi-plus"></i></a>
                        </div>
                    @endcan

                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{__('reservations::admin.User_name')}}</th>
                                <th>{{__('reservations::admin.Doctor_name')}}</th>
                                <th>{{__('reservations::admin.Reservation_date')}}</th>
                                <th>{{__('reservations::admin.Reservation_time')}}</th>
                                <th>{{__('reservations::admin.Status')}}</th>
                                <th>{{__('reservations::admin.Action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                             <?php $badges = ['danger','success'] ?>
                            @foreach($reservations as $reservation)
                                <tr>
                                    <td>{{$start_counter}}</td>
                                    <td>{{$reservation->user->name}}</td>
                                    <td>{{$reservation->doctor->name}}</td>
                                    <td>{{$reservation->reservation_date}}</td>
                                    <td>{{$reservation->reservation_time}}</td>
                                    <td>

                                        <span class="badge badge-{{$badges[$reservation->status]}}">{{$reservation->status == 1 ? "Complete" : "Not Complete"}}</span>
                                    </td>

                                    <td>
                                            @can('reservation.edit')
                                              <a href="{{route('reservations.edit',$reservation->id)}}" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                            @endcan

                                             @can('reservation.delete')
                                                 <form name="delete" method="POST" action="{{route('reservations.destroy',$reservation->id)}}" style="display:inline-block;">
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
                {{$reservations->render()}}

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


