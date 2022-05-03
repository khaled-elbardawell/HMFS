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

                        <h4 class="mt-0 header-title">Striped rows</h4>
                        <p class="text-muted mb-3">
                            Use <code>.table-striped</code> to add zebra-striping to any table row
                            within the <code>&lt;tbody&gt;</code>.
                        </p>

                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th>Customer</th>
                                    <th>Email</th>
                                    <th>Contact No</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><img src="../assets/images/users/user-3.jpg" alt="" class="rounded-circle thumb-sm mr-1"> Aaron Poulin</td>
                                    <td>AaronPoulin@example.com</td>
                                    <td>+21 21547896</td>
                                    <td>
                                        <a href="#" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                        <a href="#"><i class="fas fa-trash-alt text-danger font-16"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><img src="../assets/images/users/user-4.jpg" alt="" class="rounded-circle thumb-sm mr-1"> Richard Ali</td>
                                    <td>RichardAli@example.com</td>
                                    <td>+41 21547896</td>
                                    <td>
                                        <a href="#" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                        <a href="#"><i class="fas fa-trash-alt text-danger font-16"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><img src="../assets/images/users/user-5.jpg" alt="" class="rounded-circle thumb-sm mr-1"> Juan Clark</td>
                                    <td>JuanClark@example.com</td>
                                    <td>+65 21547896</td>
                                    <td>
                                        <a href="#" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                        <a href="#"><i class="fas fa-trash-alt text-danger font-16"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><img src="../assets/images/users/user-6.jpg" alt="" class="rounded-circle thumb-sm mr-1"> Albert Hull</td>
                                    <td>AlbertHull@example.com</td>
                                    <td>+88 21547896</td>
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
