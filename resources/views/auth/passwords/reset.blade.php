@extends('layouts.admin.auth')

@section('content')
    <div class="container">
        <div class="row vh-100 ">
            <div class="col-12 align-self-center">
                <div class="auth-page">
                    <div class="card auth-card shadow-lg">
                        <div class="card-body">
                            <div class="px-3">
                                <div class="auth-logo-box">
                                    <a href="../dashboard/analytics-index.html" class="logo logo-admin"><img src="{{CustomAsset('admin/assets/images/logo-sm.png')}}" height="55" alt="logo" class="auth-logo"></a>
                                </div><!--end auth-logo-box-->

                                <div class="text-center auth-logo-text">
                                    <h4 class="mt-0 mb-3 mt-5">Reset Password For Crovex</h4>
                                    <p class="text-muted mb-0">Enter your Email and instructions will be sent to you!</p>
                                </div> <!--end auth-logo-text-->

                                @if (session('status'))
                                    <div class="alert alert-success my-2" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <form class="form-horizontal auth-form my-4" method="POST" action="{{ route('password.update') }}">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $token }}">

                                    <div class="form-group">
                                        <label for="useremail">{{ __('E-Mail Address') }}</label>
                                        <div class="input-group mb-3">
                                                <span class="auth-form-icon">
                                                    <i class="dripicons-mail"></i>
                                                </span>
                                            <input type="email" class="form-control" id="useremail" placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ $email ?? old('email') }}">
                                            @error('email')
                                            <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div><!--end form-group-->

                                    <div class="form-group">
                                        <label for="userpassword">{{ __('Password') }}</label>
                                        <div class="input-group mb-3">
                                                <span class="auth-form-icon">
                                                    <i class="dripicons-lock"></i>
                                                </span>
                                            <input type="password" name="password" class="form-control" id="userpassword" placeholder="{{ __('Password') }}">
                                            @error('password')
                                            <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div><!--end form-group-->


                                    <div class="form-group">
                                        <label for="userpassword">{{ __('Confirm Password') }}</label>
                                        <div class="input-group mb-3">
                                                <span class="auth-form-icon">
                                                    <i class="dripicons-lock"></i>
                                                </span>
                                            <input type="password" name="password_confirmation" class="form-control" id="userpassword" placeholder="{{ __('Confirm Password') }}">
                                        </div>
                                    </div><!--end form-group-->


                                    <div class="form-group mb-0 row">
                                        <div class="col-12 mt-2">
                                            <button class="btn btn-gradient-primary btn-round btn-block waves-effect waves-light" type="submit">Reset <i class="fas fa-sign-in-alt ml-1"></i></button>
                                        </div><!--end col-->
                                    </div> <!--end form-group-->
                                </form><!--end form-->
                            </div><!--end /div-->

                            <div class="m-3 text-center text-muted">
                                <p class="">Remember It ?  <a href="{{url('login')}}" class="text-primary ml-2">Login in here</a></p>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!--end auth-page-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->

@endsection

