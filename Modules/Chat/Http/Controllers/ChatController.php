<?php

namespace Modules\Chat\Http\Controllers;

use App\Events\SeenMessageEvent;
use App\Events\SendMessageEvent;
use App\Events\UserChatNotifyEvent;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Api\Traits\ApiResponseTrait;
use Modules\Chat\Entities\Chat;
use Modules\Chat\Entities\Message;
use Modules\Chat\Entities\Participant;
use Modules\Chat\Entities\Recipient;

class ChatController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $receiver = null;
        $messages = [];
        if (request()->has('chat_id') && request()->chat_id){
            $messages =$this->getChatMessages(\request()->chat_id);
            $receiver = $this->getReceiverData(\request()->chat_id);
        }

        $chats = $this->getChats();
        return view('chat::chat',compact('chats','messages','receiver'));
    }// end method


    private function getReceiverData($chat_id){
        return  Participant::select('id','user_id','chat_id')->with(['user' => function($q){
            $q->select('id','name','email')
                ->with(['upload' => function($q){
                    $q->select('id','uploadable_id','uploadable_type','file');
                }]);
        }])->where('chat_id',$chat_id)->where('user_id','<>',auth()->id())->first();
    }

    private function getChatMessages($chat_id){
        $messages = Message::select('id','sender_id','message','chat_id','created_at')
                ->where('chat_id',$chat_id)
                ->with([
                    'recipients' => function($q){
                          $q->select('id','seen_at','user_id','message_id')
                              ->with(['user' => function($q){
                                         $q->select('id','name','email')
                                             ->with(['upload' => function($q){
                                                    $q->select('id','uploadable_id','uploadable_type','file');
                                              }]);
                                 }]);
                     },
                    'sender' => function($q){
                        $q->select('id','name','email')
                            ->with(['upload' => function($q){
                                $q->select('id','uploadable_id','uploadable_type','file');
                            }]);
                    }
                  ])->get();
        return $messages;
    }


    private function getChats(){
        $sql = "SELECT
                chats.id AS chat_id,
                chats.label,
                chats.last_message,
                chats.updated_at,
                participants.user_id,
                users.name,
                uploads.file
            FROM
                chats
            INNER JOIN participants ON participants.chat_id = chats.id
            INNER JOIN users ON users.id = participants.user_id
            LEFT JOIN uploads ON uploads.uploadable_id = participants.user_id AND uploads.uploadable_type = 'App\\\User'
            WHERE EXISTS
                (
                SELECT
                    *
                FROM
                    participants
                WHERE
                    participants.user_id = ? AND participants.chat_id = chats.id
            ) AND participants.user_id != ? ORDER BY chats.updated_at DESC";

        return  Chat::sqlGet($sql,[auth()->id(),auth()->id()]);
    }




    public function sendMessage(Request $request)
    {
       $request->validate(['message' => 'required|string|max:2000','chat_id' => 'required']);


        // check if sender participant in this chat
         $sender_participant = Participant::where('user_id',auth()->id())->where('chat_id',$request->chat_id)->first();
         if (!$sender_participant){  $this->returnErrorResponse(404); }

         // get chat with participants
        $chat_with_participants = Chat::with(['participants'])->whereId($request->chat_id)->first();
        if (!$chat_with_participants){  $this->returnErrorResponse(404); }


        // save message
        $message = Message::create([
                            'sender_id'   => auth()->id(),
                            'chat_id'     => $chat_with_participants->id,
                            'message'     => $request->message
                    ]);


        // update last message for chat
        Chat::whereId($chat_with_participants->id)->update([
            'last_message' => $message->message
        ]);


       // save recipients message
       foreach ($chat_with_participants->participants as $participant){
           Recipient::create([
               'user_id'    => $participant->user_id,
               'message_id' => $message->id,
               'seen_at'    => $participant->user_id == auth()->id() ? Carbon::now() : null,
           ]);

           broadcast(new UserChatNotifyEvent($message->load('sender'), $participant->user_id))->toOthers();

       }

        broadcast(new SendMessageEvent($message->load('sender'), $chat_with_participants->id))->toOthers();

       return $this->returnSuccessfulResponse();
    }// end method



    public function seenMessages(Request $request){
        Recipient::whereHas('message',function ($q) use ($request){
            $q->where('chat_id',$request->chat_id)->where('seen_at',null)->where('user_id',auth()->id());
        })->update(['seen_at' => Carbon::now()]);

        broadcast(new SeenMessageEvent($request->chat_id));
        return $this->returnSuccessfulResponse();
    }

}
