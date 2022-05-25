@extends('layouts.admin.master')

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('admin.Home')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{route('organization.index')}}">{{__('admin.Organizations')}}</a></li>
                        <li class="breadcrumb-item active">{{__('admin.Edit')}}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{__('admin.Organizations')}}</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->


        <?php  use App\Helpers\Builder; ?>
        {!! Builder::Form('PUT',route('organization.update',$organization->id)) !!}
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="text-right">{{__('admin.Name')}}</label>
                                    <div>
                                        <input name="name" class="form-control" type="text" placeholder="{{__('admin.Name')}}" value="{{$organization->name}}"  id="example-text-input">
                                        @error('name')
                                        <span class="invalid-feedback d-block" role="alert">
                                                   <strong>{{ $message }}</strong>
                                              </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="description" class="text-right">{{__('admin.Description')}}</label>
                                    <div>
                                        <textarea rows="5" class="form-control" name="description" id="description" placeholder="{{__('admin.Description')}}">{{$organization->description}}</textarea>
                                        @error('description')
                                        <span class="invalid-feedback d-block" role="alert">
                                                   <strong>{{ $message }}</strong>
                                              </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="custom-control custom-switch switch-success">
                                        <input name="status" type="checkbox" class="custom-control-input" id="customSwitchSuccess"  @if($organization->status) checked @endif>
                                        <label class="custom-control-label" for="customSwitchSuccess">{{__('admin.Status')}}</label>
                                        @error('status')
                                        <span class="invalid-feedback d-block" role="alert">
                                                   <strong>{{ $message }}</strong>
                                              </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>


                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-gradient-primary">Save</button>
                            <button type="reset" class="btn btn-gradient-danger">Clear</button>
                            <a href="{{route('organization.index')}}" class="btn btn-gradient-info">Back</a>
                        </div>

                    </div><!--end card-body-->
                </div><!--end card-->


            </div><!--end col-->


        </div><!--end row-->
@endsection


@section('js')
    @include('components.alert-action')
@endsection


