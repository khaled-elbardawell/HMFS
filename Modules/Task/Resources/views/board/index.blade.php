@extends('layouts.admin.master')


@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('admin.Home')}}</a></li>
                        <li class="breadcrumb-item active">{{__('task::admin.Board')}}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{__('task::admin.Board')}}</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    @can('board.create')
                        <div class="mt-0 header-title">
                            <a href="{{route('board.create')}}" class="btn btn-primary">New <i class="mdi mdi-plus"></i></a>
                        </div>
                    @endcan

                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{__('task::admin.Name')}}</th>
                                {{-- <th>{{__('task::admin.Organization')}}</th> --}}
                                <th>{{__('task::admin.Action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($boards as $board)
                                <tr>
                                    <td>{{$start_counter}}</td>
                                    <td>
                                        <a href="{{route('task.index',['board_id' => $board->id])}}">
                                            {{$board->name}}
                                        </a>
                                    </td>
                                    <td>
                                        @can('board.edit')
                                            <a href="{{route('board.edit',$board->id)}}" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                        @endcan

                                        @can('board.delete')
                                            <form name="delete" method="POST" action="{{route('board.destroy',$board->id)}}" style="display:inline-block;">
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
                {{$boards->render()}}

            </div><!--end card-->
        </div> <!-- end col -->
    </div> <!-- end row -->

@endsection

@section('js')
    @include('components.alert-action')
@endsection


