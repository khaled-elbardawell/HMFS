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
                    <div class="row">
                        @include('task::board-col',['post_type'=> 'to-do'])
                        @include('task::board-col',['post_type'=> 'in-progress'])
                        @include('task::board-col',['post_type'=> 'code-review'])
                        @include('task::board-col',['post_type'=> 'done'])
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
