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
                        <li class="breadcrumb-item active">{{__('admin.Create')}}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{__('admin.Users')}}</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->

    <form method="POST" action="{{route('users.store',request()->all())}}">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="email" class="text-right">{{__('admin.Email')}}</label>
                                    <div>
                                        <input @if(request()->has('user_exists') && request()->user_exists) disabled="true" @endif name="email" value="{{old('email',request()->email??null)}}" class="form-control" type="email" placeholder="{{__('admin.Email')}}" id="email">
                                        @error('email')
                                        <span class="invalid-feedback d-block" role="alert">
                                                   <strong>{{ $message }}</strong>
                                              </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            @if(!(request()->has('user_exists') && request()->user_exists))
                              <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name" class="text-right">{{__('admin.Name')}}</label>
                                    <div>
                                        <input name="name" class="form-control" type="text" placeholder="{{__('admin.Name')}}" id="name">
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
                                        <input name="phone" class="form-control" type="text" placeholder="{{__('admin.Phone')}}" id="phone">
                                        @error('phone')
                                              <span class="invalid-feedback d-block" role="alert">
                                                   <strong>{{ $message }}</strong>
                                              </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            @endif


                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="role_id" class="text-right">{{__('admin.Role')}}</label>
                                    <div>
                                        <select name="role_id" class="form-control" id="role_id">
                                            <option value="-1">Select Value..</option>
                                            @foreach($roles as $role)
                                                <option value="{{$role->id}}">{{$role->name}}</option>
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

                            @if(!(request()->has('user_exists') && request()->user_exists))
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="bio" class="text-right">{{__('admin.Bio')}}</label>
                                        <div>
                                            <textarea rows="5" class="form-control" name="bio" id="bio" placeholder="{{__('admin.Bio')}}"></textarea>
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
                                        <label for="password" class="text-right">{{__('admin.Password')}}</label>
                                        <div>
                                            <input name="password" class="form-control" type="password" placeholder="{{__('admin.Password')}}" id="password">
                                            @error('password')
                                                  <span class="invalid-feedback d-block" role="alert">
                                                       <strong>{{ $message }}</strong>
                                                  </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="password-confirm" class="text-right">{{__('admin.Confirm Password')}}</label>
                                    <div>
                                        <input name="password_confirmation" class="form-control" type="password" placeholder="{{__('admin.Confirm Password')}}" id="password-confirm">
                                    </div>
                                </div>

                            </div>
                            @endif

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="custom-control custom-switch switch-success">
                                        <input name="status" type="checkbox" class="custom-control-input" id="customSwitchSuccess" checked>
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


