@extends('layouts.admin.master')

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('admin.Home')}}</a></li>
                        <li class="breadcrumb-item active">{{__('admin.Contacts')}}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{__('admin.Contacts')}}</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{__('Admin.Name')}}</th>
                                <th>{{__('admin.email')}}</th>
                                <th>{{__('admin.phone')}}</th>
                                <th>{{__('admin.subject')}}</th>
                                <th>{{__('admin.message')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contacts as $contact)
                                <tr>
                                    <td>{{$start_counter}}</td>
                                    <td>{{$contact->name}}</td>
                                    <td>{{$contact->email}}</td>
                                    <td>{{$contact->phone}}</td>
                                    <td>{{$contact->subject}}</td>
                                    <td>{{$contact->message}}</td>
                                </tr>
                                @php ++$start_counter; @endphp
                            @endforeach
                            </tbody>
                        </table><!--end /table-->
                    </div><!--end /tableresponsive-->
                </div><!--end card-body-->
                {{$contacts->render()}}

            </div><!--end card-->
        </div> <!-- end col -->
    </div> <!-- end row -->

@endsection

