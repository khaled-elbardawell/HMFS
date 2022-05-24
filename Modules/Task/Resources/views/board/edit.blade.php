@extends('layouts.admin.master')

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('admin.Home')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{route('board.index')}}">{{__('task::admin.Boards')}}</a></li>
                        <li class="breadcrumb-item active">{{__('task::admin.Edit')}}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{__('task::admin.Boards')}}</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->

    <form method="POST" action="{{route('board.update',$board->id)}}">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <input type="hidden" name="org_id" value="{{session()->get('organization_id')}}">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="text-right">{{__('task::admin.Name')}}</label>
                                    <div>
                                        <input name="name" class="form-control" type="text" placeholder="{{__('task::admin.Name')}}" value="{{$board->name}}" id="example-text-input">
                                        @error('name')
                                              <span class="invalid-feedback d-block" role="alert">
                                                   <strong>{{ $message }}</strong>
                                              </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-gradient-primary">Update</button>
                            <button type="reset" class="btn btn-gradient-danger">Clear</button>
                            <a href="{{route('board.index')}}" class="btn btn-gradient-info">Back</a>
                        </div>

                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end col-->
        </div><!--end row-->
    </form>
@endsection


@section('js')
    @include('components.alert-action')
@endsection


