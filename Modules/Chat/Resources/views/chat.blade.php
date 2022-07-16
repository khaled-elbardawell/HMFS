@extends('layouts.admin.master')


@section('css')
    <style>
        .rounded-circle-text {
            border-radius: 50% !important;
            background-color: #cccccc;
            width: 48px;
            height: 48px;
            text-align: center;
            line-height: 48px;
            font-weight: bold;
        }
    </style>
@endsection


@section('content')
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <div class="float-right">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">HMFS</a></li>
                                        <li class="breadcrumb-item active">Chat</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Chat</h4>
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div>
                    <!-- end page title end breadcrumb -->
                    <div class="row">
                        <div class="col-12">
                             <div class="chat-box-left">
                                <ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="general_chat_tab" data-toggle="pill" href="#general_chat">Chats</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="group_chat_tab" data-toggle="pill" href="#group_chat">Groups</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="personal_chat_tab" data-toggle="pill" href="#personal_chat">Personal</a>
                                    </li>
                                </ul>
                                <div class="chat-search">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" id="chat-search" name="chat-search" class="form-control" placeholder="Search">
                                            <span class="input-group-append">
                                                <button type="button" class="btn btn-gradient-primary shadow-none"><i class="fas fa-search"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </div><!--end chat-search-->

                                <div class="tab-content chat-list slimscroll" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="general_chat">
                                        @foreach($chats as $chat)
                                             <a data-chat-id="{{$chat->chat_id}}" data-user-id="{{$chat->user_id}}" href="{{route('chat',['chat_id' => $chat->chat_id])}}" class="media new-message">
                                                <div class="media-left">
                                                    @if($chat->file)
                                                         <img src="{{CustomAsset('upload/images/full/'.$chat->file)}}" alt="{{$chat->name}}" class="rounded-circle thumb-md">
                                                         <span class="round-10 bg-success d-none"></span>
                                                    @else
                                                        <div  class="rounded-circle-text">{{TextImage($chat->name??$chat->label)}}</div>
                                                        <span class="round-10 bg-success d-none"></span>

                                                    @endif
                                                </div><!-- media-left -->
                                                <div class="media-body">
                                                <div class="d-inline-block">
                                                    <h6>{{$chat->name??$chat->label}}</h6>
                                                    <p>{{$chat->last_message??''}}</p>
                                                </div>
                                                <div>
                                                    <span>{{$chat->updated_at}}</span>
                                                </div>
                                            </div><!-- end media-body -->
                                             </a> <!--end media-->
                                        @endforeach
                                    </div><!--end general chat-->

                                    <div class="tab-pane fade" id="group_chat">
                                        <a href="" class="media new-message">
                                            <div class="media-left">
                                                <div class="avatar-box thumb-md align-self-center mr-2">
                                                    <span class="avatar-title bg-primary rounded-circle"><i class="fab fa-quinscape"></i></span>
                                                </div>
                                            </div><!-- media-left -->
                                            <div class="media-body">
                                                <div>
                                                    <h6>Design Group</h6>
                                                    <p>Good morning! How are you?</p>
                                                </div>
                                                <div>
                                                    <span>20 Feb</span>
                                                    <span>1</span>
                                                </div>
                                            </div><!-- end media-body -->
                                        </a> <!--end media-->
                                        <a href="" class="media">
                                            <div class="media-left">
                                                <div class="avatar-box thumb-md align-self-center mr-2">
                                                    <span class="avatar-title bg-success rounded-circle"><i class="fab fa-connectdevelop"></i></span>
                                                </div>
                                            </div><!-- media-left -->
                                            <div class="media-body">
                                                <div>
                                                    <h6>Front end Developers</h6>
                                                    <p>Have A Nice day...</p>
                                                </div>
                                                <div>
                                                    <span>15 Feb</span>
                                                </div>
                                            </div><!-- end media-body -->
                                        </a>   <!--end media-->
                                        <a href="" class="media">
                                            <div class="media-left">
                                                <div class="avatar-box thumb-md align-self-center mr-2">
                                                    <span class="avatar-title bg-warning rounded-circle"><i class="far fa-gem"></i></span>
                                                </div>
                                            </div><!-- media-left -->
                                            <div class="media-body">
                                                <div>
                                                    <h6>UI/UX Designers</h6>
                                                    <p>Congratulations everybody... </p>
                                                </div>
                                                <div>
                                                    <span>14 Feb</span>
                                                </div>
                                            </div><!-- end media-body -->
                                        </a><!--end media-->
                                        <a href="" class="media">
                                            <div class="media-left">
                                                <div class="avatar-box thumb-md align-self-center mr-2">
                                                    <span class="avatar-title bg-pink rounded-circle"><i class="fab fa-react"></i></span>
                                                </div>
                                            </div><!-- media-left -->
                                            <div class="media-body">
                                                <div>
                                                    <h6>React Developers</h6>
                                                    <p>How are you Friends...</p>
                                                </div>
                                                <div>
                                                    <span>10 Feb</span>
                                                </div>
                                            </div><!-- end media-body -->
                                        </a><!--end media-->
                                        <a href="" class="media">
                                            <div class="media-left">
                                                <div class="avatar-box thumb-md align-self-center mr-2">
                                                    <span class="avatar-title bg-info rounded-circle"><i class="fas fa-globe"></i></span>
                                                </div>
                                            </div><!-- media-left -->
                                            <div class="media-body">
                                                <div>
                                                    <h6>Marketing Group</h6>
                                                    <p>How are you Friends...</p>
                                                </div>
                                                <div>
                                                    <span>10 Feb</span>
                                                </div>
                                            </div><!-- end media-body -->
                                        </a><!--end media-->
                                    </div><!--end group chat-->

                                    <div class="tab-pane fade" id="personal_chat">
                                        <a href="" class="media new-message">
                                            <div class="media-left">
                                                <img src="../assets/images/users/user-1.jpg" alt="user" class="rounded-circle thumb-md">
                                                <span class="round-10 bg-success"></span>
                                            </div><!-- media-left -->
                                            <div class="media-body">
                                                <div class="d-inline-block">
                                                    <h6>Daniel Madsen</h6>
                                                    <p>Good morning! Congratulations Friend...</p>
                                                </div>
                                                <div>
                                                    <span>20 Feb</span>
                                                    <span>3</span>
                                                </div>
                                            </div><!-- end media-body -->
                                        </a><!--end media-->
                                        <a href="" class="media new-message">
                                            <div class="media-left">
                                                <img src="../assets/images/users/user-2.jpg" alt="user" class="rounded-circle thumb-md">
                                                <span class="round-10 bg-success"></span>
                                            </div><!-- media-left -->
                                            <div class="media-body">
                                                <div>
                                                    <h6>Robert Jefferson</h6>
                                                    <p>Congratulations Friend...</p>
                                                </div>
                                                <div>
                                                    <span>20 Feb</span>
                                                    <span>1</span>
                                                </div>
                                            </div><!-- end media-body -->
                                        </a><!--end media-->
                                        <a href="" class="media">
                                            <div class="media-left">
                                                <img src="../assets/images/users/user-3.jpg" alt="user" class="rounded-circle thumb-md">
                                                <span class="round-10 bg-danger"></span>
                                            </div><!-- media-left -->
                                            <div class="media-body">
                                                <div>
                                                    <h6>Jesse Ross</h6>
                                                    <p>How are you Friend...</p>
                                                </div>
                                                <div>
                                                    <span>15 Feb</span>
                                                </div>
                                            </div><!-- end media-body -->
                                        </a><!--end media-->
                                        <a href="" class="media">
                                            <div class="media-left">
                                                <img src="../assets/images/users/user-4.jpg" alt="user" class="rounded-circle thumb-md">
                                                <span class="round-10 bg-danger"></span>
                                            </div><!-- media-left -->
                                            <div class="media-body">
                                                <div>
                                                    <h6>Mary Schneider</h6>
                                                    <p>Have A Nice day...</p>
                                                </div>
                                                <div>
                                                    <span>14 Feb</span>
                                                </div>
                                            </div><!-- end media-body -->
                                        </a><!--end media-->
                                        <a href="" class="media">
                                            <div class="media-left">
                                                <img src="../assets/images/users/user-5.jpg" alt="user" class="rounded-circle thumb-md">
                                                <span class="round-10 bg-success"></span>
                                            </div><!-- media-left -->
                                            <div class="media-body">
                                                <div>
                                                    <h6>David Herrmann</h6>
                                                    <p>Good morning! How are you?</p>
                                                </div>
                                                <div>
                                                    <span>10 Feb</span>
                                                </div>
                                            </div><!-- end media-body -->
                                        </a><!--end media-->
                                        <a href="" class="media">
                                            <div class="media-left">
                                                <img src="../assets/images/users/user-6.jpg" alt="user" class="rounded-circle thumb-md">
                                                <span class="round-10 bg-danger"></span>
                                            </div><!-- media-left -->
                                            <div class="media-body">
                                                <div>
                                                    <h6>Mary Hayes</h6>
                                                    <p>How are you Friend...</p>
                                                </div>
                                                <div>
                                                    <span>1 Feb</span>
                                                </div>
                                            </div><!-- end media-body -->
                                        </a><!--end media-->
                                        <a href="" class="media">
                                            <div class="media-left">
                                                <img src="../assets/images/users/user-7.jpg" alt="user" class="rounded-circle thumb-md">
                                                <span class="round-10 bg-danger"></span>
                                            </div><!-- media-left -->
                                            <div class="media-body">
                                                <div>
                                                    <h6>Rita Duarte</h6>
                                                    <p>Have A Nice day...</p>
                                                </div>
                                                <div>
                                                    <span>30 Jan</span>
                                                </div>
                                            </div><!-- end media-body -->
                                        </a><!--end media-->


                                        <a href="" class="media">
                                            <div class="media-left">
                                                <img src="../assets/images/users/user-8.jpg" alt="user" class="rounded-circle thumb-md">
                                                <span class="round-10 bg-danger"></span>
                                            </div><!-- media-left -->
                                            <div class="media-body">
                                                <div>
                                                    <h6>Dennis Wilson</h6>
                                                    <p>Good morning! How are you?</p>
                                                </div>
                                                <div>
                                                    <span>26 Jan</span>
                                                </div>
                                            </div><!-- end media-body -->
                                        </a><!--end media-body-->
                                    </div><!--end personal chat-->
                                </div><!--end tab-content-->
                            </div><!--end chat-box-left -->




                            <div class="chat-box-right">
                                @if($messages)
                                    <div class="chat-header">
                                        <a href="" class="media">
                                            <div class="media-left">
                                                  @isset($receiver->user->upload->file)
                                                        <img src="{{CustomAsset("upload/images/full/{$receiver->user->upload->file}")}}" alt="{{$receiver->name}}" class="rounded-circle thumb-md">
                                                  @else
                                                         <div  class="rounded-circle-text">{{TextImage($chat->name??$chat->label)}}</div>
                                                @endisset
                                             </div><!-- media-left -->

                                    <div class="media-body">
                                                <div>
                                                    <h6 class="mb-1 mt-0">{{$receiver->user->name}}</h6>
                                                    <p class="mb-0 typing" data-header-user-id="{{$receiver->user->id}}"></p>
                                                    <p class="mb-0 typing d-none">typing...</p>
                                                </div>
                                            </div><!-- end media-body -->
                                        </a><!--end media-->
                                    </div><!-- end chat-header -->


                                    <div class="chat-body ">
                                            <div style="overflow-y:scroll;overflow-x:hidden;height:100%;" class="chat-detail" id="chatbox">

                                            @foreach($messages as $message)
                                                @if($message->sender_id != auth()->id())
                                                   <div class="media">
                                                        <div class="media-img p-3"></div>
                                                        <div class="media-body">
                                                            <div class="chat-msg">
                                                                <p>{{$message->message}}</p>
                                                            </div>
                                                        </div><!--end media-body-->
                                                   </div><!--end media-->
                                                @else
                                                   <div class="media">
                                                <div class="media-body reverse">
                                                    <div class="chat-msg">
                                                        <p>{{$message->message}}</p>
                                                    </div>
                                                </div><!--end media-body-->
                                                <div class="media-img p-3"></div>
                                            </div><!--end media-->
                                                @endif
                                            @endforeach

                                        </div>  <!-- end chat-detail -->
                                    </div><!-- end chat-body -->


                                    <div class="chat-footer">
                                    <div class="row">
                                        <div class="col-12 col-md-9">
                                            <input type="text" class="form-control message-input" placeholder="Type something here...">
                                        </div><!-- col-8 -->

                                    </div><!-- end row -->
                                </div><!-- end chat-footer -->
                                @endif

                            </div><!--end chat-box-right -->
                        </div> <!-- end col -->
                    </div><!-- end row -->
@endsection

@section('js')
    <script>

        function sortChats(user_id){
            var chat_box = $(`[data-user-id =  ${user_id}]`)
            if(chat_box){
                $(`[data-user-id =  ${user_id}]`).remove()
                $('#general_chat').prepend(chat_box.clone())
            }
        }

        function setChatHeaderStatus(){
                    var user_id = $(`[data-header-user-id]`).attr('data-header-user-id')
                    if( $(`[data-user-id =  ${user_id}] .bg-success`).hasClass('d-none')){
                        $(`[data-header-user-id]`).html(`<span class='badge badge-danger'>offline</span>`)

                    }else{
                        $(`[data-header-user-id]`).html(`<span class='badge badge-success'>online</span>`)
                    }
        }

        window.chats = JSON.parse('@json($chats)')

    </script>

@if(request()->has('chat_id') && request()->chat_id)
    <script>
    var receiver = null;
    @isset($receiver)
        receiver = @json($receiver)
    @endisset


    $(function () {
        scrollBottom()
    })


    const messages = document.getElementById('chatbox');
    function scrollBottom(){
        messages.scrollTop = messages.scrollHeight;
    }

    function buildMessageHtml(message,flag = 0){
        return `<div class="media">
                    <div class="media-img p-3"></div>
                    <div class="media-body ${ flag == 1 ? 'reverse' : '' }">
                        <div class="chat-msg">
                            <p>${message}</p>
                        </div>
                    </div>
              </div>`
    }



    function appendMessageToChatBox(message,flag){
       var html = buildMessageHtml(message,flag)
       $('#chatbox').append(html)
        scrollBottom()
    }


    window.timeout = false

    $('.message-input').keyup(function (event) {
        typeingEvent()

        if( window.timeout){
            clearTimeout( window.timeout)
        }

        window.timeout = setTimeout(() => {
            Echo.join(`chat.{{request()->chat_id}}`).whisper('stop-typing',{receiver : receiver});

            window.timeout = false
                        },2000)

        if (event.key === "Enter") {
            event.preventDefault();
            var message = $(this).val()
            if(!message){ return }

            appendMessageToChatBox(message,1)

             $(this).val('')
             sortChats(receiver.id)

            // Send a POST request
            axios({
                method: 'post',
                url: '{{route('send.message')}}',
                data: {
                    message     : message,
                    chat_id     : "{{request()->chat_id}}",
                }
            });
        }

    })


    Echo.join('chat.{{request()->chat_id}}')
        .listen('SendMessageEvent', (e) => {
            appendMessageToChatBox(e.message.message,0)
            sortChats(receiver.id)
        })
        .listenForWhisper('typing', e => {
            $('.typing').removeClass('d-none')
        })
        .listenForWhisper('stop-typing', e => {
          $('.typing').addClass('d-none')
       });

    function typeingEvent() {
        Echo.join(`chat.{{request()->chat_id}}`).whisper('typing',{receiver : receiver});
    }

</script>
@endif

@endsection

