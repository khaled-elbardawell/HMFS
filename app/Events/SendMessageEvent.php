<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Modules\Chat\Entities\Chat;
use Modules\Chat\Entities\Message;

class SendMessageEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $message = null;
    public $chat_id = null;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Message $message,$chat_id)
    {
        $this->message = $message;
        $this->chat_id = $chat_id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PresenceChannel("chat.{$this->chat_id}");
    }
    public function broadcastAs(){
        return 'SendMessageEvent';
    }


}
