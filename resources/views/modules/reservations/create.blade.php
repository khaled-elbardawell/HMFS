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
                        <li class="breadcrumb-item"><a href="{{route('role.index')}}">{{__('reservations::admin.Reservations')}}</a></li>
                        <li class="breadcrumb-item active">{{__('reservations::admin.Create')}}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{__('reservations::admin.Reservations')}}</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->

    <?php  use App\Helpers\Builder; ?>



       {!! Builder::Form('POST',route('reservations.store')) !!}
         <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            {!!  Builder::Input('date','reservation_date',request()->reservation_date??null,['col' => 'col-lg-6','label_title' => 'reservations::admin.Reservation_date','use_trans' => true,'is_required' => true]) !!}
                            {!!  Builder::Input('time','reservation_time',request()->reservation_time??null,['col' => 'col-lg-6','label_title' => 'reservations::admin.Reservation_time','use_trans' => true,'is_required' => true]) !!}


                            {!!  Builder::SwitchCheckBox('status',false,['id' => 'customSwitchSuccess','label_title' => 'admin.Status','use_trans' => true]) !!}


                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="text-right">{{__('reservations::admin.User_name')}}</label>
                                        <div>
                                            <select name="user_id" class="user-data-search-ajax w-100"></select>
                                        </div>
                                    </div>
                                </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="text-right">{{__('reservations::admin.Doctor_name')}}</label>
                                    <div>
                                        <select name="doctor_id" class="doctor-data-search-ajax w-100"></select>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-gradient-primary">Save</button>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(".user-data-search-ajax ").select2({
            ajax: {
                url: "{{route('reservations.users_search')}}",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q   : params.term, // search term
                        page: params.page
                    };
                },
                processResults: function (data, params) {
                    return {
                        results: data,
                    };
                },
                cache: true
            },
            placeholder: 'Search for a user',
            minimumInputLength: 1,
            templateResult: formatUser,
            templateSelection: formatUserSelection
        });
        $(".doctor-data-search-ajax ").select2({
            ajax: {
                url: "{{route('reservations.doctors_search')}}",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q   : params.term, // search term
                        page: params.page
                    };
                },
                processResults: function (data, params) {
                    return {
                        results: data,
                    };
                },
                cache: true
            },
            placeholder: 'Search for a doctor',
            minimumInputLength: 1,
            templateResult: formatUser,
            templateSelection: formatUserSelection
        });

        function formatUser (user) {
            if (user.loading) {
                return user.text;
            }

            var $container = $(
                `<div class='select2-result-user'> <div>uid: ${user.id}</div> <div>Name: ${user.name}</div> <div>Email: ${user.email}</div> </div>`
            );
            return $container;
        }

        function formatUserSelection (user) {
            return user.name || user.email;
        }
    </script>

@endsection
