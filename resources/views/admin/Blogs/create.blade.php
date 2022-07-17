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
                        <li class="breadcrumb-item"><a href="{{route('blogs.index')}}">{{__('admin. Blogs')}}</a></li>
                        <li class="breadcrumb-item active">{{__('admin.Create')}}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{__('admin. Blogs')}}</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->

       <?php  use App\Helpers\Builder; ?>

        {!! Builder::Form('POST',route('blogs.store'),"multipart/form-data") !!}
           <div class="row">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                           {!!   Builder::Input('text','title',null,['label_title' => 'admin.Title','use_trans' => true,'is_required' => true]) !!}
                           {!!   Builder::TextArea('excerpt',null,['label_title' => 'admin.Excerpt','use_trans' => true]) !!}
                           {!!   Builder::TextArea('description',null,['label_title' => 'admin.Description','use_trans' => true]) !!}
                        </div>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end col-->
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            {!!   Builder::FileDropify('logo',['id' => 'logo','label_title' => 'admin.Logo','use_trans' => true,'is_required' => true,'note' => 'Note: The file must be an image of type PNG, JPG and JPEG, the dimensions must be 100 X 20 px, and the maximum image size is 100MB']) !!}
                        </div>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end col-->


            <div class="col-12 mt-2 mb-5">
                    <button type="submit" class="btn btn-gradient-primary">Save</button>
                    <button type="reset" class="btn btn-gradient-danger">Clear</button>
                    <a href="{{route('blogs.index')}}" class="btn btn-gradient-info">Back</a>
            </div>
        </div><!--end row-->
        {!! Builder::EndForm() !!}
@endsection

@section('js')
    <script src="{{CustomAsset('admin/plugins/dropify/js/dropify.min.js')}}"></script>
    <script src="{{CustomAsset('admin/assets/pages/jquery.form-upload.init.js')}}"></script>
@endsection
