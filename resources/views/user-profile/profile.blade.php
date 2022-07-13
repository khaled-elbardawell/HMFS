@extends('layouts.admin.master')

@section('css')
    <link href="{{CustomAsset('admin/plugins/dropify/css/dropify.min.css')}}" rel="stylesheet">
@endsection

@section('content')

<?php  use App\Helpers\Builder; ?>

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="float-right">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Crovex</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div>
            <h4 class="page-title">Profile</h4>
        </div><!--end page-title-box-->
    </div><!--end col-->
</div>
<!-- end page title end breadcrumb -->



{!! Builder::Form('POST',route('updateProfile'),"multipart/form-data") !!}


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body met-pro-bg">
                    <div class="met-profile">
                        <div class="row" style="align-items: center;justify-content: space-around;">
                            <div class="col-lg-4 align-self-center mb-3 mb-lg-0">
                                <div class="met-profile-main" style="justify-content: center;flex-direction: column;">
                                    <div class="met-profile-main-pic m-0">

                                        @php
                                            if($user->upload->file != null){
                                                $url = CustomAsset('upload/images/full/'.$user->upload->file);
                                            }else{
                                                $url = null;
                                            }
                                        @endphp

                                        {{-- @if (!is_null($user->upload))
                                            <img src="{{$url}}" alt="profile-user" class="rounded-circle" />
                                        @else
                                            <img src="{{CustomAsset('admin/assets/images/users/user-1.png')}}" alt="profile-user" class="rounded-circle" />
                                        @endif --}}


                                        {!!  Builder::FileDropify('image_profile',null,['id' => 'image_profile','use_trans' => true,'is_required' => true]) !!}

                                    </div>
                                    <div class="met-profile_user-detail text-center">
                                        <h5 class="met-user-name">{{$user->name}}</h5>
                                        <p class="mb-0 met-user-name-post">UI/UX Designer</p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-4">
                                <ul class="list-unstyled personal-detail">
                                    <li class=""><i class="dripicons-phone mr-2 text-info font-18"></i> <b> phone </b> : {{$user->phone}}</li>
                                    <li class="mt-2"><i class="dripicons-mail text-info font-18 mt-2 mr-2"></i> <b> Email </b> : {{$user->email}}</li>
                                    <li class="mt-2"><i class="dripicons-location text-info font-18 mt-2 mr-2"></i> <b>Location</b> : USA</li>
                                </ul>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end f_profile-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
    </div><!--end row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <input name="name" type="text" placeholder="Full Name" class="form-control" value="{{$user->name??null}}">
                            @error('name')
                                <div class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        {{-- {!!   Builder::Input('text','name',null,['col'=>'col-md-6' , 'label_title'=>'admin.Name']) !!} --}}

                        <div class="col-md-6">
                            <input name="email" type="email" placeholder="Email" class="form-control" value="{{$user->email??null}}">
                            @error('email')
                                <div class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <input name="password" type="password" placeholder="password" class="form-control">
                            @error('password')
                                <div class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <input name="password_confirmation" type="password" placeholder="Re-password" class="form-control">
                            @error('password_confirmation')
                                <div class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <input name="phone" type="text" placeholder="Phone No" class="form-control" value="{{$user->phone??null}}">
                            @error('phone')
                                <div class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <textarea name="bio" rows="5" placeholder="Bio" class="form-control"> {{$user->bio??null}}</textarea>
                        @error('bio')
                            <div class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button class="btn btn-gradient-primary btn-sm px-4 mt-3 float-right mb-0">Update Profile</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

{!! Builder::EndForm() !!}

@endsection


@section('js')
    @include('components.alert-action')
    <script src="{{CustomAsset('admin/plugins/dropify/js/dropify.min.js')}}"></script>
    <script src="{{CustomAsset('admin/assets/pages/jquery.form-upload.init.js')}}"></script>
@endsection
