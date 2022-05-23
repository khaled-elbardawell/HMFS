@extends('layouts.admin.master')

@section('css')
    <link href="{{CustomAsset('admin/plugins/dropify/css/dropify.min.css')}}" rel="stylesheet">
@endsection


@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('admin.Home')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{route('organization.index')}}">{{__('admin.Organizations')}}</a></li>
                        <li class="breadcrumb-item active">{{__('admin.Create')}}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{__('admin.Organizations')}}</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->

    <form method="POST" action="{{route('organization.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Organization Information</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            {!!  Builder::Input('text','organization_name',null,['label_title' => 'admin.Name','use_trans' => true]) !!}

                           {!!   Builder::Input('text','country',null,['col' => 'col-lg-6','label_title' => 'admin.Country','use_trans' => true]) !!}

                           {!!   Builder::Input('text','city',null,['col' => 'col-lg-6','label_title' => 'admin.City','use_trans' => true]) !!}
                           {!!   Builder::Input('text','street',null,['col' => 'col-lg-6','label_title' => 'admin.Street','use_trans' => true]) !!}
                           {!!   Builder::Input('text','postal_code',null,['col' => 'col-lg-6','label_title' => 'admin.Postal code','use_trans' => true]) !!}
{{--                           {!!   Builder::Input('text','description',null,['label_title' => 'admin.Description','use_trans' => true]) !!}--}}



                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="description" class="text-right">{{__('admin.Description')}}</label>
                                    <div>
                                        <textarea rows="5" class="form-control" name="description" id="description" placeholder="{{__('admin.Description')}}">{{old('description')}}</textarea>
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
                                    <label for="description" class="text-right">{{__('admin.Logo')}}</label>
                                    <small class="d-block text-danger mb-3">Note: The file must be an image of type PNG, JPG and JPEG, the dimensions must be 100 X 20 px, and the maximum image size is 100MB</small>
                                    <div>
                                        <input  type="file" name="logo" id="input-file-now" class="dropify" />
                                        @error('logo')
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
                                        <input name="organization_status" type="checkbox" class="custom-control-input" id="organization_status" checked>
                                        <label class="custom-control-label" for="organization_status">{{__('admin.Status')}}</label>
                                        @error('organization_status')
                                        <span class="invalid-feedback d-block" role="alert">
                                                   <strong>{{ $message }}</strong>
                                              </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end col-->

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                      <strong>Owner Information</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="email" class="text-right">{{__('admin.Email')}}</label>
                                    <div>
                                        <input value="{{old('email')}}" name="email" class="form-control" type="email" placeholder="{{__('admin.Email')}}" id="email">
                                        @error('email')
                                        <span class="invalid-feedback d-block" role="alert">
                                                   <strong>{{ $message }}</strong>
                                              </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name" class="text-right">{{__('admin.Name')}}</label>
                                    <div>
                                        <input value="{{old('name')}}" name="name" class="form-control" type="text" placeholder="{{__('admin.Name')}}" id="name">
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
                                        <input value="{{old('phone')}}" name="phone" class="form-control" type="text" placeholder="{{__('admin.Phone')}}" id="phone">
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

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="bio" class="text-right">{{__('admin.Bio')}}</label>
                                    <div>
                                        <textarea  rows="5" class="form-control" name="bio" id="bio" placeholder="{{__('admin.Bio')}}">{{old('bio')}}</textarea>
                                        @error('bio')
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
                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end col-->

            <div class="col-12 mt-2 mb-5">
                    <button type="submit" class="btn btn-gradient-primary">Save</button>
                    <button type="reset" class="btn btn-gradient-danger">Clear</button>
                    <a href="{{route('organization.index')}}" class="btn btn-gradient-info">Back</a>
            </div>


        </div><!--end row-->
    </form>
@endsection

@section('js')
    <script src="{{CustomAsset('admin/plugins/dropify/js/dropify.min.js')}}"></script>
    <script src="{{CustomAsset('admin/assets/pages/jquery.form-upload.init.js')}}"></script>
@endsection


