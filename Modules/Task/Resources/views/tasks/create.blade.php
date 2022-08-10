@extends('layouts.admin.master')

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('admin.Home')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{route('task.index')}}">{{__('task::admin.Tasks')}}</a></li>
                        <li class="breadcrumb-item active">{{__('task::admin.Create')}}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{__('task::admin.Tasks')}}</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->

    <form method="POST" action="{{route('task.store')}}">
        @csrf
        <div class="row">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <input type="hidden" name="board_card_id" value="{{$board_card->id}}">
                        <div class="row">
                            <div class="col-lg-12 col-12">
                                <div class="form-group">
                                    <label for="name-input" class="text-right">{{__('task::admin.Name')}}</label>
                                    <div>
                                        <input name="name" class="form-control" type="text" placeholder="{{__('task::admin.Name')}}" id="name-input">
                                        @error('name')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="user_to-input" class="text-right">{{__('task::admin.Assign_To')}}</label>
                                    <div>
                                        <select name="user_to" class="form-control"  id="user_to-input">
                                            <option value="-1">{{__('task::admin.Select_User')}}</option>
                                            @foreach ($users as $user)
                                                <option value="{{$user->user->id}}">{{$user->user->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('user_to')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="status-input" class="text-right">{{__('task::admin.Status')}}</label>
                                    <div>
                                        <select name="status" class="form-control" id="status-input">
                                            <option value="-1">{{__('task::admin.Select_Status')}}</option>
                                            <option value="Not Started">not started</option>
                                            <option value="In Progress">in progress</option>
                                            <option value="Completed">completed</option>
                                        </select>
                                        @error('status')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="date_from-input" class="text-right">{{__('task::admin.Date_From')}}</label>
                                    <div>
                                        <input name="date_from" class="form-control" type="date" placeholder="{{__('task::admin.Date_From')}}" id="date_from-input">
                                        @error('date_from')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="date_to-input" class="text-right">{{__('task::admin.Date_To')}}</label>
                                    <div>
                                        <input name="date_to" class="form-control" type="date" placeholder="{{__('task::admin.Date_To')}}" id="date_to-input">
                                        @error('date_to')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-12">
                                <div class="form-group">
                                    <label for="description-input" class="text-right">{{__('task::admin.Desciption')}}</label>
                                    <div>
                                        <textarea name="description" id="description-input" class="form-control" cols="30" rows="5" placeholder="{{__('task::admin.Desciption')}}"></textarea>
                                        @error('description')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-gradient-primary">Save</button>
                            <button type="reset" class="btn btn-gradient-danger">Clear</button>
                            <a href="{{route('task.index',['board_id'=>$board_card->board_id])}}" class="btn btn-gradient-info">Back</a>
                        </div>

                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end col-->

            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 col-12">
                                <div class="form-group">
                                    <label for="comment-input" class="text-right">{{__('task::admin.Comment')}}</label>
                                    <div>
                                        <textarea name="comment" id="comment-input" class="form-control" cols="30" rows="5" placeholder="{{__('task::admin.Comment')}}"></textarea>
                                        @error('comment')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><!--end card-body-->
                </div><!--end card-->


            </div><!--end col-->

        </div><!--end row-->
    </form>
@endsection

