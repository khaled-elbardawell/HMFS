@extends('layouts.admin.master')


@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('admin.Home')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{route('departments.index')}}">{{__('admin.Departments')}}</a></li>
                        <li class="breadcrumb-item active">{{__('admin.Edit')}}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{__('admin.Departments')}}</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->



    <?php  use App\Helpers\Builder; ?>

    {!! Builder::Form('PUT',route('departments.update',[$department->id])) !!}
          <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        {!!   Builder::Input('text','name',$department->name,['label_title' => 'admin.Name','use_trans' => true,'is_required' => true]) !!}
                        {!!   Builder::TextArea('description',$department->description,['label_title' => 'admin.Description','use_trans' => true]) !!}
                    </div>
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->


        <div class="col-12 mt-2 mb-5">
            <button type="submit" class="btn btn-gradient-primary">Save</button>
            <button type="reset" class="btn btn-gradient-danger">Clear</button>
            <a href="{{route('departments.index')}}" class="btn btn-gradient-info">Back</a>
        </div>
    </div><!--end row-->
    {!! Builder::EndForm() !!}
@endsection



@section('js')
    @include('components.alert-action')
@endsection


