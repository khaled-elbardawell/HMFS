<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

use Modules\Chat\Entities\Participant;

//Broadcast::channel('App.User.{id}', function ($user, $id) {
//    return (int) $user->id === (int) $id;
//});


//Broadcast::channel('chat.{sender_id}', function ($user,$sender_id) {
//    if ((int) $user->id === (int) $sender_id){
//        return $user;
//    }
//    return null;
//});




Broadcast::channel('chat.{chat_id}', function ($user,$chat_id) {
    // check if sender participant in this chat
    $sender_participant = Participant::where('user_id',$user->id)->where('chat_id',$chat_id)->first();
    if ($sender_participant){
        return $user;
    }

    return null;
});


Broadcast::channel('online', function ($user) {
        return $user;
});

Broadcast::channel('user.{user_id}', function ($user,$user_id) {
    if($user->id == $user_id){
        return $user;
    }
    return null;
});

