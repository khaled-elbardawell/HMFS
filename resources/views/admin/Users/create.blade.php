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

    <?php  use App\Helpers\Builder; ?>

    {!! Builder::Form('POST',route('users.store',request()->all())) !!}
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <?php  request()->has('user_exists') && request()->user_exists ? $disabled =true : $disabled = false ?>
                            {!!  Builder::Input('email','email',request()->email??null,['col' => 'col-lg-6','disabled' => $disabled,'label_title' => 'admin.Email','use_trans' => true,'is_required' => true]) !!}



                            @if(!(request()->has('user_exists') && request()->user_exists))
                                  {!!  Builder::Input('text','name',null,['col' => 'col-lg-6','label_title' => 'admin.Name','use_trans' => true,'is_required' => true]) !!}
                                  {!!  Builder::Input('text','phone',null,['col' => 'col-lg-6','label_title' => 'admin.Phone','use_trans' => true]) !!}
                            @endif


                            {!! Builder::Select('role_id',null,$roles,['col' => 'col-lg-3','option_title' => 'name','option_key_value' => 'id','label_title' => 'admin.Role','use_trans' => true,'is_required' => true]) !!}
                            {!! Builder::Select('department_id',null,$departments,['col' => 'col-lg-3','option_title' => 'name','option_key_value' => 'id','label_title' => 'admin.Department','use_trans' => true]) !!}



                            @if(!(request()->has('user_exists') && request()->user_exists))
                                    {!!  Builder::TextArea('bio',null,['rows' => 5 ,'label_title' => 'admin.Bio','use_trans' => true]) !!}
                                    {!!  Builder::Input('password','password',null,['col' => 'col-lg-6','label_title' => 'admin.Password','use_trans' => true,'is_required' => true]) !!}
                                    {!!  Builder::Input('password','password_confirmation',null,['col' => 'col-lg-6','label_title' => 'admin.Confirm Password','use_trans' => true,'is_required' => true]) !!}
                            @endif


                            {!!  Builder::SwitchCheckBox('status',false,['id' => 'customSwitchSuccess','label_title' => 'admin.Status','use_trans' => true]) !!}
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
  {!! Builder::EndForm() !!}
@endsection


