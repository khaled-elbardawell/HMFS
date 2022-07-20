<?php

namespace Modules\Api\Http\Controllers;

use App\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\Api\Traits\ApiResponseTrait;
use App\Events\SeenMessageEvent;
use App\Events\SendMessageEvent;
use App\Events\UserChatNotifyEvent;
use App\Models\Admin\UserOrganization;
use Carbon\Carbon;
use Modules\Chat\Entities\Chat;
use Modules\Chat\Entities\Message;
use Modules\Chat\Entities\Participant;
use Modules\Chat\Entities\Recipient;



class ChatController extends Controller
{
    use ApiResponseTrait;



    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\JsonResponse
     */
    public function getChats()
    {
        $chats = $this->getChatsData();
        return $this->returnDataResponse($chats);

    }// end method


    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMessagesChat(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'chat_id'    => "required",
        ]);

        if($validator->fails()){
            return $this->returnValidationErrorResponse($validator,401);
        }

        $messages = $this->getChatMessages(\request()->chat_id);
        $receiver = $this->getReceiverData(\request()->chat_id);

        return $this->returnDataResponse([ 'receiver' => $receiver, 'messages' => $messages, ]);

    }// end method


    private function getReceiverData($chat_id)
    {
        $user = auth()->guard('api')->user();

        return Participant::select('id', 'user_id', 'chat_id')->with(['user' => function ($q) {
            $q->select('id', 'name', 'email')
                ->with(['upload' => function ($q) {
                    $q->select('id', 'uploadable_id', 'uploadable_type', 'file');
                }]);
        }])->where('chat_id', $chat_id)->where('user_id', '<>', $user->id)->first();
    }// end method

    private function getChatMessages($chat_id)
    {
        $messages = Message::select('id', 'sender_id', 'message', 'chat_id', 'created_at')
            ->where('chat_id', $chat_id)
            ->with([
                'recipients' => function ($q) {
                    $q->select('id', 'seen_at', 'user_id', 'message_id')
                        ->with(['user' => function ($q) {
                            $q->select('id', 'name', 'email')
                                ->with(['upload' => function ($q) {
                                    $q->select('id', 'uploadable_id', 'uploadable_type', 'file');
                                }]);
                        }]);
                },
                'sender' => function ($q) {
                    $q->select('id', 'name', 'email')
                        ->with(['upload' => function ($q) {
                            $q->select('id', 'uploadable_id', 'uploadable_type', 'file');
                        }]);
                }
            ])->get();
        return $messages;
    }// end method


    private function getChatsData()
    {
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

        $user = auth()->guard('api')->user();

        return Chat::sqlGet($sql, [$user->id, $user->id]);
    }// end method


    public function sendMessage(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'message' => 'required|string|max:2000',
            'chat_id' => 'required'
        ]);

        if($validator->fails()){
            return $this->returnValidationErrorResponse($validator,401);
        }

        $user = auth()->guard('api')->user();


        // check if sender participant in this chat
        $sender_participant = Participant::where('user_id', $user->id)->where('chat_id', $request->chat_id)->first();
        if (!$sender_participant) {
            $this->returnErrorResponse(404);
        }

        // get chat with participants
        $chat_with_participants = Chat::with(['participants'])->whereId($request->chat_id)->first();
        if (!$chat_with_participants) {
            $this->returnErrorResponse(404);
        }


        // save message
        $message = Message::create([
            'sender_id' =>  $user->id,
            'chat_id' => $chat_with_participants->id,
            'message' => $request->message
        ]);


        // update last message for chat
        Chat::whereId($chat_with_participants->id)->update([
            'last_message' => $message->message
        ]);


        // save recipients message
        foreach ($chat_with_participants->participants as $participant) {
            Recipient::create([
                'user_id' => $participant->user_id,
                'message_id' => $message->id,
                'seen_at' => $participant->user_id ==  $user->id ? Carbon::now() : null,
            ]);

            broadcast(new UserChatNotifyEvent($message->load('sender'), $participant->user_id))->toOthers();

        }

        broadcast(new SendMessageEvent($message->load('sender'), $chat_with_participants->id))->toOthers();

        return $this->returnSuccessfulResponse();
    }// end method


    public function seenMessages(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'chat_id' => 'required'
        ]);

        if($validator->fails()){
            return $this->returnValidationErrorResponse($validator,401);
        }

        $user = auth()->guard('api')->user();

        Recipient::whereHas('message', function ($q) use ($request,$user) {
            $q->where('chat_id', $request->chat_id)->where('seen_at', null)->where('user_id', $user->id);
        })->update(['seen_at' => Carbon::now()]);

        broadcast(new SeenMessageEvent($request->chat_id));
        return $this->returnSuccessfulResponse();
    }// end method

    public function chatSearchUsers(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'chat_user_search' => 'required'
        ]);

        if($validator->fails()){
            return $this->returnValidationErrorResponse($validator,401);
        }

        $user = auth()->guard('api')->user();
        $chat_user_search = '%' . $request->chat_user_search . '%';
        $bindings = [];
        $sql = "SELECT users.* FROM users  WHERE  (users.name LIKE ? OR users.email LIKE ?)";
            $bindings = [$chat_user_search, $chat_user_search];


        $sql .= " AND users.id != ?";
        $bindings[] = $user->id;
        $users = User::sqlGet($sql, $bindings);
        return $this->returnDataResponse($users);
    }// end method

    public function createChatUser(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'user_id' => 'required'
        ]);

        if($validator->fails()){
            return $this->returnValidationErrorResponse($validator,401);
        }

        $user = auth()->guard('api')->user();

        $sql = "SELECT
                    chats.id AS chat_id
                FROM
                    chats
                INNER JOIN participants ON participants.chat_id = chats.id
                WHERE EXISTS
                    (
                    SELECT
                        *
                    FROM
                        participants
                    WHERE
                        participants.user_id = ? AND participants.chat_id = chats.id
                ) AND participants.user_id = ?";

        $chat_id = null;
        $chatDB = Chat::sqlFirst($sql, [$user->id, $request->user_id]);
        if (!$chatDB) {
            $chat = Chat::create([
                'user_id' => $user->id,
            ]);

            Participant::create([
                'chat_id' => $chat->id,
                'user_id' => $user->id
            ]);

            Participant::create([
                'chat_id' => $chat->id,
                'user_id' => $request->user_id
            ]);

            $chat_id = $chat->id;
        } else {
            $chat_id = $chatDB->chat_id;
        }

        return $this->returnDataResponse($chat_id,'chat_id');
    }// end method
}

