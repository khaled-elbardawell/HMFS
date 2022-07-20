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
                        <li class="breadcrumb-item"><a href="{{route('offers.index')}}">{{__('admin.Offers')}}</a></li>
                        <li class="breadcrumb-item active">{{__('admin.Edit')}}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{__('admin.Offers')}}</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->



    <?php  use App\Helpers\Builder; ?>

    {!! Builder::Form('PUT',route('offers.update',[$offer->id]),"multipart/form-data") !!}
          <div class="row">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        {!!   Builder::Input('text','name',$offer->name,['label_title' => 'admin.Name','use_trans' => true,'is_required' => true , 'col' => 'col-md-12']) !!}
                        {!!   Builder::TextArea('description',$offer->description,['label_title' => 'admin.Description','use_trans' => true , 'col' => 'col-md-12']) !!}
                    </div>
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->

        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h6>{{__('admin.Features')}}</h6>
                        </div>
                        @foreach ($features as $feature)


                                <div class="col-md-12 check">
                                    <div class="form-group">
                                        <label for="feature-{{$feature->key}}" class="text-right">
                                            {{$feature->key}} <span class="text-danger">*</span>
                                        </label>
                                        <div>
                                            <input name="features[]" type="checkbox" value="{{$feature->id}}" class="form-control" placeholder="{{$feature->key}} *" id="feature-{{$feature->key}}" @foreach ($offer_features as $offer_feature) @if($feature->id == $offer_feature->feature_id) checked @endif  @endforeach>
                                        </div>
                                    </div>
                                </div>



                            {{-- {!! Builder::Input('checkbox','feature',null,['label_title' => $feature->key,'is_required' => true , 'col' => 'col-md-12 check']) !!} --}}

                        @endforeach

                    </div>
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->

        <div class="col-12 mt-2 mb-5">
            <button type="submit" class="btn btn-gradient-primary">Save</button>
            <button type="reset" class="btn btn-gradient-danger">Clear</button>
            <a href="{{route('offers.index')}}" class="btn btn-gradient-info">Back</a>
        </div>
    </div><!--end row-->
    {!! Builder::EndForm() !!}
@endsection

@section('js')
    @include('components.alert-action')
    <script src="{{CustomAsset('admin/plugins/dropify/js/dropify.min.js')}}"></script>
    <script src="{{CustomAsset('admin/assets/pages/jquery.form-upload.init.js')}}"></script>
@endsection

