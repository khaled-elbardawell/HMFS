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

class SeenMessageEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $chat_id = null;
    public $user = null;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($chat_id)
    {
        $this->chat_id = $chat_id;
        $this->user = auth()->user()->load('upload');
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PresenceChannel("chat.seen.{$this->chat_id}");
    }


}
