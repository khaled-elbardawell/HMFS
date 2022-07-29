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
                                </ul>
                                <div class="chat-search">
                                    <form action="{{route('chat.search.user')}}" method="GET">
                                        <div class="form-group">
                                            <div class="input-group">
                                                    <input type="text" id="chat-search" name="chat_user_search" class="form-control" placeholder="Search User..">
                                                    <span class="input-group-append">
                                                        <button type="submit" class="btn btn-gradient-primary shadow-none"><i class="fas fa-search"></i></button>
                                                    </span>
                                            </div>
                                        </div>
                                    </form>

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
                                                         <div  class="rounded-circle-text">{{TextImage($receiver->user->name)}}</div>
                                                @endisset
                                             </div><!-- media-left -->

                                    <div class="media-body">
                                                <div>
                                                    <h6 class="mb-1 mt-0">{{$receiver->user->name}}</h6>
                                                    <p class="mb-0" data-header-user-id="{{$receiver->user->id}}"></p>
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

                                                        <div class="img-group d-block text-right pr-4">
                                                            @foreach($message->recipients as $recipient)
                                                                @if($recipient->user_id != auth()->id() && $recipient->seen_at)
                                                                    @isset($recipient->user->upload)
                                                                        <a class="user-avatar user-avatar-group" onclick="return false;" href="#">
                                                                            <img style="width: 15px;height: 15px" src="{{CustomAsset('upload/images/full/'.$recipient->user->upload->file)}}" alt="user" class="thumb-md rounded-circle">
                                                                        </a>
                                                                    @else
                                                                        <a class="user-avatar user-avatar-group" onclick="return false;" href="#">
                                                                            <div  class="rounded-circle-text" style="border-radius: 50% !important;background-color: #cccccc;width: 15px;height: 15px;text-align: center;line-height: 15px;font-weight: bold;font-size: 7px;">{{TextImage($recipient->user->name)}}</div>
                                                                        </a>
                                                                    @endisset
                                                                @endif
                                                            @endforeach

                                                        </div><!--end img-group-->
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
                                @else
                                    <div class="chat-body " style="background-color: #ffffff;display: flex;justify-content: center;align-items: center;width: 100%;height: 100%;">
                                        <span style="font-size: 30px"><i class="ti-comment noti-icon"></i> Choose the chat to preview</span>
                                    </div>
                                @endif

                            </div><!--end chat-box-right -->
                        </div> <!-- end col -->
                    </div><!-- end row -->
@endsection

@section('js')
    <script>
        window.chats = JSON.parse('@json($chats)')

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

    </script>



@if(request()->has('chat_id') && request()->chat_id)
 <script>
    var receiver = null;
    @isset($receiver)
        receiver = @json($receiver)
    @endisset


    $(function () {
        scrollBottom()
        seenMessagesRequest()
    })


    function scrollBottom(){
        const messages = document.getElementById('chatbox');
        messages.scrollTop = messages.scrollHeight;
    }

    function seenMessagesRequest() {
        axios({
            method: 'post',
            url: '{{route('seen.messages')}}',
            data: {
                chat_id     : "{{request()->chat_id}}",
            }
        });
    }

    function buildMessageHtml(message,flag = 0){
        var html = '';
        html += `<div class="media">
                    <div class="media-img p-3"></div>
                    <div class="media-body ${ flag == 1 ? 'reverse' : '' }">
                        <div class="chat-msg">
                            <p>${message}</p>`
        if(flag == 1){
            html += `<div class="img-group d-block text-right" style="padding-right: 50px !important;"></div>`
        }

        html +=   `</div></div></div>`

        return html
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


    function typeingEvent() {
        Echo.join(`chat.{{request()->chat_id}}`).whisper('typing',{receiver : receiver});
    }

    Echo.join('chat.{{request()->chat_id}}')
        .listen('.SendMessageEvent', (e) => {
            appendMessageToChatBox(e.message.message,0)
            sortChats(receiver.id)
            seenMessagesRequest()
        })
        .listenForWhisper('typing', e => {
            $('.typing').removeClass('d-none')
        })
        .listenForWhisper('stop-typing', e => {
          $('.typing').addClass('d-none')
       });


   Echo.join('chat.seen.{{request()->chat_id}}')
        .listen('.SeenMessageEvent', (e) => {
            if({{request()->chat_id}} == e.chat_id){
                var html = '';
                if(e.user.upload){
                     html = `<a class="user-avatar user-avatar-group" onclick="return false;" href="#">
                              <img style="width: 15px;height: 15px" src="/upload/images/full/${e.user.upload.file}" alt="user" class="thumb-md rounded-circle">
                             </a>`
                 }else{
                     html =  `<a class="user-avatar user-avatar-group" onclick="return false;" href="#">
                                <div  class="rounded-circle-text" style="border-radius: 50% !important;background-color: #cccccc;width: 15px;height: 15px;text-align: center;line-height: 15px;font-weight: bold;font-size: 7px;">${$('.chat-header .rounded-circle-text').text()}</div>
                              </a>`
                 }
                $('.media-body.reverse .chat-msg .img-group').html(html)
            }
        });

</script>
@endif



@endsection

