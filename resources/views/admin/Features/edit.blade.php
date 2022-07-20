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
                        <li class="breadcrumb-item"><a href="{{route('features.index')}}">{{__('admin.Features')}}</a></li>
                        <li class="breadcrumb-item active">{{__('admin.Edit')}}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{__('admin.Features')}}</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->



    <?php  use App\Helpers\Builder; ?>

    {!! Builder::Form('PUT',route('features.update',[$feature->id]),"multipart/form-data") !!}
          <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        {!!   Builder::Input('text','key',$feature->key,['label_title' => 'admin.Key','use_trans' => true,'is_required' => true , 'col' => 'col-md-6']) !!}
                        {!!   Builder::Input('text','value',$feature->value,['label_title' => 'admin.Value','use_trans' => true,'is_required' => true , 'col' => 'col-md-6']) !!}
                    </div>
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->

        <div class="col-12 mt-2 mb-5">
            <button type="submit" class="btn btn-gradient-primary">Save</button>
            <button type="reset" class="btn btn-gradient-danger">Clear</button>
            <a href="{{route('features.index')}}" class="btn btn-gradient-info">Back</a>
        </div>
    </div><!--end row-->
    {!! Builder::EndForm() !!}
@endsection

@section('js')
    @include('components.alert-action')
    <script src="{{CustomAsset('admin/plugins/dropify/js/dropify.min.js')}}"></script>
    <script src="{{CustomAsset('admin/assets/pages/jquery.form-upload.init.js')}}"></script>
@endsection

