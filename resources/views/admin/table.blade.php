@extends('layouts.admin.master')

@section('css')

@endsection


@section('content')
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Crovex</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">UI Kit</a></li>
                            <li class="breadcrumb-item active">Tables</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Basic Tables</h4>
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div>
        <!-- end page title end breadcrumb -->


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <div class="mt-0 header-title">
                            <a href="#" class="btn btn-primary">New <i class="mdi mdi-plus"></i></a>
                            <a href="#" class="btn btn-danger">Trash <i class="mdi mdi-trash-can-outline"></i></a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{__('role::admin.Name')}}</th>
                                    <th>{{__('role::admin.Permissions')}}</th>
                                    <th>{{__('role::admin.Action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Admain</td>
                                    <td>
                                        <span class="badge badge-success p-1">list roles</span>
                                    </td>
                                    <td>
                                        <a href="#" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                        <a href="#"><i class="fas fa-trash-alt text-danger font-16"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Admain</td>
                                    <td>list crete edit</td>
                                    <td>
                                        <a href="#" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                        <a href="#"><i class="fas fa-trash-alt text-danger font-16"></i></a>
                                    </td>
                                </tr>
                                </tbody>
                            </table><!--end /table-->
                        </div><!--end /tableresponsive-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!-- end col -->
        </div> <!-- end row -->
@endsection


@section('js')


@endsection
