@extends('layouts.admin.master')


@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('admin.Home')}}</a></li>
                        <li class="breadcrumb-item active">{{__('task::admin.Tasks')}}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{__('task::admin.Tasks')}}</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row task-board">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row" style="overflow-x: auto; flex-wrap: nowrap;">
                        <div class="col-md-3 col-12">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary add-board-tasks" data-toggle="modal" data-target="#board">Add Column</button>

                            @error('board_name')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            @isset($board)
                                @dd('The Board Is Not Exist')
                            @else
                                @include('task::modal-board')
                            @endisset



                        </div>
                        @foreach ($boards as $board)
                            @php
                                $board_name = str_replace(' ', '_', $board->name);
                                $board_modal = "board";
                            @endphp

                            @isset($board)
                                @php
                                    $board_modal = "board_".$board->id;
                                @endphp
                            @endisset

                            @include('task::modal-board',["board"=> $board , "board_modal"=> $board_modal])
                            @include('task::board-col',["post_type"=> $board_name , "board_modal"=> $board_modal])
                        @endforeach
                    </div><!--end row-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
    </div><!--end row-->

@endsection

@section('js')
    @include('components.alert-action')
    {{-- <script>
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
    </script> --}}
@endsection
