@extends('layouts.admin.master')

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('admin.Home')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{route('users.index')}}">{{__('admin.Users')}}</a></li>
                        <li class="breadcrumb-item active">{{__('admin.Edit')}}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{__('admin.Users')}}</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->


    <form method="POST" action="{{route('users.update',[$user->user_id,'organization_id' => $user->organization_id])}}">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="email" class="text-right">{{__('admin.Email')}}</label>
                                    <div>
                                        <input name="email" class="form-control" type="email" placeholder="{{__('admin.Email')}}" value="{{$user->email}}" disabled="true"  id="email">
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name" class="text-right">{{__('admin.Name')}}</label>
                                    <div>
                                        <input name="name" class="form-control" type="text" placeholder="{{__('admin.Name')}}" value="{{$user->name}}"  id="name">
                                        @error('name')
                                        <span class="invalid-feedback d-block" role="alert">
                                                   <strong>{{ $message }}</strong>
                                              </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="phone" class="text-right">{{__('admin.Phone')}}</label>
                                    <div>
                                        <input name="phone" class="form-control" type="text" placeholder="{{__('admin.Phone')}}" value="{{$user->phone}}"  id="phone">
                                        @error('phone')
                                        <span class="invalid-feedback d-block" role="alert">
                                                   <strong>{{ $message }}</strong>
                                              </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="role_id" class="text-right">{{__('admin.Role')}}</label>
                                    <div>
                                        <select name="role_id" class="form-control" id="role_id">
                                            <option value="-1">Select Value..</option>
                                            @foreach($roles as $role)
                                                <option @if($user_role && $user_role->role_id == $role->id ) selected @endif value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('role_id')
                                        <span class="invalid-feedback d-block" role="alert">
                                                   <strong>{{ $message }}</strong>
                                              </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>


                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="bio" class="text-right">{{__('admin.Bio')}}</label>
                                    <div>
                                        <textarea rows="5" class="form-control" name="bio" id="bio" placeholder="{{__('admin.Bio')}}">{{$user->bio}}</textarea>
                                        @error('bio')
                                        <span class="invalid-feedback d-block" role="alert">
                                                   <strong>{{ $message }}</strong>
                                              </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch switch-success">
                                        <input name="status" type="checkbox" class="custom-control-input" id="customSwitchSuccess"  @if($user->status) checked @endif>
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
                            <a href="{{route('users.index',['organization_id' => request()->organization_id])}}" class="btn btn-gradient-info">Back</a>
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


