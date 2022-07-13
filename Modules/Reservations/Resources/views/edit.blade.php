@extends('layouts.admin.master')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection


@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('admin.Home')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{route('reservations.index')}}">{{__('reservations::admin.Reservations')}}</a></li>
                        <li class="breadcrumb-item active">{{__('reservations::admin.Edit')}}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{__('reservations::admin.Reservations')}}</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->

    <?php  use App\Helpers\Builder; ?>


    {!! Builder::Form('PUT',route('reservations.update',$reservation->id)) !!}
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            {!!  Builder::Input('date','reservation_date',$reservation->reservation_date,['col' => 'col-lg-6','label_title' => 'reservations::admin.Reservation_date','use_trans' => true,'is_required' => true]) !!}
                            {!!  Builder::Input('time','reservation_time',$reservation->reservation_time,['col' => 'col-lg-6','label_title' => 'reservations::admin.Reservation_time','use_trans' => true,'is_required' => true]) !!}
                            {!!  Builder::SwitchCheckBox('status',$reservation->status == 1,['id' => 'customSwitchSuccess','label_title' => 'admin.Status','use_trans' => true]) !!}
                            {!!  Builder::Select('user_id',$reservation->user_id,$users,['col' => 'col-lg-6','option_title' =>  'name','option_key_value' => 'id','label_title' => 'reservations::admin.User_name','use_trans' => true,'is_required' => true])  !!}
                            {!!  Builder::Select('doctor_id',$reservation->doctor_id,$doctors,['col' => 'col-lg-6','option_title' =>  'name','option_key_value' => 'id','label_title' => 'reservations::admin.Doctor_name','use_trans' => true,'is_required' => true])  !!}
                        </div>


                        <div class="mt-4">
                            <button type="submit" class="btn btn-gradient-primary">Update</button>
                            <button type="reset" class="btn btn-gradient-danger">Clear</button>
                            <a href="{{route('reservations.index')}}" class="btn btn-gradient-info">Back</a>
                        </div>

                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end col-->
        </div><!--end row-->
    {!! Builder::EndForm() !!}

@endsection



@section('js')
    @include('components.alert-action')
@endsection

