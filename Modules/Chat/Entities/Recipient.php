<?php

namespace Modules\Chat\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Recipient extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function message(){
        return $this->belongsTo(Message::class,'message_id');
    }
}
