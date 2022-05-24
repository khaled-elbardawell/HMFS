@extends('layouts.admin.master')

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('admin.Home')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{route('role.index')}}">{{__('role::admin.Roles')}}</a></li>
                        <li class="breadcrumb-item active">{{__('role::admin.Create')}}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{__('role::admin.Roles')}}</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->

    <form method="POST" action="{{route('role.store')}}">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="text-right">{{__('role::admin.Name')}}</label>
                                    <div>
                                        <input name="name" class="form-control" type="text" placeholder="{{__('role::admin.Name')}}" id="example-text-input">
                                        @error('name')
                                              <span class="invalid-feedback d-block" role="alert">
                                                   <strong>{{ $message }}</strong>
                                              </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group mb-0">
                                    <label class="my-2 control-label">{{__('role::admin.Permissions')}}</label>
                                    <div>
                                        @foreach($permissions as $permission)
                                            <div class="form-check-inline my-2">
                                                <div class="custom-control custom-checkbox">
                                                    <input name="permissions[]" value="{{$permission->id}}" type="checkbox" class="custom-control-input" id="permission_{{$permission->id}}" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                    <label class="custom-control-label" for="permission_{{$permission->id}}">{{$permission->title}}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    @error('permissions')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div><!--end row-->
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-gradient-primary">Save</button>
                            <button type="reset" class="btn btn-gradient-danger">Clear</button>
                            <a href="{{route('role.index')}}" class="btn btn-gradient-info">Back</a>
                        </div>

                    </div><!--end card-body-->
                </div><!--end card-->


            </div><!--end col-->


        </div><!--end row-->
    </form>
@endsection


