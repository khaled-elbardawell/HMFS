@extends('layouts.admin.master')


@section('css')
    <!-- Dragula -->
    <link href="{{CustomAsset("admin/assets/css/dragula.min.css")}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('admin.Home')}}</a></li>
                        <li class="breadcrumb-item active">{{__('task::admin.Tasks')}}</li>
                    </ol>
                </div>
                {{-- @dd($board) --}}
                <h4 class="page-title"> {{$board->name}} </h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row task-board">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row" style="overflow-x: auto; flex-wrap: nowrap;">
                        <div class="col-md-3 col-12">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary add-board-tasks" data-toggle="modal" data-target="#board_card">Add Column</button>

                            @error('board_card_name')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            @isset($board_card)
                                @dd('The Board Is Not Exist')
                            @else
                                @include('task::tasks/modal-board')
                            @endisset

                        </div>
                        @foreach ($board->boardCards as $board_card)
                            @php
                                $board_card_name = str_replace(' ', '_', $board_card->name);
                                $board_card_modal = "board_card";
                            @endphp

                            @isset($board_card)
                                @php
                                    $board_card_modal = "board_card_".$board_card->id;
                                @endphp
                            @endisset

                            @include('task::tasks/modal-board',["board_card"=> $board_card , "board_card_modal"=> $board_card_modal])
                            @include('task::tasks/board-card',["post_type"=> $board_card_name , "board_card_modal"=> $board_card_modal])
                        @endforeach
                    </div><!--end row-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
    </div><!--end row-->
@endsection

@section('js')
    @include('components.alert-action')
    <!-- Dragula  -->
    <script src="{{CustomAsset("admin/plugins/dragula/dragula.min.js")}}"></script>

    <script>
        var board_cards = JSON.parse('@json($board->boardCards)').data
        var iconTochange;

        var dragulaArr =[]
        board_cards.forEach(function (item) {
            dragulaArr.push( document.getElementById("project-list-"+item.id))
        })

        dragula(dragulaArr).on('drag',function (el,container) {
              console.log('drag')
        }).on('drop', function(el, container ){
             console.log(el)
             console.log($(container))
             console.log($(container).find('.list'))
        });//--;
    </script>
@endsection
