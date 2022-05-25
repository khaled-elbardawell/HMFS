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

<form class="form-horizontal form-material mb-0" method="POST" action="{{route('updateProfile')}}">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body met-pro-bg">
                    <div class="met-profile">
                        <div class="row" style="align-items: center;justify-content: space-around;">
                            <div class="col-lg-4 align-self-center mb-3 mb-lg-0">
                                <div class="met-profile-main" style="justify-content: center;flex-direction: column;">
                                    <div class="met-profile-main-pic m-0">
                                        @if (!is_null($user->upload))
                                            {{-- <img src="{{CustomAsset('admin/assets/images/users/user-1.png')}}" alt="profile-user" class="rounded-circle" /> --}}
                                        @else
                                            <img src="{{CustomAsset('admin/assets/images/users/user-1.png')}}" alt="profile-user" class="rounded-circle" />
                                        @endif
                                        <span class="fro-profile_main-pic-change">
                                            {!!  Builder::FileDropify('image_profile',null,['id' => 'image_profile','use_trans' => true,'is_required' => true]) !!}
                                            <i class="fas fa-camera"></i>
                                        </span>
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
                                {{-- <div class="button-list btn-social-icon">
                                    <button type="button" class="btn btn-blue btn-circle">
                                        <i class="fab fa-facebook-f"></i>
                                    </button>

                                    <button type="button" class="btn btn-secondary btn-circle ml-2">
                                        <i class="fab fa-twitter"></i>
                                    </button>

                                    <button type="button" class="btn btn-pink btn-circle  ml-2">
                                        <i class="fab fa-dribbble"></i>
                                    </button>
                                </div> --}}
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
                            <input name="confirm__password" type="password" placeholder="Re-password" class="form-control">
                            @error('confirm__password')
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

</form>

@endsection

@section('js')
    @include('components.alert-action')
@endsection
