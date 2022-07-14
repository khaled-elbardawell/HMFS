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
                        <li class="breadcrumb-item"><a href="{{route('health-profile.index',['user_id' => request()->user_id])}}">{{__('admin.HealthProfile')}}</a></li>
                        <li class="breadcrumb-item active">{{__('admin.Create')}}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{__('admin.HealthProfile')}}</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->

       <?php  use App\Helpers\Builder; ?>

        {!! Builder::Form('POST',route('health-profile.store',['user_id' => request()->user_id]),"multipart/form-data") !!}
           <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">

                           {!!  Builder::Input('email','email',$userOrganization->user->email,['col' => 'col-lg-6','disabled' => true,'label_title' => 'admin.Email','use_trans' => true]) !!}
                           {!!  Builder::Input('name','name',$userOrganization->user->name,['col' => 'col-lg-6','disabled' => true,'label_title' => 'admin.Name','use_trans' => true]) !!}

                           {!!   Builder::Input('text','title',null,['col' => 'col-lg-6','label_title' => 'admin.Title','use_trans' => true,'is_required' => true]) !!}
                           {!!  Builder::Select('doctor_id',null,$doctors,['col' => 'col-lg-6','option_title' =>  'name','option_key_value' => 'id','label_title' => 'reservations::admin.Doctor_name','use_trans' => true,'is_required' => true])  !!}

                           {!!   Builder::TextArea('description',null,['label_title' => 'admin.Description','use_trans' => true,'is_required' => true]) !!}
                           {!!   Builder::TextArea('recommendations',null,['label_title' => 'admin.Recommendations','use_trans' => true]) !!}
                           {!!   Builder::TextArea('requests',null,['label_title' => 'admin.Requests','use_trans' => true]) !!}
                           {!!   Builder::FileDropify('attachments[]',['multiple' => true,'id' => 'attachments','label_title' => 'admin.Attachments','use_trans' => true,'note' => 'Note: You can upload multiple files']) !!}

                        </div>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end col-->


            <div class="col-12 mt-2 mb-5">
                    <button type="submit" class="btn btn-gradient-primary">Save</button>
                    <button type="reset" class="btn btn-gradient-danger">Clear</button>
                    <a href="{{route('health-profile.index',['user_id' => request()->user_id])}}" class="btn btn-gradient-info">Back</a>
            </div>
        </div><!--end row-->
        {!! Builder::EndForm() !!}
@endsection


@section('js')
    <script src="{{CustomAsset('admin/plugins/dropify/js/dropify.min.js')}}"></script>
    <script src="{{CustomAsset('admin/assets/pages/jquery.form-upload.init.js')}}"></script>
@endsection
